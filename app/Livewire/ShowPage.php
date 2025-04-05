<?php

namespace App\Livewire;

use App\Http\Resources\PageResource;
use App\Http\Resources\PostResource;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Component;

class ShowPage extends Component
{
    public $slug = 'home';
    public $page;
    public $pageData;
    public $content;
    public $title;
    public $seo;
    public $globals;
    public $availableLocales;

    public function mount($slug = 'home')
    {
        $this->slug = $slug;
        $this->loadPage();
    }

    protected function loadPage()
    {
//        $page = Page::where('slug->' . app()->currentLocale(), $this->slug)->firstOrFail();
        $page = Page::first();
        $this->page = $page;

        $pageResource = PageResource::make($page)->toArray(request());
        $this->title = $pageResource['title'];
        $this->seo = $pageResource['seo'];

        $this->content = collect($page['content'])->map(function($content) {
            if ($content['type'] === 'blog_section') {
                $posts = Post::orderBy('published_at', 'desc')->paginate($content['data']['per_page']);
                $content['data'] = [
                    'items' => PostResource::collection($posts->items())->toArray(request()),
                    'meta' => [
                        'base_path' => '/' . request()->path(),
                        'current_page' => $posts->currentPage(),
                        'first_page_url' => $posts->url(1),
                        'from' => $posts->firstItem(),
                        'last_page' => $posts->lastPage(),
                        'last_page_url' => $posts->url($posts->lastPage()),
                        'links' => $posts->linkCollection()->toArray(),
                        'next_page_url' => $posts->nextPageUrl(),
                        'path' => $posts->path(),
                        'per_page' => $posts->perPage(),
                        'prev_page_url' => $posts->previousPageUrl(),
                        'to' => $posts->lastItem(),
                        'total' => $posts->total(),
                    ]
                ];
            }
//            else if ($content['type'] === 'modules_section') {
//                $modules = Module::orderBy('sort_order', 'desc')->get();
//                $content['data'] = [
//                    'items' => ModuleResource::collection($modules)->toArray(request()),
//                    'meta' => [
//                        'base_path' => '/' . request()->path(),
//                    ]
//                ];
//            }
            return $content;
        })->toArray();

        // Load globals from config/settings.php
        $this->globals = [
            'general' => config('settings.general', []),
            'nav' => config('settings.nav', []),
            'footer' => config('settings.footer', []),
        ];

        // Get available locales
        $this->availableLocales = config('laravellocalization.supportedLocales', []);
    }

    public function render()
    {
        return view('livewire.show-page')
            ->layout('components.layouts.app', [
                'title' => $this->title,
                'metaTags' => view('components.seo', ['seo' => $this->seo])
            ]);
    }
}
