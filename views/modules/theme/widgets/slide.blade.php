@if(count($slides)>0)
<section class="section-slider">
    <div id="rev_slider_4_1_wrapper"
         class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic-carousel2" style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">

        <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
            <ul>
            @foreach($slides as $slide)
                <li data-index="rs-{{ $loop->iteration }}"
                    data-transition="slotfade-horizontal"
                    data-slotamount="default"
                    data-easein="Power4.easeInOut"
                    data-easeout="Power4.easeInOut"
                    data-masterspeed="2000"
                    data-thumb="{!! $slide->present()->firstImage(234,110,'fit',80) !!}"
                    data-rotate="0"  data-fstransition="fade"
                    data-fsmasterspeed="1500"
                    data-fsslotamount="{{ $loop->iteration }}"
                    data-saveperformance="off"
                    data-title="{{ $slide->title }}"
                    @if($slide->link_type != 'none')
                    data-link="{{ $slide->link->url }}"
                    data-target="{{ $slide->link->target }}"
                    @endif
                    data-description="">
                    <!-- MAIN IMAGE -->
                    <img data-lazyload="{!! $slide->present()->firstImage(1170,550,'fit',80) !!}"
                         alt="{{ $slide->title }}"
                         data-bgposition="center center"
                         data-bgfit="cover"
                         data-bgrepeat="no-repeat"
                         data-bgparallax="10"
                         class="rev-slidebg"
                         data-no-retina>
                </li>
            @endforeach
            </ul>
            <div class="tp-static-layers"></div>
            <div class="tp-bannertimer" style="height: 7px; background-color: rgba(255, 255, 255, 0.25);"></div>
        </div>
    </div>
</section>

{!! Asset::add(Theme::url('vendor/revolution/css/settings.css')) !!}
{!! Asset::add(Theme::url('vendor/revolution/css/layers.css')) !!}
{!! Asset::add(Theme::url('vendor/revolution/css/navigation.css')) !!}
{!! Asset::add(Theme::url('vendor/revolution/js/jquery.revolution.min.js')) !!}


@push('js-inline')
<script type="text/javascript">
    $("#rev_slider_4_1").show().revolution({
        sliderType: "carousel",
        jsFileLocation: "themes/artevents/vendor/revolution/js/",
        sliderLayout: "fullwidth",
        dottedOverlay: "none",
        delay: 9000,
        navigation: {
            keyboardNavigation: "off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            onHoverStop: "on",
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            }
            ,
            arrows: {
                style: "uranus",
                enable: true,
                hide_onmobile: true,
                hide_under: 600,
                hide_onleave: true,
                hide_delay: 200,
                hide_delay_mobile: 1200,
                tmp: '<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
                left: {
                    h_align: "left",
                    v_align: "center",
                    h_offset: 30,
                    v_offset: 0
                },
                right: {
                    h_align: "right",
                    v_align: "center",
                    h_offset: 30,
                    v_offset: 0
                }
            },
            bullets: {
                enable: true,
                style: 'hermes',
                h_align: "center",
                v_align: "bottom",
                v_offset: 20,
                space: 2
            }
        },
        carousel: {
            horizontal_align: "center",
            vertical_align: "center",
            fadeout: "on",
            maxVisibleItems: 3,
            infinity: "on",
            space: 0,
            stretch: "off"
        },
        viewPort: {
            enable: true,
            outof: "pause",
            visible_area: "80%"
        },
        responsiveLevels: [1170, 1024, 778, 480],
        gridwidth: [1170, 1024, 778, 480],
        gridheight: [550, 450, 350, 300],
        lazyType: "smart",
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 2000,
            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50]
        },
        shadow: 1,
        spinner: "spinner4",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        hideThumbsOnMobile: "on",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        debugMode: false,
        fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false
        }
    });
</script>
@endpush

@endif