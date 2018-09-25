{!! Theme::script("js/lib/jquery-1.11.0.min.js") !!}
{!! Theme::script("js/lib/jquery-ui.min.js") !!}
{!! Theme::script("js/lib/bootstrap.min.js") !!}
{!! Theme::script("js/lib/bootstrap-select.js") !!}
{!! Theme::script("js/lib/isotope.pkgd.min.js") !!}

{!! Theme::script("js/lib/jquery.appear.min.js") !!}
{!! Theme::script("js/lib/jquery.countTo.js") !!}
{!! Theme::script("js/lib/jquery.countdown.min.js") !!}
{!! Theme::script("js/lib/jquery.parallax-1.1.3.js") !!}
{!! Theme::script("js/lib/jquery.magnific-popup.min.js") !!}
{!! Theme::script("js/lib/SmoothScroll.js") !!}

@stack('js-stack')
{!! Asset::css() !!}
{!! Asset::js() !!}

<!-- Custom jQuery -->
{!! Theme::script("js/scripts.min.js?v=40") !!}

@stack('css-inline')
@stack('js-inline')

@include('partials.analytics')