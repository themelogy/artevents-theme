<article class="post">
    <div class="entry-media">
        <a href="{{ $post->url }}" class="post-thumbnail"><img src="{{ $post->present()->firstImage(770,346,'fit',80) }}" alt="{{ $post->title }}"></a>
        <span class="posted-on"><strong>{{ $post->created_at->format('d') }}</strong>{{ $post->created_at->formatLocalized('%b') }}</span>
    </div>
    <div class="entry-header">
        <h2 class="entry-title"><a href="{{ $post->url }}">{{ $post->title }}</a></h2>
    </div>
    <div class="entry-content">
        {!! $post->intro !!}
    </div>
    <div class="entry-footer">
        <p class="entry-meta">
            <span class="entry-categories">
                <a href="{{ $post->category->url }}">{{ $post->category->name }}</a>
            </span>
            @if(count($post->tags)>0)
                <span class="entry-tags">
                    <span class="screen-reader-text"><i class="fa fa-tags"></i></span>
                    @foreach($post->tags as $tag)
                        <a href="{{ route('news.tag', [$tag->slug]) }}">{{ $tag->name }}</a> @if(!$loop->first && $loop->last)- @endif
                    @endforeach
                </span>
            @endif
        </p>
    </div>

</article>