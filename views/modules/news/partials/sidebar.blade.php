<div class="col-md-4 col-md-pull-8">
    <div class="sidebar">

        @activityLatest(3, 'sidebar-latest')

        @newsCategories()

        @activityLatest(3, 'sidebar-upcoming')

        @newsLatestPosts(4, 'sidebar-latest')

        @if(isset($posts))
            @newsTags($posts)
        @elseif(isset($post))
            @newsTags($post)
        @endif

        <div class="widget widget_social">
            <h4 class="widget-title">{{ trans('themes::contact.follow us') }}</h4>
            <div class="widget-social">
                @include('partials.components.social')
            </div>
        </div>

    </div>
</div>