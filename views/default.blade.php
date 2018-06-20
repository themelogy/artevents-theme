@extends('layouts.master')

@section('content')

    @component('partials.components.banner', ['background'=>'bg-5'])
        <h1>{{ $page->title }}</h1>
    @endcomponent

    <section class="section-page">
        <div class="container">
            {!! Breadcrumbs::renderIfExists('page') !!}
            <div class="row">
                <div class="col-md-12 page m-top-20 m-bot-30">
                    {!! $page->body !!}
                </div>
            </div>
            @isset($page->settings->show_gallery)
            <div class="row">
                <div class="col-md-12 m-bot-30">
                    <div class="owl-carousel">
                        @isset($page->files)
                            @foreach($page->files as $file)
                                <div>
                                    <a href="{!! Imagy::getImage($file->filename, 'pageThumbnail', ['width'=>700, 'height'=>null, 'mode'=>'resize', 'quality'=>80]) !!}" data-lightbox="image" data-title="{{ $page->title }}">
                                    {!! Html::image(Imagy::getImage($file->filename, 'pageThumbnail', ['width'=>400, 'height'=>300, 'mode'=>'fit', 'quality'=>80]), $page->title) !!}
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
                @push('css-stack')
                    {!! Asset::add(Theme::url('vendor/owl.carousel/dist/assets/owl.carousel.min.css')) !!}
                    {!! Asset::add(Theme::url('vendor/owl.carousel/dist/assets/owl.theme.default.min.css')) !!}
                    {!! Asset::add(Theme::url('vendor/lightbox2/dist/css/lightbox.min.css')) !!}
                @endpush
                @push('script-stack')
                    {!! Asset::add(Theme::url('vendor/owl.carousel/dist/owl.carousel.min.js')) !!}
                    {!! Asset::add(Theme::url('vendor/lightbox2/dist/js/lightbox.min.js')) !!}
                @endpush
                @push('js-inline')
                    <script>
                        $(document).ready(function(){
                            $(".owl-carousel").owlCarousel({
                                items: 4,
                                margin: 20,
                                loop: true,
                                nav:true,
                                lazyLoad: true,
                                autoplay: true,
                                autoplayTimeout: 3000,
                                responsive : {
                                    0 : {
                                        items: 1
                                    },
                                    480 : {
                                        items: 1
                                    },
                                    768 : {
                                        items: 2
                                    },
                                    1024 : {
                                        items: 3
                                    },
                                    1280 : {
                                        items: 4,
                                        nav:true
                                    }
                                }
                            });
                        });
                    </script>
                @endpush
            @endisset
        </div>
    </section>

@stop
