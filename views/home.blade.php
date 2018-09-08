@extends('layouts.master')

@section('content')
    @themeSlide('anasayfa')

    <section class="section-event-list">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    @eventsCalendar()
                </div>
                <div class="col-md-8">
                    <!-- ITEM -->
                    <div class="col-md-12 md-padding-0">
                        @activityLatest(12)
                    </div>
                    <!-- END / ITEM -->
                </div>
            </div>
        </div>
    </section>

    <!-- HOME NEW -->
    <section class="section-event-news">
        <div class="container">

            <div class="event-news">
                <div class="row">

                    <!-- EVENT -->
                    <div class="col-md-6">
                        <div class="event">
                            <h2 class="heading">{{ trans('themes::activity.title.upcoming events') }}</h2>

                            <div class="row">

                                <!-- ITEM -->
                                <div class="col-xs-12 col-sm-12">
                                    <div class="event-slide owl-carousel owl-single owl-theme">

                                        <div class="event-item">
                                            <div class="img">
                                                <a href="#">
                                                    <img src="{!! Theme::url('images/slider/slider-1.jpg') !!}" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="event-item">
                                            <div class="img">
                                                <a href="#">
                                                    <img src="{!! Theme::url('images/slider/slider-1.jpg') !!}" alt="">
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- END / ITEM -->

                                {!! Asset::add(Theme::url("vendor/owl.carousel/dist/assets/owl.carousel.min.css")) !!}
                                {!! Asset::add(Theme::url("vendor/owl.carousel/dist/assets/owl.theme.default.min.css")) !!}
                                {!! Asset::add(Theme::url("vendor/owl.carousel/dist/owl.carousel.min.js")) !!}

                                @push('js-inline')
                                    <script>
                                        (function($){
                                            $('.owl-single').owlCarousel({
                                                smartSpeed:250,
                                                dots:true,
                                                responsiveRefreshRate:0,
                                                nav: false,
                                                items: 1,
                                                navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
                                            });
                                        })(jQuery);
                                    </script>
                            @endpush

                                <!-- ITEM -->
                                <div class="col-xs-6">
                                    <div class="event-item">
                                        <div class="img">
                                            <a href="#">
                                                <img src="{!! Theme::url('images/slider/slider-6.jpg') !!}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END / ITEM -->

                                <!-- ITEM -->
                                <div class="col-xs-6">
                                    <div class="event-item">
                                        <div class="img">
                                            <a href="#">
                                                <img src="{!! Theme::url('images/slider/slider-4.jpg') !!}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END / ITEM -->

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        @newsLatestPosts(3)
                    </div>

                </div>

                <div class="hr"></div>

            </div>

        </div>
    </section>
    <!-- END / HOME NEW -->
@endsection