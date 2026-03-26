<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        @if (app(\App\Settings\General::class)->site_title)
            @hasSection('title')
                @yield('title') -
            @endif
            {{app(\App\Settings\General::class)->site_title[app()->getLocale()] ?? config('app.name')}}
        @endif
    </title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/storage/' . \Awcodes\Curator\Models\Media::find(app(\App\Settings\Site::class)->fav_icon)?->path)}}"/>

    <x-layout.seo></x-layout.seo>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/aos.css')}}" />
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('css/mobile.css')}}" />
    <link rel="stylesheet" href="{{asset('css/owlcarousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}" />
    <link rel="stylesheet" href="{{asset('css/slick-slider.css')}}" />
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style-arabic.css')}}" />
    <link rel="stylesheet" href="{{asset('css/home.css')}}" />
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" />
    <script src="{{asset('js/jquery-3-6-0.min.js')}}"></script>

    @stack('style')
</head>

<body class="homepage1-body {{app()->getLocale() == "ar" ? "arabic-version" : ""}}">
<div class="preloader">
    <div class="loading-container">
        <div class="loading"></div>
        <div id="loading-icon">
            <x-curator-glider
                    :media="app(\App\Settings\Site::class)->logo[app()->getLocale()]"
            />
        </div>
    </div>
</div>

<div class="paginacontainer">
    <div class="progress-wrap">
        <svg
                class="progress-circle svg-content"
                width="100%"
                height="100%"
                viewBox="-1 -1 102 102"
        >
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
        </svg>
    </div>
</div>


<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/fontawesome.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/counter.js')}}"></script>
<script src="{{asset('js/gsap.min.js')}}"></script>
<script src="{{asset('js/ScrollTrigger.min.js')}}"></script>
<script src="{{asset('js/Splitetext.js')}}"></script>
<script src="{{asset('js/sidebar.js')}}"></script>
<script src="{{asset('js/magnific-popup.js')}}"></script>
<script src="{{asset('js/mobilemenu.js')}}"></script>
<script src="{{asset('js/owlcarousel.min.js')}}"></script>
<script src="{{asset('js/gsap-animation.js')}}"></script>
<script src="{{asset('js/nice-select.js')}}"></script>
<script src="{{asset('js/waypoints.js')}}"></script>
<script src="{{asset('js/slick-slider.js')}}"></script>
<script src="{{asset('js/circle-progress.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

@stack('script')

</body>
</html>
