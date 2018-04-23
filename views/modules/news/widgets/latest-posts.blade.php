@if($posts->count()>0)
<div class="news">
    <h2 class="heading">{{ trans('themes::news.title') }}</h2>
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-12">
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
    @if($posts->count()>3)
    <a href="{{ route('news.index') }}" class="awe-btn awe-btn-default">{{ trans('themes::news.other news') }}</a>
    @endif
</div>
@endif