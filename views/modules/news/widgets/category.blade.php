<div class="widget widget_categories">
    <h4 class="widget-title">{{ trans('themes::news.category.title') }}</h4>
    <ul>
        @foreach($categories as $category)
        <li><a href="{{ $category->url }}">{{ $category->name }} ({{ $category->posts()->count() }})</a></li>
        @endforeach
    </ul>
</div>