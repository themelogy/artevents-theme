@extends('layouts.master')

@section('content')

    @component('partials.components.banner', ['background'=>'bg-5'])
        <h1>{{ $activity->title }}</h1>
        <a class="category" href="{{ $activity->category->url }}">{{ $activity->category->title }}</a>
    @endcomponent

    <section class="section-blog bg-white">
        <div class="container">
            {!! Breadcrumbs::renderIfExists('activity.view') !!}
            <div class="blog">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="blog-content events-content">
                            <article class="post">
                                <div class="entry-media">
                                    @if(!empty($activity->video_url))
                                    <a href="{{ $activity->video_url }}"
                                       class="event-video post-thumbnail">
                                    @endif
                                        <img src="{{ $activity->present()->coverImage(800,null,'resize',80) }}" alt="{{ $activity->title }}">
                                    @if(!empty($activity->video_url))
                                    </a>
                                    @endif
                                    <div class="count-date" data-end="{{ $activity->events()->first()->event_at->format('Y/m/d H:i:s') }}"></div>
                                </div>
                                <div class="entry-dates owl-carousel owl-event-dates">
                                    @foreach($activity->events as $event)
                                        <div class="entry-date">
                                            <div class="date">
                                                <span class="day">{{ $event->event_at->format('d') }}</span>
                                                <span class="month">{{ $event->event_at->formatLocalized('%B') }}</span>
                                            </div>
                                            <div class="hour">
                                                {{ trans('themes::activity.title.hour') }}
                                                <span>{{ $event->event_at->format('H:i') }}</span>
                                            </div>
                                            @if(!empty($activity->ticket_url))
                                            <div class="ticket">
                                                <a href="{{ $activity->ticket_url }}">{{ trans('themes::activity.buttons.buy ticket') }}</a>
                                            </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <div class="entry-header no-padding">
                                    <h2 class="entry-title"><a href="#">{{ $activity->title }}</a></h2>
                                </div>
                                <div class="entry-content no-padding">
                                    {!! $activity->description !!}
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


{!! Asset::add(Theme::url("vendor/owl.carousel/dist/assets/owl.carousel.min.css")) !!}
{!! Asset::add(Theme::url("vendor/owl.carousel/dist/owl.carousel.min.js")) !!}
{!! Asset::add(Theme::url("vendor/jquery-youtube-lightbox/dist/jquery.yu2fvl.css")) !!}
{!! Asset::add(Theme::url("vendor/jquery-youtube-lightbox/dist/jquery.yu2fvl.min.js")) !!}

@push('js-inline')
    <script>
        (function($){
            $('.owl-event-dates').owlCarousel({
                items: 4,
                dots: false,
                smartSpeed:250,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
                responsive:{
                    0:{
                        items:1
                    },
                    768:{
                        items:2
                    },
                    1200:{
                        items:4
                    },
                    1600:{
                        items:4
                    }
                }
            });
            $('.event-video').yu2fvl({minPaddingX: 200, minPaddingY: 200});
        })(jQuery);
    </script>
@endpush