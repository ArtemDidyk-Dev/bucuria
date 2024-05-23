<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">

@foreach ($_GET as $param => $val)
    @if (strncmp($param, 'utm_', 4) === 0 || $param == 'gclid')
        <meta name="robots" content="noindex,nofollow" />
    @endif
@endforeach

@if (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'facebook') !== false)
    <meta property="og:image" content="{{ url('/images/og.jpg') }}">
@else
    <meta property="og:image" content="{{ url('/images/og.jpg') }}">
@endif

@if (Lang::langs()->count() > 1)
    @foreach (Lang::langs() as $lang)
        <link rel="alternate" hreflang="{{ $lang->tag }}" href="{{ Lang::url($lang->tag) }}" />
    @endforeach
@endif

<script>
    var is_mobile = {{ Platform::mobile() ? 'true' : 'false' }}
    var lang = document.querySelector('html').getAttribute('lang')
</script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="/css/nouislider.css" />

<link href="https://fonts.googleapis.com/css2?family=Forum&family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Prata&display=swap" rel="stylesheet">

<script src="/js/nouislider.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
