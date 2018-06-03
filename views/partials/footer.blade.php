<footer id="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('partials.footer.newsletter-vue')
                </div>
                <div class="col-lg-3 col-lg-offset-1 hidden">
                    <div class="social">
                        <div class="social-content">
                            @include('partials.components.social')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-5">
                    @include('partials.footer.contact')
                </div>
                @inject("menuService", "Modules\Menu\Services\MenuService")
                <div class="col-xs-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">{{ $menuService->title('corporate') }}</h4>
                        {!! Menu::render('corporate', \Themes\Artevents\Presenter\FooterMenuLinksPresenter::class) !!}
                    </div>
                </div>
                <div class="col-xs-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">{{ $menuService->title('events') }}</h4>
                        {!! Menu::render('events', \Themes\Artevents\Presenter\FooterMenuLinksPresenter::class) !!}
                    </div>
                </div>
                <div class="col-xs-4 col-lg-3">
                    <div class="widget">
                        <a href="{{ trans('themes::theme.buttons.biletix') }}"><img src="{!! Theme::url('images/logos/biletix.png') !!}" alt="Panora Gösteri Merkezi Biletix" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <p>{!! trans('themes::theme.footer.copyrights', ['company'=>setting('theme::company-name')]) !!}</p>
        </div>
    </div>
</footer>