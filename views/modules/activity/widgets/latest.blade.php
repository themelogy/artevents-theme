<div class="events latest-events owl-carousel owl-event-latest">
@foreach($activities as $activity)
    <div class="events-item">
        <div class="img">
            <a href="{{ $activity->url }}">
                <img class="owl-lazy img-responsive" data-src="{!! $activity->present()->coverImage(530,300,'fit',80) !!}" alt="{{ $activity->title }}">
            </a>
        </div>
        <div class="text">
            <h3 class="category"><a href="{{ $activity->category->url }}">{{ $activity->category->title }}</a></h3>
            <h2><a href="{{ $activity->url }}">{{ $activity->title }}</a></h2>
            <div class="info">{{ Str::words(strip_tags($activity->description), 16) }}</div>
        </div>
        <div class="event-dates owl-event-dates">
            @foreach($activity->events()->activated()->get() as $event)
                <div class="event-date">
                    <div class="date">
                        <span class="day">{{ $event->event_at->format('d') }}</span>
                        <span class="month">{{ $event->event_at->formatLocalized('%B') }}</span>
                        <span class="hour">{{ trans('themes::activity.title.hour') }}: <b>{{ $event->event_at->format('H:i') }}</b></span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach
</div>

{!! Asset::add(Theme::url("vendor/owl.carousel/dist/assets/owl.carousel.min.css")) !!}
{!! Asset::add(Theme::url("vendor/owl.carousel/dist/owl.carousel.min.js")) !!}

@push('js-inline')
    <script>
        (function($){
            $('.owl-event-latest').owlCarousel({
                margin:20,
                stagePadding:10,
                smartSpeed:250,
                dots:false,
                responsiveRefreshRate:0,
                items: 3,
                nav: true,
                navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                loop: false,
                autoplay: true,
                autoplayTimeout: 8000,
                lazyLoad: true,
                responsive:{
                    0:{
                        items:1,
                        stagePadding:0,
                        margin:0,
                        nav: false
                    },
                    768:{
                        items:2
                    },
                    1200:{
                        items:3
                    },
                    1600:{
                        items:3
                    }
                }
            });
            $('.owl-event-dates').owlCarousel({
                items: 2,
                dots: false,
                loop: false,
                smartSpeed:250,
                autoplay: true,
                autoplayTimeout: 3000
            });
        })(jQuery);
    </script>
@endpush