@if(count($posts)>0)
<div class="widget widget_recent_entries has_thumbnail">
    <h4 class="widget-title">{{ trans('themes::news.recent posts') }}</h4>
    <ul>
        @foreach($posts as $post)
        <li>
            <div class="img">
                <a href="#"><img src="{{ $post->present()->firstImage(70,70,'fit',80) }}" alt="{{ $post->title }}"></a>
            </div>
            <div class="text">
                <a href="{{ $post->url }}">{{ $post->title }}</a>
                <span class="date">{{ $post->created_at->formatLocalized('%d %B %Y') }}</span>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endif