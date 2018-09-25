@if($posts->count()>0)
<div class="news" style="margin-top: 0; margin-bottom: 30px;">
    <h2 class="heading">{{ trans('themes::news.title') }}</h2>
    @foreach($posts->chunk(2) as $chunk)
    <div class="row">
        @foreach($chunk as $post)
        <div class="col-md-6">
            <div class="news-item">
                <div class="img">
                    <a href="{{ $post->url }}"><img src="{!! $post->present()->firstImage(270,159,'fit',80) !!}" alt="{{ $post->title }}"></a>
                </div>
                <div class="text">
                    <span class="date">{{ $post->created_at->formatLocalized('%d %B %Y') }}</span>
                    <h2><a href="{{ $post->url }}">{{ $post->title }}</a></h2>
                    <a href="{{ $post->url }}" class="read-more">[ {{ trans('global.buttons.read more') }} ]</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
    @if($posts->count()>3)
    <a href="{{ route('news.index') }}" class="awe-btn awe-btn-default">{{ trans('themes::news.other news') }}</a>
    @endif
</div>
@endif