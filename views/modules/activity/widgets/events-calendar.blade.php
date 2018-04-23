<div class="events-calendar">
    <h4 class="title">{{ trans('themes::activity.title.events calendar') }}</h4>
    <div id="event-calendar" class="jalendar">
        @foreach($activities as $activity)
            @foreach($activity->events()->activated()->get() as $event)
                <div class="added-event" data-date="{{ $event->event_at->format('d-m-Y') }}" data-target="self" data-link="{{ $activity->url }}" data-image="{!! $activity->present()->coverImage(89,50,'fit',80) !!}" data-title="{{ $activity->title }} {{ $event->event_at->format('H:i') }}"></div>
            @endforeach
        @endforeach
    </div>
</div>

{!! Asset::add(Theme::url('vendor/jalendar/style/jalendar.css')) !!}
{!! Asset::add(Theme::url('vendor/jalendar/js/jalendar.min.js')) !!}

@push('js-inline')
    <script>
        $('#event-calendar').jalendar({
            lang: 'TR',
            color: '',
            color2: '',
            sundayStart: false,
            target: 'self'
        });
    </script>
@endpush