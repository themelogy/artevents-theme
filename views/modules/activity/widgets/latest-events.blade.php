<div class="events owl-single">
    @foreach($events->chunk(4) as $chunk)
    <div class="events-col">
        @foreach($chunk as $event)
        <div class="events-item">
            <div class="img">
                <a href="#"><img src="{!! Theme::url('images/slider/slider-5.jpg') !!}" alt=""></a>
            </div>
            <div class="text">
                <h3 class="category"><a href="#">{{ $event->activity->category->title }}</a></h3>
                <h2><a href="#">{{ $event->activity->title }}</a></h2>
                <span class="date">
                </span>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>