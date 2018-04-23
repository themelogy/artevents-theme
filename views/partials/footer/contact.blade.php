<div class="widget widget_logo">
    <div class="widget-logo">
        <div class="img">
            <a href="{{ url('/') }}"><img src="{!! Theme::url('images/logos/logo-light.svg') !!}" alt="{{ setting('theme::company-name') }}"></a>
            <div class="social m-top-10">
                <div class="social-content">
                    @include('partials.components.social')
                </div>
            </div>
        </div>
        <div class="text">
            <h4 class="widget-title">{{ trans('themes::contact.description') }}</h4>
            <p><i class="hillter-icon-location"></i> {!! setting('theme::address') !!}</p>
            <p><i class="hillter-icon-phone"></i> {!! setting('theme::phone') !!}</p>
            <p><i class="fa fa-envelope-o"></i> <a href="mailto:{{ Html::email(setting('theme::email')) }}">{{ Html::email(setting('theme::email')) }}</a></p>
        </div>
    </div>
</div>