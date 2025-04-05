<div>
    @foreach($sections as $section)
        <div class="relative">
            @php
                $componentName = Str::studly(Str::camel($section['type']));
            @endphp

            @if(view()->exists("components.blocks.{$componentName}"))
                <x-dynamic-component :component="'blocks.' . $componentName" :data="$section['data']" />
            @else
                <x-blocks.not-found-section />
            @endif
        </div>
    @endforeach
</div>
