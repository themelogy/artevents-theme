<div class="widget widget_upcoming_events">
    <h4 class="widget-title">{{ trans('themes::activity.title.upcoming events') }}</h4>
    <ul>
        @foreach($activities as $activity)
            @php $date = $activity->events()->activated()->first() @endphp
            <li>
            <span class="event-date">
                <strong>{{ $date->event_at->format('d') }}</strong>
                {{ $date->event_at->formatLocalized('%b') }}
            </span>
                <div class="text">
                    <a href="{{ $activity->url }}">{{ $activity->title }}</a>
                    <span class="date">{{ $date->event_at->formatLocalized('%d %B %Y') }}</span>
                </div>
            </li>
        @endforeach
    </ul>
</div>