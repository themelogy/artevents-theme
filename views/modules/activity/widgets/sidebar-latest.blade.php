@if($activities->count()>0)
<div class="widget widget_deal">
    <h4 class="widget-title">{{ trans('themes::activity.title.activities') }}</h4>
    <div class="widget-deal owl-carousel owl-single">

        @foreach($activities as $activity)
        <div class="item">
            <div class="img">
                <img src="{{ $activity->present()->coverImage(300,289,'fit',80) }}" alt="{{ $activity->title }}">
            </div>
            <div class="text">
                <h2>{{ $activity->title }}</h2>
                <p class="price">{{ $activity->category->title }}</p>
                <a href="{{ $activity->url }}" class="awe-btn awe-btn-12">{{ trans('themes::activity.buttons.details') }}</a>
            </div>
        </div>
        @endforeach


    </div>
</div>

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
                navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000
            });
        })(jQuery);
    </script>
@endpush
@endif
