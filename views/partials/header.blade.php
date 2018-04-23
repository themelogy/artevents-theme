<header id="header">
    <div class="header_top">
        <div class="container">
            <div class="header_left float-left">
                <span class="hidden">{!! setting('themes::theme.phone') !!}</span>
                <span>{!! trans('themes::theme.header.slogan') !!}</span>
            </div>
            <div class="header_right float-right">
                @include('partials.components.social', ['list'=>true])
                @if(isset($currentUser))
                <div class="dropdown">
                    <span>{{ trans('dashboard::dashboard.name') }}</span>
                    <ul>
                        <li><a target="_blank" href="{{ route('dashboard.index') }}">{{ trans('dashboard::dashboard.name') }}</a></li>
                        <li><a href="{{ route('logout') }}">{{ trans('themes::user.title.logout') }}</a></li>
                    </ul>
                </div>
                @endif
                @include('partials.header.languages')
            </div>
        </div>
    </div>

    <div class="header_content" id="header_content">
        <div class="container">
            <div class="header_logo">
                <a href="{{ url('/') }}"><img src="{!! Theme::url('images/logos/logo.svg') !!}" alt="{{ setting('theme::company-name') }}"></a>
            </div>
            <nav class="header_menu">
                {!! Menu::render('header', \Themes\Artevents\Presenter\HeaderMenuPresenter::class) !!}
            </nav>
            <span class="menu-bars">
                <span></span>
            </span>
        </div>
    </div>

</header>