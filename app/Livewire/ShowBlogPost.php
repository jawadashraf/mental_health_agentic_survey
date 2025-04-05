<?php

namespace App\Livewire;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ShowBlogPost extends Component
{
    public $slug;
    public $post;
    public $title;
    public $content;
    public $seo;
    public $publishedAt;
    public $globals;
    public $availableLocales;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->loadPost();
    }

    protected function loadPost()
    {
        $post = Post::where('slug->' . LaravelLocalization::getCurrentLocale(), $this->slug)->firstOrFail();
        $postResource = PostResource::make($post)->toArray(request());
        
        $this->post = $post;
        $this->title = $postResource['title'];
        $this->content = $postResource['content'];
        $this->seo = $postResource['seo'];
        $this->publishedAt = $postResource['published_at'];
        
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
        return view('livewire.show-blog-post')
            ->layout('components.layouts.app', [
                'title' => $this->title,
                'metaTags' => view('components.seo', ['seo' => $this->seo])
            ]);
    }
}