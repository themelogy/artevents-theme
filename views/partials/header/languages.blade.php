<div class="dropdown language">
    <span>{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
    <ul>
@foreach(LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale)
    @php
        switch (Request::route()->getName()) {
            case 'page' && isset($page):
            $url = $page->present()->url($locale);
            break;
            case 'news.slug':
            case 'blog.slug':
            $url = $post->present()->url($locale);
            break;
            case 'news.category':
            case 'blog.category':
            case 'store.category.slug':
            $url = $category->present()->url($locale);
            break;
            case 'store.product.slug':
            $url = $product->present()->url($locale);
            break;
            case 'employee.view':
            $url = $employee->present()->url($locale);
            break;
            case 'activity.view':
            $url = $activity->present()->url($locale);
            break;
            default:
            $url = null;
            break;
        }
        $localizedUrl = LaravelLocalization::getLocalizedURL($locale, $url);
    @endphp
    <li class="{{ $locale == locale() ? 'active' : '' }}">
        <a rel="alternate" hreflang="{!! $locale !!}" href="{{ $localizedUrl }}" class="{{ $locale == locale() ? 'active' : '' }}">
            {{ $supportedLocale['native'] }}
        </a>
    </li>
@endforeach
    </ul>
</div>