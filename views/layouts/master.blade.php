<!DOCTYPE HTML>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
<head>
@include('partials.metadata')
</head>
<body>
@include('partials.components.preloader')
<div id="page-wrap">
    @include('partials.header')

    @yield('content')

    @include('partials.footer')
</div>
@include('partials.scripts')
</body>
</html>