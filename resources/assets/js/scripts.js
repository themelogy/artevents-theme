
(function($) {
    "use strict";
    /*==============================
        Is mobile
    ==============================*/
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    }
    
    /* Datepicker */
    DatePicker();
    function DatePicker() {
        $( ".awe-calendar:not(.from, .to)" ).datepicker({
            prevText: '<i class="hillter-icon-left-arrow"></i>',
            nextText: '<i class="hillter-icon-right-arrow"></i>',
            buttonImageOnly: false
        });
        
        /* Datepicker from - to */
        $( ".awe-calendar.from" ).datepicker({
            prevText: '<i class="hillter-icon-left-arrow"></i>',
            nextText: '<i class="hillter-icon-right-arrow"></i>',
            buttonImageOnly: false,
            minDate:0,
            onClose: function( selectedDate ) {
                var newDate = new Date(selectedDate),
                    tomorrow =  new Date(newDate.getTime() + 24 * 60 * 60 * 1000),
                    nextDate = (tomorrow.getMonth()+1)+'/'+tomorrow.getDate()+'/'+tomorrow.getFullYear();            
                $( ".awe-calendar.to" ).datepicker("option","minDate",nextDate).focus();
            }
        });
        $( ".awe-calendar.to" ).datepicker({
            prevText: '<i class="hillter-icon-left-arrow"></i>',
            nextText: '<i class="hillter-icon-right-arrow"></i>',
            buttonImageOnly: false,
            minDate:0,
            onClose: function( selectedDate ) {
                //$(".awe-calendar.from").datepicker( "option", "maxDate", selectedDate );
            }
        });
    }

    /*Accordion*/
    Accordion();
    function Accordion() {
        $( ".accordion" ).accordion({
          heightStyle: "content"
        });
    }

    /* Tabs */
    Tabs();
    function Tabs() {
        $('.tabs').tabs({
            show: { effect: "fadeIn", duration: 300 },
            hide: { effect: "fadeOut", duration: 300 }
        });
    }

    /* Select */
    aweSelect();
    function aweSelect() {
        $('.awe-select').each(function(index, el) {
            $(this).selectpicker();
        });
        
    }

    /* aweCalendar */
    aweCalendar();
    function aweCalendar() {
        $('.awe-calendar').each(function() {
            var aweselect = $(this);
            aweselect.wrap('<div class="awe-calendar-wrapper"></div>');
            aweselect.after('<i class="hillter-icon-calendar"></i>');
        });
    }

    /*Menu Sticky*/ 
    function MenuSticky() {

        if($('#header_content').length) {

            var $this = $('#header_content'),
                size_point = $this.data().responsive,
                window_w = $(window).innerWidth(),
                window_scroll = $(window).scrollTop(),
                top_h = $('#header .header_top').innerHeight(),
                this_h = $this.innerHeight();

                if(size_point == undefined || size_point == '') {
                    size_point = 1199;
                }

                if( window_scroll > top_h ) {

                    if(($this).hasClass('header-sticky') == false) {
                        $this.addClass('header-sticky');

                        if(window_w <= size_point) {
                            $this.find('.header_menu').css('top', this_h + 'px');
                        }
                    }

                } else {
                    $this.removeClass('header-sticky');

                    if(window_w <= size_point) {
                        $this.find('.header_menu').css('top', (this_h + top_h) + 'px');
                    }
                }

                
        }
    }

    /* Menu Resize */
    function MenuResize() {

        if( $('#header_content').length ) {

            var $this = $('#header_content'),
                size_point = $this.data().responsive,
                window_scroll = $(window).scrollTop(),
                top_h = $('#header .header_top').innerHeight(),
                this_h = $this.innerHeight(),
                window_w = $(window).innerWidth();

            if(size_point == undefined || size_point == '') {
                size_point = 1199;
            }

            if(window_w <= size_point) {
                $this.addClass('header_mobile').removeClass('header_content');
            } else {
                $('.menu-bars').removeClass('active');
                $this.removeClass('header_mobile').addClass('header_content');
                $('#header_content .header_menu').css({
                    'top':''
                }).removeClass('active').find('ul').css('display', '');
            }
        }
    }

    /* Menu Click */
    MenuBar();
    function MenuBar() {

        $('.menu-bars').click(function(event) {

            if( $('.header_menu').hasClass('active') ) {
                $('.header_menu').removeClass('active');
                $(this).removeClass('active');
            } else {
                $('.header_menu').addClass('active');
                $(this).addClass('active');
            }

        });

        $('.menu li a').on('click', 'span', function(event) {
            event.preventDefault();
            
            var $this = $(this),
                $parent_li = $this.parent('a').parent('li'),
                $parent_ul = $parent_li.parent('ul');

            if( $parent_li.find('> ul').is(':hidden') ) {
                $parent_ul.find('> li > ul').slideUp();
                $parent_li.find('> ul').slideDown();
            } else {
                $parent_li.find('> ul').slideUp();
            }

            return false;
        });
    }

    /* AwePopup */
    AwePopup(CallBackPopup);

    function CallBackPopup() {
        PopupCenter();
    }
    
    function AwePopup(callback){

        $('.awe-ajax').click(function(event) {
            var $this = $(this),
                link_href= $this.attr('href');

            $('body').addClass('awe-overflow-h');
            $('#awe-popup-overlay, #awe-popup-wrap').addClass('in');

            getContentAjax(link_href,'#awe-popup-wrap .awe-popup-content', callback);

            return false;
        });

        $(document).on('click', '#awe-popup-overlay, #awe-popup-close, #awe-popup-wrap', function(event) {
            event.preventDefault();
            $('#awe-popup-wrap, #awe-popup-overlay').removeClass('in');
            $('body').removeClass('awe-overflow-h');
            $('#awe-popup-wrap .awe-popup-content').html('');
            return false;
        });

        $(document).on('click', '#awe-popup-wrap .awe-popup-content', function(event) {
            event.stopPropagation();
        });
    }

    function PopupCenter() {
        if($('#awe-popup-wrap').hasClass('in')) {

            var $this = $('#awe-popup-wrap .awe-popup-content'),
                window_h = $(window).innerHeight(),
                height_e = $this.innerHeight(),
                height_part = (window_h - height_e) / 2;

            if( height_e < window_h && height_e > 0) {

                $this.parent().css({
                    'padding-top': height_part + 'px',
                    'padding-bottom': '0'
                });

            } else {

                $this.parent().css({
                    'padding-top': '10px',
                    'padding-bottom': '10px'
                });
            }
        }
    }

    function getContentAjax(url, id, callback, beforesend) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html',
            beforeSend: function() {
                if(beforesend) {
                    beforesend();
                }
            }
        })
        .done(function(data) {

            $(id).html(data);

            // Apply callback
            if (callback) {
                callback();
            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }

    /* Gallery Isotope */
    function GalleryIsotope() {
        if($('.gallery').length ) {
            $('.gallery').each(function(index, el) {
                var $this = $(this),
                    $isotope = $this.find('.gallery-isotope'),
                    $filter = $this.find('.gallery-cat');

                    if($isotope.length) {
                        var isotope_run = function(filter) { 
                            $isotope.isotope({
                                itemSelector: '.item-isotope',
                                filter: filter,
                                percentPosition: true,
                                masonry: { columnWidth: '.item-size'},
                                transitionDuration: '0.8s',
                                hiddenStyle: { opacity: 0 },
                                visibleStyle: { opacity: 1 }
                            });
                        }

                        $filter.on('click', 'a', function(event) {
                            event.preventDefault();
                            $(this).parents('ul').find('.active').removeClass('active');
                            $(this).parent('li').addClass('active');
                            isotope_run($(this).attr('data-filter'));
                        });

                        isotope_run('*');
                    }
            });
        }
    }

    /* Guest Book Masonry */
    function GuestBookMasonry() {
        if($('.guest-book_mansory').length ) {
            $('.guest-book_mansory').each(function(index, el) {
                $(this).isotope({
                    itemSelector: '.item-masonry'
                });
            });
        }
    }

    CountDate();
    /*==========  Count Date ==========*/
    function CountDate(){
        if($('.count-date').length){
            $('.count-date').each(function(index, el) {
                var $this = $(this),
                    end_date = $this.attr('data-end');

                if($this.attr('data-end') !=='' && typeof $this.attr('data-end') !== 'undefined' ) {

                   $this.countdown(end_date, function(event) {
                     $(this).html(
                        event.strftime('<span> %D <span>GÜN</span></span> <span> %H <span>SAAT</span></span> <span> %M <span>DAKİKA</span></span> <span> %S <span>SANİYE</span></span>')
                     );
                  });

                }

            });
        }
    }

    /* Popup Gallery */
    GalleryPopup();
    function GalleryPopup() {

        if($('.gallery_item').length) {

            $('.gallery_item').each(function(index, el) {
                $(this).magnificPopup({
                    delegate: 'a', // the selector for gallery item
                    type: 'image',
                    mainClass: 'mfp-with-zoom',
                    zoom: {
                        enabled: true,
                        duration: 300,
                        easing: 'ease-in-out',
                    },
                    gallery: {
                        enabled:true,
                        arrowMarkup: '<button title="%title%" type="button" class="mfp-prevent-%dir% hillter-icon-%dir%-arrow"></button>',
                        tPrev: '',
                        tNext: ''
                    }
                });
            });
        }
    }

    /*Gallery Room Detail*/
    GalleryRoomDetail();
    function GalleryRoomDetail() {

        if($('.room-detail_img').length ) {

            $(".room-detail_img").owlCarousel({
                navigation : true,
                pagination: false,
                navigationText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                singleItem: true,
                mouseDrag:false,
                transitionStyle:'fade'
            });
        }

        if($('.room-detail_thumbs').length ) {

            $(".room-detail_thumbs").owlCarousel({
                items: 7,
                pagination: false,
                navigation : true,
                mouseDrag:false,
                navigationText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                itemsCustom:[[0,3], [320,4], [480,5], [768,6], [992,7], [1200,7]]
            });

            if( $(".room-detail_img").data("owlCarousel") !== undefined && $(".room-detail_thumbs").data("owlCarousel") !== undefined ) {
                $('.room-detail_thumbs').on('click','.owl-item',function(event) {

                    var $this= $(this),
                        index = $this.index();
                    $('.room-detail_thumbs').find('.active').removeClass('active');
                    $this.addClass('active');
                    $(".room-detail_img").data("owlCarousel").goTo(index);

                    return false;
                });
            }
        }
    }

    /* ACCOMMODATIONS SLIDE */
    Accommodations1();
    function Accommodations1() {
        if( $('.accomd-modations-slide_1').length ) {

            $(".accomd-modations-slide_1").owlCarousel({
                pagination: true,
                navigation : false,
                itemsCustom:[[0,1], [480,2], [992,3], [1200,3]]
            });

        }
    }

    /* SET BACKGROUND ROOM ITEM */
    BackgroundRoomItem();
    function BackgroundRoomItem() {
        $('.room_item-6, .room_item-5').each(function(index, el) {
            var $this = $(this),
                link_src = $this.data().background;
                
            if(link_src != undefined && link_src !='') {
                $this.css('background-image', 'url('+ link_src +')');
            }
        });
    }

    /* Parallax */
    function ParallaxScroll() {
        if (isMobile.iOS()) {
            $('.awe-parallax, .awe-static').addClass('fix-background-ios');
        } else {
            $('.awe-parallax').each(function(index, el) {
                $(this).parallax("50%", 0.2);
            });
        }
    }

    function AttractionClick(){
        var window_w = window.innerWidth;

        if( window_w < 991 ) {
            $('.attraction_sidebar .attraction_heading').addClass('attraction_heading_dropdown');
        } else {
            $('.attraction_sidebar .attraction_heading').removeClass('attraction_heading_dropdown');
            $('.attraction_sidebar .attraction_sidebar-content').css('display', '');
        }
    }

    AttractionList();
    function AttractionList() {
        $('.attraction_sidebar').on('click', '.attraction_heading_dropdown', function(event) {
            event.preventDefault();

            if($('.attraction_sidebar-content').is(':hidden')) {
                $('.attraction_sidebar .attraction_sidebar-content').slideDown();
            } else {
                $('.attraction_sidebar .attraction_sidebar-content').slideUp();
            }
        });
    }

    $(document).ready(function() {
        $(window).load(function() {
            $('#preloader').delay(1000).fadeOut('400', function() {
                    $(this).fadeOut()
            });
            $('body').append('<div class="awe-popup-overlay" id="awe-popup-overlay"></div><div class="awe-popup-wrap" id="awe-popup-wrap"><div class="awe-popup-content"></div><span class="awe-popup-close" id="awe-popup-close"></div>');
            GalleryIsotope();
            GuestBookMasonry();
        });

        // $(window).scroll(function(event) {
        //     MenuSticky();
        // });

        $(window).resize(function(event) {
            //ParallaxScroll(); 
            PopupCenter();
            MenuResize();
            //MenuSticky();
            AttractionClick();
        }).trigger('resize');
        
    });

})(jQuery);