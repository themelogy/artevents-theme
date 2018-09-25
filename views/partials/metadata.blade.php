{!! seo_helper()->render() !!}

<meta id="token" name="token" content="{{ csrf_token() }}" />
@if($currentUser)
    <meta id="authorization" name="authorization" content="{{ $currentUser->getFirstApiKey() }}" />
@endif

<link rel="shortcut icon" href="{{ Theme::url('images/favicon.png') }}">

<!-- CSS LIBRARY -->
{!! Theme::style("css/lib/font-awesome.min.css") !!}
{!! Theme::style("css/lib/font-hilltericon.css") !!}
{!! Theme::style("css/lib/bootstrap.min.css") !!}
{!! Theme::style("css/lib/jquery-ui.min.css") !!}
{!! Theme::style("css/lib/magnific-popup.css") !!}
{!! Theme::style("css/lib/settings.css") !!}
{!! Theme::style("css/lib/bootstrap-select.min.css") !!}

<!-- MAIN STYLE -->
{!! Theme::style("css/style.css?v=40") !!}

@push('js-inline')
    <script type="text/javascript"> WebFontConfig = {
            google: {
                families: [
                    'Hind:400,300,500,600:latin-ext',
                    'Montserrat:400,500,700:latin-ext',
                    'Poppins:300,400,400i,500,500i,700:latin-ext'
                ]
            }
        };
        (function () {
            var wf = document.createElement('script');
            wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>
@endpush

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->