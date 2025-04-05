@if(isset($seo))
    @if(isset($seo['description']))
        <meta name="description" content="{{ $seo['description'] }}">
    @endif
    @if(isset($seo['keywords']))
        <meta name="keywords" content="{{ $seo['keywords'] }}">
    @endif
    @if(isset($seo['canonical']))
        <link rel="canonical" href="{{ $seo['canonical'] }}">
    @endif
    @if(isset($seo['og_title']))
        <meta property="og:title" content="{{ $seo['og_title'] }}">
    @endif
    @if(isset($seo['og_description']))
        <meta property="og:description" content="{{ $seo['og_description'] }}">
    @endif
    @if(isset($seo['og_image']))
        <meta property="og:image" content="{{ $seo['og_image'] }}">
    @endif
    @if(isset($seo['twitter_title']))
        <meta name="twitter:title" content="{{ $seo['twitter_title'] }}">
    @endif
    @if(isset($seo['twitter_description']))
        <meta name="twitter:description" content="{{ $seo['twitter_description'] }}">
    @endif
    @if(isset($seo['twitter_image']))
        <meta name="twitter:image" content="{{ $seo['twitter_image'] }}">
    @endif
@endif