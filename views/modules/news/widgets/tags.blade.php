@if(count($tags)>0)
<div class="widget widget_tag_cloud">
    <h4 class="widget-title">{{ trans('tag::tags.tag') }}</h4>
    <div class="tagcloud">
        @foreach($tags as $tag)
        <a href="{{ route('news.tag', [$tag->slug]) }}">{{ $tag->name }}</a>
        @endforeach
    </div>
</div>
@endif