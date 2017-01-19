'use strict';
// Get all localized variables

var main_color = Slimvideo.main_color;
var images_loaded_active = Slimvideo.ts_enable_imagesloaded;
var ts_logo_content = Slimvideo.ts_logo_content;
var ts_onepage_layout = Slimvideo.ts_onepage_layout;

if (typeof ts_logo_content !== 'undefined') {
    addLogoToMenu(ts_logo_content);
}

function ts_set_like(){
    jQuery('.touchsize-likes').on('click',function() {
        var link, id, postfix;

        link = jQuery(this);
        if(link.hasClass('active')) return false;

        id = jQuery(this).attr('data-id'),
        postfix = link.find('.touchsize-likes-postfix').text();

        jQuery.post(Slimvideo.ajaxurl, { action:'touchsize-likes', likes_id:id, postfix:postfix }, function(data){
            link.html(data).addClass('active').attr('title', 'You already like this');
        });

        return false;
    });

    if( jQuery('body.touchsize-likes').length ) {
        jQuery('.touchsize-likes').each(function(){
            var id = jQuery(this).attr('id');
            jQuery(this).load(Slimvideo.ajaxurl, { action:'touchsize-likes', post_id:id });
        });
    }
}

/* Testimonials */
jQuery(function(){
    jQuery('ul.testimonials-controls li').click(function(){
        var testimonial_id = jQuery(this).attr('id');
            jQuery(this).parent().prev().find('li').hide();
            jQuery(this).parent().find('li.active').removeClass('active');
            jQuery(this).parent().prev().find('#' + testimonial_id).show();
            jQuery(this).addClass('active');
    });
});


/* Article carousel */

function initCarousel() {
    jQuery('.carousel-wrapper').each(function () {
        var thisElem = jQuery(this);
        var numberOfElems = parseInt(jQuery('.carousel-container', thisElem).children().length, 10);
        var oneElemWidth;
        var numberOfColumns = [
            ['col-lg-2', 6],
            ['col-lg-3', 4],
            ['col-lg-4', 3],
            ['col-lg-6', 2],
            ['col-lg-12', 1]
        ];
        var curentNumberOfColumns;
        var moveMargin;
        var leftHiddenElems = 0;
        var rightHiddenElems;
        var curentMargin = 0;
        var numberOfElemsDisplayed;
        var index = 0;
        var carouselContainerWidth;
        var carouselContainerWidthPercentage;
        var elemWidth;
        var elemWidthPercentage;

        while (index < numberOfColumns.length) {
            if (jQuery('.carousel-container>div', thisElem).hasClass(numberOfColumns[index][0])) {
                curentNumberOfColumns = numberOfColumns[index][1];
                break;
            }
            index++;
        }

        elemWidth = 100 / numberOfElems;
        elemWidth = elemWidth.toFixed(4);
        elemWidthPercentage = elemWidth + '%';

        function showHideArrows(){
            if(curentNumberOfColumns >= numberOfElems){

                jQuery('ul.carousel-nav > li.carousel-nav-left', thisElem).css('opacity','0.4');
                jQuery('ul.carousel-nav > li.carousel-nav-right', thisElem).css('opacity','0.4');

            } else if(leftHiddenElems === 0){

                jQuery('ul.carousel-nav > li.carousel-nav-left', thisElem).css('opacity','0.4');
                jQuery('ul.carousel-nav > li.carousel-nav-right', thisElem).css('opacity','1');

            } else if (rightHiddenElems === 0 ){

                jQuery('ul.carousel-nav > li.carousel-nav-left', thisElem).css('opacity','1');
                jQuery('ul.carousel-nav > li.carousel-nav-right', thisElem).css('opacity','0.4');

            } else {
                jQuery('ul.carousel-nav > li.carousel-nav-left', thisElem).css('opacity','1');
                jQuery('ul.carousel-nav > li.carousel-nav-right', thisElem).css('opacity','1');
            }
        }

        function reinitCarousel() {

            showHideArrows();
            jQuery('.carousel-container', thisElem).css('margin-left', 0);
            leftHiddenElems = 0;
            jQuery('ul.carousel-nav > li', thisElem).unbind('click');

            if (jQuery(window).width() <= 973) {

                carouselContainerWidth = 100 * numberOfElems;
                carouselContainerWidthPercentage = carouselContainerWidth + '%';
                rightHiddenElems = numberOfElems - 1;
                moveMargin = 100;
                curentMargin = 0;

                jQuery('ul.carousel-nav > li', thisElem).unbind('click');

                jQuery('ul.carousel-nav > li', thisElem).click(function () {
                    if( typeof(lazyload) == 'function' ){
                        thisElem.find('img.lazy').lazyload();
                    }

                    if (jQuery(this).hasClass('carousel-nav-left')) {
                        if (leftHiddenElems > 0) {
                            curentMargin = curentMargin + moveMargin;
                            jQuery('.carousel-container', thisElem).css('margin-left', curentMargin + '%');
                            rightHiddenElems++;
                            leftHiddenElems--;
                        }
                    } else {
                        if (rightHiddenElems > 0) {
                            curentMargin = curentMargin - moveMargin;
                            jQuery('.carousel-container', thisElem).css('margin-left', curentMargin + '%');
                            rightHiddenElems--;
                            leftHiddenElems++;
                        }
                    }
                    // Trigger arrows color change
                    showHideArrows();
                });

            } else {

                while (index < numberOfColumns.length) {
                    if (jQuery('.carousel-container>div', thisElem).hasClass(numberOfColumns[index][0])) {
                        numberOfElemsDisplayed = numberOfColumns[index][1];
                        moveMargin = 100 / numberOfElemsDisplayed;
                        rightHiddenElems = numberOfElems - numberOfElemsDisplayed;
                        oneElemWidth = 100 / numberOfColumns[index][1];
                        break;
                    }
                    index++;
                }

                carouselContainerWidth = oneElemWidth * numberOfElems;
                carouselContainerWidthPercentage = carouselContainerWidth + '%';

                curentMargin = 0;

                jQuery('ul.carousel-nav > li', thisElem).click(function () {

                    if( typeof(lazyload) == 'function' ){
                        thisElem.find('img.lazy').lazyload();
                    }

                    if (jQuery(this).hasClass('carousel-nav-left')) {
                        if (leftHiddenElems > 0) {
                            curentMargin = curentMargin + moveMargin + 0.00001;
                            jQuery('.carousel-container', thisElem).css('margin-left', curentMargin + '%');
                            rightHiddenElems++;
                            leftHiddenElems--;
                        }
                    } else {
                        if (rightHiddenElems > 0) {
                            curentMargin = curentMargin - moveMargin;
                            jQuery('.carousel-container', thisElem).css('margin-left', curentMargin + '%');
                            rightHiddenElems--;
                            leftHiddenElems++;
                        }
                    }
                    // Trigger arrows color change
                    showHideArrows();
                });
            }

            //Set the container total width
            jQuery('.carousel-container', thisElem).width(carouselContainerWidthPercentage).css({
                'max-height': '9999px',
                'opacity': '1'
            });

            //Set width for each element
            jQuery('.carousel-container>div', thisElem).each(function () {
                jQuery(this).attr('style', 'width: ' + elemWidthPercentage + ' !important; float:left;');
            });
        }

        reinitCarousel();

        jQuery(window).resize(function () {
            reinitCarousel();
        });
    });
}

jQuery.fn.isOnScreen = function(){

    var win = jQuery(window);

    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();

    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();

    return (!(viewport.bottom < bounds.top || viewport.top > bounds.bottom));

};

function activateStickyMenu(){
    var menu = jQuery('#header .ts-header-menu').last(),
        sticky_height = 0,
        offset = 0;

    // there are no menu on the page
    if ( menu.length < 1 ) {
        offset = 100;
        sticky_height = 80;
        menu = jQuery('#header');
    } else {
        sticky_height = jQuery('.ts-sticky-menu ul').height();
    }

    if( jQuery(window).scrollTop() > offset && !jQuery('.ts-sticky-menu').hasClass('active') ){
        jQuery('.ts-sticky-menu').outerHeight(sticky_height);
        jQuery('.ts-sticky-menu').addClass('active');
    }

    jQuery(window).on('scroll',function(){

        // check if the offset of the menu has changed
        if(menu.length > 0 && offset !== menu.offset().top )
            offset = menu.offset().top;

        if( jQuery(window).scrollTop() > offset && !jQuery('.ts-sticky-menu').hasClass('active') ){
            jQuery('.ts-sticky-menu').outerHeight(sticky_height);
            jQuery('.ts-sticky-menu').addClass('active');
        }

        if( jQuery(window).scrollTop() < offset && jQuery('.ts-sticky-menu').hasClass('active') ) {
            jQuery('.ts-sticky-menu').removeClass('active');
            jQuery('.ts-sticky-menu').outerHeight(0);
        }
    });
}

function startOnePageNav(){
    jQuery('.main-menu a').click(function(e){
        e.preventDefault();
        var navItemUrl = jQuery(this).attr('href');
        jQuery(document).scrollTo(navItemUrl,500);
    });
}

function filterButtonsRegister(){
    // Adds active class to "all" button
    jQuery('.ts-filters > li:first').addClass('active');

    // Code to change the .active class on click
    jQuery('.ts-filters > li a').click(function(e){
        e.preventDefault();

        var thisElem = jQuery(this);
        jQuery('.ts-filters > li.active').removeClass('active');
        thisElem.parent().addClass('active');
        return false;
    });
}

function hidePreloader(){
    // Animate the proloader after the page has been loaded
    setTimeout(function () {
        jQuery('.ts-page-loading').addClass('ts-page-loading-animate');
    }, 600);
}

function resizeVideo(iframe_width, iframe_height){

    if( jQuery('.embedded_videos').length ){
        jQuery('.embedded_videos iframe, .embedded_videos video').each(function(){

            if (jQuery(this).parents('.embedded_videos').hasClass('single4')) {
                return false;
            }

            var iframe_width = jQuery(this).width();
            var iframe_height = jQuery(this).height();

            var iframe_proportion = iframe_width/iframe_height;

            if ( iframe_height > iframe_width){
                iframe_proportion = jQuery(this).attr('width') / jQuery(this).attr('height');
            }

            var iframe_parent_width = jQuery(this).parents('.embedded_videos').parent().width();
            jQuery(this).attr( 'width' , iframe_parent_width );
            jQuery(this).attr( 'height' , iframe_parent_width / 1.77 );
            jQuery(this).width( iframe_parent_width );
            jQuery(this).height( iframe_parent_width / 1.77 );
        });

        jQuery('.embedded_videos .wp-video').each(function(){

            var iframe = jQuery(this);
            var iframe_width = jQuery(this).width();
            var iframe_height = iframe_width / 1.777;
            var iframe_proportion = iframe_width / iframe_height;

            var iframe_parent_width = jQuery(this).parents('.embedded_videos').parent().width();

            jQuery(iframe).css( 'width',iframe_parent_width );
            jQuery(iframe).css( 'height',iframe_parent_width / iframe_proportion );

            jQuery(iframe).find('.wp-video-shortcode').css( 'width', iframe_parent_width );
            jQuery(iframe).find('.wp-video-shortcode').css( 'height', iframe_parent_width / iframe_proportion );

        });
    }
}

function twitterWidgetAnimated(){
    /*Tweets widget*/
    var delay = 4000; //millisecond delay between cycles

    function cycleThru(variable, j){
        var jmax = jQuery(variable + " li").length;
        jQuery(variable + " li:eq(" + j + ")")
            .css('display', 'block')
            .animate({opacity: 1}, 600)
            .animate({opacity: 1}, delay)
            .animate({opacity: 0}, 800, function(){
                if(j+1 === jmax){
                    j=0;
                }else{
                    j++;
                }
                jQuery(this).css('display', 'none').animate({opacity: 0}, 10);
                cycleThru(variable, j);
            });
    }

    jQuery('.tweets').each(function(index, val) {
        //iterate through array or object
        var parent_tweets = jQuery(val).attr('id');
        var actioner = '#' + parent_tweets + ' .ts-twitter-container.dynamic .slides_container .widget-items';
        cycleThru(actioner, 0);
    });
}

//Add logo to the center of all menu item list
function addLogoToMenu(logoContent){
    var menu_item_number = jQuery(".menu-with-logo > .main-menu > li").length;
    var middle = Math.round(menu_item_number / 2);
    jQuery(".menu-with-logo > .main-menu > li:nth-child(" + middle + ")").after(jQuery('<li class="menu-logo">'+logoContent+'</li>'));
    if (typeof logoContent !== 'undefined') {
        jQuery(".ts-sticky-menu .main-menu > li:nth-child(" + middle + ")").after(jQuery('<li class="menu-logo">'+logoContent+'</li>'));
    }
}

jQuery(document).on('click', '#ts-mobile-menu .trigger', function(event){
    event.preventDefault();
    jQuery(this).parent().next().slideToggle();
});

jQuery(document).on('click', '#ts-mobile-menu .menu-item-has-children > a', function(event){
    event.preventDefault();
    if (jQuery(this).next().attr('class').split(' ')[0] === 'ts_is_mega_div') {
        jQuery(this).next().children().slideToggle();
    }else{
        jQuery(this).next().slideToggle();
    }
});

jQuery(document).on('click', '.ts-vertical-menu .menu-item-has-children > a', function(event){
    event.preventDefault();
    jQuery(this).parent().toggleClass('collapsed');
    jQuery(this).next().slideToggle();
});

/* This function aligns the vertical center elements */
function alignElementVerticalyCenter(){
    var container = jQuery('.site-section');

    jQuery(container).each(function(){
        if( jQuery(this).hasClass('ts-fullscreen-row') ){
            var windowHeight = jQuery(window).height();
            var containerHeight = windowHeight;
        }else{
            var windowHeight = '100%';
            var containerHeight = jQuery(this).outerHeight();
        }

        var innerContent = jQuery(this).find('.container').height();
        var insertPadding = Math.round((containerHeight-innerContent)/2);

        if( jQuery(this).attr('data-alignment') == 'middle' && jQuery(this).hasClass('ts-fullscreen-row') ){
            jQuery(this).css({'padding-top':insertPadding,'padding-bottom':insertPadding,'min-height':windowHeight});
        }else if( jQuery(this).attr('data-alignment') == 'top' && jQuery(this).hasClass('ts-fullscreen-row') ){
            jQuery(this).css('min-height',windowHeight);
        }else if( jQuery(this).attr('data-alignment') == 'bottom' && jQuery(this).hasClass('ts-fullscreen-row') ){
            jQuery(this).css({'width':'100%','height':containerHeight,'position':'relative','min-height':windowHeight});
            jQuery(this).children('.container').css({'width':'100%','height':'100%'});
            jQuery(this).find('.row-align-bottom').css({'position':'absolute','width':'100%','bottom':'0'});
        }
    });

    // align the elements vertically in the middle for banner box
    if( jQuery('.ts-banner-box').length > 0 ){
        jQuery('.ts-banner-box').each(function(){
            var containerHeight = jQuery(this).outerHeight();
            var innerContent = jQuery(this).find('.container').height();
            var insertPadding = Math.round((containerHeight-innerContent)/2);

            jQuery(this).css({'padding-top':insertPadding,'padding-bottom':insertPadding});
        });
    }

}

function alignMegaMenu(){
    setTimeout(function(){
        if ( jQuery('.main-menu').length > 0 ) {
            jQuery('.main-menu').each(function(){
                if( !jQuery(this).parent().hasClass('mobile_menu') ){
                    var thisElem = jQuery(this).find('.is_mega .ts_is_mega_div');
                    if ( jQuery(thisElem).length > 0 ) {
                        var windowWidth = jQuery(window).width();
                        var thisElemWidth = jQuery(thisElem).outerWidth();
                        jQuery(thisElem).removeAttr('style');
                        var menuOffset = jQuery(thisElem).offset().left;
                        var result = Math.round((windowWidth-thisElemWidth)/2);

                        var result2 = result - menuOffset;
                        jQuery(thisElem).css('left',result2);
                    };
                }
            });
        };
    },100);
}

function fb_comments_width(){
    setTimeout(function(){
        jQuery('#comments .fb-comments').css('width','100%');
        jQuery('#comments .fb-comments > span').css('width','100%');
        jQuery('#comments .fb-comments > span > iframe').css('width','100%');
    },300);
}

function startCounters(){

    jQuery('.ts-counters').each(function(){

        var current = jQuery(this);
        var $chart = current.find('.chart');
        var $cnvSize = (jQuery(this).data('counter-type') == 'with-track-bar') ? 160 : 'auto';
        var bar_color = current.attr('data-bar-color');
        var track_color = '#fff';

        if( bar_color == 'transparent' ) track_color = false;

        $chart.easyPieChart({
            animate: 2000,
            scaleColor: false,
            barColor: bar_color,
            trackColor: track_color,
            size: $cnvSize,
            lineWidth: 10,
            lineCap: 'square',
            onStep: function(from, to, percent) {
                jQuery(this.el).find('.percent').text(Math.round(percent)).css({
                    "line-height": $cnvSize+'px',
                    width: $cnvSize
                })
            }
        });

    });

}

/* Running functions on page load */
jQuery(window).on('load resize orientationchange', function(){
    alignMegaMenu();
});

function showMosaic(){
    jQuery('.mosaic-view').each(function(){
        if(jQuery(this).hasClass('fade-effect')){
            jQuery(this).find('.scroll-container > div').each(function(index){
                var thisElem = jQuery(this);
                var parentOffset = thisElem.parent().parent().parent().parent().offset().left;
                var parentWidth = thisElem.parent().parent().parent().parent().outerWidth();

                if( !thisElem.hasClass('shown') && thisElem.offset().left < parentOffset+parentWidth ){
                    thisElem.delay(index*2).animate({opacity:1},1000).addClass('shown');
                }
            });
        }
    });
}

function getFrameSize(content){

    var frame = jQuery(content),
        new_iframe_url = frame.attr('src').split('?feature=oembed'),
        videoLink = new_iframe_url[0],
        videoWidth = frame.width(),
        videoHeight = frame.height(),
        container = jQuery(".video-container").width(),
        calc = parseFloat(parseFloat(videoWidth/videoHeight).toPrecision(1)),
        frameHeight = parseInt(container/calc)

    var frameOptions = {
        iframe:frame,
        videourl:videoLink,
        iwidth:container,
        iheight:frameHeight
    }
    return frameOptions
}
function autoPlayVideo(){
    var content = jQuery('#videoframe').find('iframe');
    if(content.length != 0 && content.length > 0){
        var option = getFrameSize(content);
    }

    if( Slimvideo.jwplayer == 'y' ){
        jwplayer('videoframe').play();
        jQuery('.overimg').remove();
    }

    if( typeof(option) == 'undefined' ){
        return;
    }

    if( option.iframe.attr('src').indexOf('?autoplay=1') > 0 ) return;

    if ( option.videourl.indexOf('youtube') >= 0 ){
        var videoid = option.videourl.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)\/embed\/([^\s&]+)/);
        if(videoid == null) {
           alert('Video [id] not available!');
        }
    }else if( option.videourl.indexOf('vimeo') >= 0 ){
        var videoid = option.videourl.match(/(?:https?:\/{2})?(?:w{3}\.)?player\.vimeo\.com\/video\/([0-9]*)/);
        if(videoid == null) {
           alert('Video [id] not available!');
        }
    }else{
        alert('No valid video url!');
    };

    jQuery('.overimg').css("display","none");
    jQuery(".video-container").css("display","block");
    option.iframe.css('display','block').attr("src", option.videourl + '?autoplay=1');
}


function getVideoThumb(){

    var content = jQuery('#videoframe').find('iframe');

    // ----- If you want to get the video feature image, decomment the code below ------
    if( content.length > 0 && jQuery.trim(jQuery('.embedded_videos').attr('data-display-button')) != 'true' ){
        var iframe = jQuery('#videoframe iframe'),
            new_iframe_url = iframe.attr('src').split('?feature=oembed'),
            videoLink = new_iframe_url[0];

        jQuery('.over-image').empty();

        if ( videoLink.indexOf('youtube') >= 0 ){
            var videoid = videoLink.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)\/embed\/([^\s&]+)/);

            jQuery('.over-image').append('<img src="http://img.youtube.com/vi/'+videoid[1]+'/maxresdefault.jpg"/>');

        }else if( videoLink.indexOf('vimeo') >= 0 ){
            var videoid = videoLink.match(/(?:https?:\/{2})?(?:w{3}\.)?player\.vimeo\.com\/video\/([0-9]*)/);

            jQuery.getJSON('http://vimeo.com/api/v2/video/'+videoid[1]+'.json?callback=?',{format:"json"},function(data,status){
                var videourl=data[0].url,
                largeThumb=data[0].thumbnail_large,
                raw=largeThumb.split('_'),
                urlsnip=raw[0],
                hdThumb=urlsnip+'_1280.jpg';
                jQuery('.over-image').append('<img src="'+hdThumb+'"/>');
            });
        };
    }
}

function videoPostShow(){

    if ( jQuery('.video-post-open').prev().height() <= 120 ){
        jQuery('.video-post-open').hide();
        jQuery('.video-post-open').prev().find('.content-cortina').hide();
    } else{
        jQuery('.video-post-open').prev().addClass('content-is-big');
    }

    jQuery('.video-post-open').click(function(){
        var element = jQuery(this);

        // Hide the details button if content is smaller



        // If show less
        if ( jQuery(element).hasClass('opened') ){
            jQuery(element).prev().css('height', '100px');
            jQuery(element).prev().find('.content-cortina').show();
            jQuery(element).find('i.icon-up').removeClass('icon-up').addClass('icon-down');
            jQuery(element).removeClass('opened');
        }

        // If show more
        else if ( !jQuery(element).hasClass('opened') ){
            jQuery(element).prev().css('height','auto');
            jQuery(element).prev().find('.content-cortina').hide();
            jQuery(element).find('i.icon-down').removeClass('icon-down').addClass('icon-up');
            jQuery(element).addClass('opened');
        }
        return false;
    });
}

jQuery("li.has-submenu[role='item']").on("click", function (e){
    e.preventDefault();
    jQuery(this).toggleClass('openned');
});

/* ***
* Count down element
*/
function ts_count_down_element() {
    // find all the countdown on the page

    var countdowns = jQuery('.ts-countdown');

    countdowns.each(function(index) {
        // save contect
        var ctx = jQuery(this);

        // get date and time
        var countdown_data = ctx.find('.time-remaining'),
            date = countdown_data.data('date'),
            time = countdown_data.data('time');

        // get dom elements of the countdown
        var $days = ctx.find('.ts-days'),
            $hours = ctx.find('.ts-hours'),
            $minutes = ctx.find('.ts-minutes'),
            $seconds = ctx.find('.ts-seconds');

        // start the countdown
        var days, hours, minutes, seconds, sec_remaining, date_diff;

        start_countdown();

        function start_countdown(){
            var curr_date = new Date(),
                event_date = new Date(date + ' ' + time);

            if ( curr_date > event_date ) {
                ctx.remove();
                return;
            }

            date_diff =  Math.abs(Math.floor( (event_date - curr_date) / 1000));

            days = Math.floor( date_diff / (24*60*60) );
            sec_remaining = date_diff - days * 24*60*60;

            hours = Math.floor( sec_remaining / (60*60) );
            sec_remaining = sec_remaining - hours * 60*60;

            minutes = Math.floor( sec_remaining / (60) );
            sec_remaining = sec_remaining - minutes * 60;

            $days.text( days );
            $hours.text( hours );
            $minutes.text( minutes );
            $seconds.text( sec_remaining );

            setTimeout(start_countdown, 1000);
        }
    });
}

function ts_fullscreen_scroll_btn(){
    var container = jQuery('.site-section'),
        scroll = jQuery('.site-section').attr('data-scroll-btn');

    if ( scroll === 'yes' ) {
        container.find('.ts-scroll-down-btn > a').on('click', function(e){
            e.preventDefault();

            jQuery('html, body').animate({

                scrollTop: jQuery(this).parents('.site-section').outerHeight()

            }, 1000)
        })
    };
}


/* ******************************* */
/*          Video Carousel         */
/* ******************************* */

(function($) {
    $.fn.ts_video_carousel = function(options) {
        var ts_slider_options = $.extend({
            transition: 700
        }, options);

        var $context = $(this),
            $slides = $(this).find('.slides'),
            $slide = $slides.children('li'),
            $nav_arrows = null;

        var viewport = $(window).width(),
            slide_width = $slide.eq(0).outerWidth(true),
            current = 0,
            ts_delay = null;

        // get the height of the slide thumb ( afte the iframe has been resized )
        $(window).load(function(){
            if ( $nav_arrows !== null){
                $nav_arrows.css({ 'height': $slide.find('.thumb').height() });
            }
        });

        $(window).resize(function(){
            // delay the calculation of the viewport on resize
            if ( ts_delay !== null ){
                clearTimeout(ts_delay);
            }

            ts_delay = setTimeout(function(){
                viewport = $(window).width();
                if ( $nav_arrows !== null){
                    $nav_arrows.css({ 'height': $slide.find('.thumb').height() });
                }
                ts_setWidths();
            }, 400);
        });

        // create navigations
        (function ts_createElements(){
            var navigations =  '<div class="nav-arrow prev"><span class="nav-icon icon-left"></span></div>\
                                <div class="nav-arrow next"><span class="nav-icon icon-right"></span></div>';
            $slides.after(navigations);
        })();

        // set initial states for slider elements
        (function ts_video_slider_init(){
            $slides.width( slide_width * $slide.size() );
            $slide.eq(0).addClass('current-active');
            $nav_arrows = $context.find('.nav-arrow');
            $nav_arrows.eq(0).addClass('fade-me');
            ts_setWidths();
        })();

        function ts_setWidths(){
            if ( viewport < slide_width ) {
                $slide.width( viewport );
                slide_width = viewport;

                $slide.css( {
                    'left': slide_width * current * -1
                });
            } else {
                $slide.removeAttr('style');
                slide_width = $slide.width();

                $slide.css( {
                    'left': slide_width * current * -1
                });
            }

            if ( viewport < $context.parent('.ts-video-slider-wrap').width() ) {
                $context.parent('.ts-video-slider-wrap').width(viewport);
            } else {
                $context.parent('.ts-video-slider-wrap').removeAttr('style');
            }
        };

        $slide.on( 'click', function(){
            if ( $(this).index() < current ){
                $slide.eq(current).removeClass('current-active');
                current--;

            } else if( $(this).index() > current) {
                $slide.eq(current).removeClass('current-active');
                current++;
            }
            ts_changeSlide()
        });

        $nav_arrows.on('click', function(){
            if ( $(this).hasClass('next') ) {
                if ( current !== $slide.size() - 1) {
                    $slide.eq(current).removeClass('current-active');
                    current++;
                    $nav_arrows.eq(0).removeClass('fade-me');
                    ts_changeSlide();
                }
                if ( $nav_arrows.eq(0).hasClass('fade-me') ){
                    $nav_arrows.eq(0).removeClass('fade-me');
                }
            }
            else if( $(this).hasClass('prev') ){
                if ( parseFloat($slide.eq(0).css('left').replace( 'px', '')) < 0 && current > 0 ) {
                    $slide.eq(current).removeClass('current-active');
                    current--;
                    ts_changeSlide();
                }

                if ( $nav_arrows.eq(1).hasClass('fade-me') ){
                    $nav_arrows.eq(1).removeClass('fade-me');
                }
            }
        });

        function ts_changeSlide(){
            $slide.animate({
                'left': ( slide_width ) * current * -1
            }, {
                duration: ts_slider_options.transition,
                complete: function() {
                    $slide.eq(current).addClass('current-active');
                }
            });

            if ( current === 0){
                $nav_arrows.eq(0).addClass('fade-me');
            }
            else if( current === $slide.size() - 1){
                $nav_arrows.eq(1).addClass('fade-me');
            }
        }
    }
})(jQuery);

function ts_scroll_top(){
    jQuery(window).scroll(function() {
        if(jQuery(this).scrollTop() > 200){
            jQuery('#ts-back-to-top').stop().animate({
                bottom: '30px'
            }, 500);
        }else{
            jQuery('#ts-back-to-top').stop().animate({
               bottom: '-100px'
            }, 500);
        }
    });
    jQuery('#ts-back-to-top').on('click',function() {
        jQuery('html, body').stop().animate({
           scrollTop: 0
        }, 500, function() {
            jQuery('#ts-back-to-top').stop().animate({
                bottom: '-100px'
            }, 500);
        });
    });
}

jQuery(document).ready(function($){

    jQuery('.tab-content .active').find('input[type="text"], input[type="file"], textarea').attr('required', 'required');

    jQuery(document).on('click', '.ts-item-tab', function (e) {
        e.preventDefault();

        var id = jQuery(this).find('a').attr('href'),
            parent = jQuery(this).closest('.ts-tab-container');

        parent.find('.active').removeClass('active');

        jQuery(this).addClass('active');

        jQuery(id).addClass('active');

    });

    ts_scroll_top();

    if( jQuery('.ts-captcha').length > 0 ){
        jQuery(document).on('click', '.ts-regenerate-captcha', function(event) {
            event.preventDefault();
            var data,
                such = jQuery(this);

            data = {
                'action': 'vdf_regenerateCaptcha',
                'token' : Slimvideo.contact_form_token
            };

            jQuery.post(Slimvideo.ajaxurl, data, function(data, textStatus, xhr) {
                such.parent().find('.ts-img-captcha').fadeOut('400', function(){
                    such.parent().find('.ts-img-captcha').replaceWith(data);
                });
            });
        });
    }

    if( jQuery(".ts-map-create").length > 0 ){
        google.maps.event.addDomListener(window, "load", initialize);
    }

    //Count To
    $.fn.countTo = function() {

        var element = this;

        function execute() {

            element.each(function(){

                var item = $(this).find('.countTo-item');

                item.each(function(){

                    var current = $(this),
                        percent = current.find('.skill-level').attr('data-percent');

                    if ( !current.hasClass('animated') ) {
                        current.find('.skill-title').css({'color' : 'inherit'});
                        if( element.hasClass('ts-horizontal-skills') ){
                            current.find('.skill-level').animate({'width' : percent+'%'}, 800);
                        } else {
                            current.find('.skill-level').animate({'height' : percent+'%'}, 800);
                        }
                        current.addClass('animated');
                    }

                    if ( current.hasClass('animated') && element.attr('data-percentage') == 'true' && current.find('.percent').length < 1 ) {
                        current.append('<span class="percent">'+percent+'%'+'</span>');
                        current.find('.percent').css({'left' : percent+'%'}).delay(1600).fadeIn();
                    };

                    if ( percent == 100 ) {
                        item.addClass('full');
                    };

                })

            })

        }

        execute();

        return this;
    };

    ts_set_like();

    /* Widget Tabs */

    jQuery('.tabs-control > li > a').click(function () {
        var this_id = jQuery(this).attr('href'); // Get the id of the div to show
        var tabs_container_divs = '.' + jQuery(this).parent().parent().next().attr('class') + ' >  div'; // All of elements to hide
        jQuery(tabs_container_divs).hide(); // Hide all other divs
        jQuery(this).parent().parent().next().find(this_id).show(); // Show the selected element
        jQuery(this).parent().parent().find('.active').removeClass('active'); // Remove '.active' from elements
        jQuery(this).addClass('active'); // Add class '.active' to the active element
        return false;
    });

    jQuery('.toggle_title').click(function () {
        jQuery(this).next().slideToggle('fast');
        jQuery(this).find('.toggler').toggleClass('toggled');
    });

    jQuery('.tabs-switch li a').click(function () {
        var tab_id = jQuery(this).attr('href');
        if (jQuery(this).parent().parent().next().find(tab_id).is(':hidden')) {
            jQuery(this).parent().parent().find('li').removeClass('active');
            jQuery(this).parent().addClass('active');
            jQuery(this).parent().parent().next().find('div').hide('fast');
        }
        jQuery(this).parent().parent().next().find(tab_id).show('fast');
        return false;
    });

    var $container = jQuery('.shortcode_accordion > div'),
        $trigger = jQuery('.shortcode_accordion > h3');
    $container.hide();
    $trigger.first().addClass('toggled').next().show();
    $trigger.on('click', function (e) {
        if (jQuery(this).next().is(':hidden')) {
            $trigger.removeClass('toggled').next().slideUp(300);
            jQuery(this).toggleClass('toggled').next().slideDown(300);
        }
        e.preventDefault();
    });

    jQuery('.shortcode_infobox .close').click(function () {
        jQuery(this).parent().fadeOut(500);
    });

    if(jQuery('#videoframe').find('iframe').length > 0){
        var option = getFrameSize('#videoframe iframe');
    }

    jQuery('.video-single-resize').on('click', function(){
        var date = new Date();
        date.setTime(date.getTime() + (1 * 60 * 1000));
        if( jQuery('.video-featured-image > .container').hasClass('is-smaller') != true ){
            var videoType = 'small';
        }else{
            var videoType = 'big';
        }
        jQuery.cookie('ts_single_video_resize_type', videoType, { expires: date, path:'/' });

        ExpireCookie(1, 'ts_single_video_resize');
    });

    jQuery('a.videoPlay').on('click',function(event){
        event.preventDefault();
        setTimeout(function(){
            autoPlayVideo();
        },500)

        // If is single video 4, hide the meta
        if ( jQuery(this).parents('.embedded_videos').hasClass('single4') ) {
            jQuery('.show-hide-meta').trigger('click');
        }
    });

    jQuery('#searchbox .search-trigger').on('click', function(e){
        e.preventDefault();
        jQuery(this).next().addClass('active');
        jQuery('#searchbox .hidden-form-search input[type="text"]').focus();
        jQuery('.ts-sticky-menu').addClass('search-is-active');
    })

    jQuery('#searchbox .search-close').on('click', function(e){
        e.preventDefault();
        jQuery(this).parent().removeClass('active');
        jQuery('.ts-sticky-menu').removeClass('search-is-active');
    })

    jQuery("body").keydown(function (e) {

        if(e.which == 27){
            jQuery("#searchbox .search-close").parent().removeClass('active');
            jQuery('#searchbox .search-close').trigger('click');
        }
    })

    jQuery('.single .post-rating .rating-items > li').each(function(){
        var bar_width = jQuery(this).find('.bar-progress').data('bar-size');

        jQuery(this).find('.bar-progress').css({width: bar_width+'%'});
    })

    jQuery('.absolute-share li').click(function(){
        var social = jQuery(this).attr('data-social');
        var postId = jQuery(this).attr('data-post-id');
        var socialCount = jQuery(this).find('.how-many');

        var data = {
                action      : 'ts_set_share',
                ts_security : Slimvideo.ts_security,
                postId      : postId,
                social      : social
            };

        jQuery.post(Slimvideo.ajaxurl, data, function(response){

            if( response && response !== '-1' ){
                jQuery(socialCount).text(response);
                jQuery('.counted').text(parseInt(jQuery('.counted').text()) + 1);
            }
        });
    });

    // Show more button on share
    jQuery('.share-options .show-more').on('click', function(e){
        e.preventDefault();
        if ( jQuery(this).children().attr('data-tooltip') !== 'hide' ) {
            jQuery(this).children().attr('data-tooltip','hide');
        } else {
            jQuery(this).children().attr('data-tooltip','show more');
        };
        var this_item = jQuery(this).parent().find('.share-menu-item');
        this_item.each(function(){
            if( !jQuery(this).hasClass('shown') ){
                jQuery(this).toggleClass('hidden');
            }
        })
    });

    $('.ts-vertical-menu').find('.menu-item-has-children').each(function(){
        var url_link = $(this).children('a').attr('href');
        $(this).children('a').attr('href','#');
        $(this).append('<span class="menu-item-url-link"><a href="'+url_link+'" title="View page"><i class="icon-link"></i></a></span>')
    });

    $('.menu-item-type-taxonomy').each(function(){
        if($(this).find('.ts_is_mega_div').length !== 0){
            $(this).addClass('menu-item-has-children is_mega');
        }
    })

    $('.ts-user-login-modal').find('form > p').each(function(){
        var inputResult = $(this).children('label').html();
        $(this).children('input').attr('placeholder',inputResult);
    })
    $('.ts-user-login-modal').find('.login-submit input[type="submit"]').attr('class','btn medium active');

    jQuery('.ts-url li').first().trigger('click');

    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){

        $('#ts-video-type').val($(this).attr('data-video-type'));

    });

    function ts_ajax_load_more(){

        $('.ts-pagination-more').click(function(){

            var loop            = parseInt( $(this).attr('data-loop') );
            var args            = $(this).attr('data-args');
            var paginationNonce = $(this).find('input[type="hidden"]').val();
            var loadmoreButton  = $(this);
            var $container      = $(this).prev();

            // Show preloader
            $('#ts-loading-preload').show();
            loadmoreButton.attr('data-loop', loop + 1);

            jQuery.post(Slimvideo.ajaxurl, {
                    action         : 'ts_pagination',
                    args           : args,
                    paginationNonce: paginationNonce,
                    loop           : loop
                },  function(data){
                        if( data !== '0' ){

                            if( $container.hasClass('ts-filters-container') ){
                                var data_content = $(data).appendTo($container);
                                $container.isotope('appended', $(data_content));
                                setTimeout(function(){
                                    $container.isotope('layout');
                                },1200);
                            }else{
                                $container.append($(data));
                            }

                            if( $container.hasClass('ts-filters-container') ){
                                if( jQuery("img.lazy").length > 0 ){
                                    jQuery("img.lazy").lazyload({
                                        effect : "fadeIn",
                                        load : function(){
                                            setTimeout(function(){
                                                $container.isotope('layout');
                                            }, 1200);
                                        }
                                    });
                                }else{
                                    $container.isotope('layout');
                                }

                            }else{
                                if( jQuery("img.lazy").length > 0 ){
                                    jQuery("img.lazy").lazyload({
                                        effect : "fadeIn"
                                    });
                                }
                            }
                        }else{
                            loadmoreButton.remove();
                        }
                        // Hide the preloader
                        $('#ts-loading-preload').hide();
                    }
            );
        });
    }
    ts_ajax_load_more();

    //circle share effect on single video page
    $('.post-share-box-circle').find('label').on('click', function(e){
        e.preventDefault();
        $(this).toggleClass('shown');
    });

   function ts_send_date_ajax(id){

        $(document).on('click', '.contact-form-submit', function(event) {
            event.preventDefault();

            var form         = $(this).closest('form'),
                name         = form.find('.contact-form-name'),
                email        = form.find('.contact-form-email'),
                subject      = form.find('.contact-form-subject'),
                message      = form.find('.contact-form-text'),
                emailRegEx   = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                errors       = 0,
                custom_field = form.find('.ts_contact_custom_field'),
                data         = {},
                this_element = jQuery(this),
                capcha       = form.find('.ts-captcha');

            String.prototype.trim = function() {
                return this.replace(/^\s+|\s+$/g,"");
            };

            if ( emailRegEx.test(email.val()) ) {
                email.removeClass('invalid');
            } else {
                email.addClass('invalid');
                errors = errors + 1;
            }

            jQuery(custom_field).each(function(i,val){
                if(jQuery(this).hasClass('contact-form-require')){
                    if (jQuery(this).val().trim() !== '') {
                        jQuery(this).removeClass('invalid');
                    } else {
                        jQuery(this).addClass('invalid');
                        errors = errors + 1;
                    }
                }
            });

            if (name.val().trim() !== '') {
                name.removeClass('invalid');
            } else {
                name.addClass('invalid');
                errors = errors + 1;
            }

            if( capcha.length > 0 ){
                if (capcha.val().trim() !== '') {
                    capcha.removeClass('invalid');
                } else {
                    capcha.addClass('invalid');
                    errors = errors + 1;
                }
            }

            if ( subject.length !== 0 ) {
                if (subject.val().trim() !== '') {
                    subject.removeClass('invalid');
                } else {
                    subject.addClass('invalid');
                    errors = errors + 1;
                }
            }

            if (message.val().trim() !== '') {
                message.removeClass('invalid');
            } else {
                message.addClass('invalid');
                errors = errors + 1;
            }

            if ( errors === 0 ) {

                data['action']  = 'slimvideo_contact_me';
                data['token']   = Slimvideo.contact_form_token;
                data['name']    = name.val().trim();
                data['from']    = email.val().trim();
                data['subject'] = (subject.length) ? subject.val().trim() : '';
                data['message'] = message.val().trim();
                data['custom_field'] = new Array();

                jQuery(custom_field).each(function(i,val){
                    var title = jQuery(this).next().val();
                    var value = jQuery(this).val();
                    var require = jQuery(this).next().next().val();
                    var new_item = {value : value, title: title, require: require};
                    data['custom_field'].push(new_item);
                });

                if( capcha.length > 0 ){
                    data['capcha'] = capcha.val();
                    data['prefix'] = capcha.closest('form').find('.ts-img-captcha').data('prefix');
                }

                $.post(Slimvideo.ajaxurl, data, function(data, textStatus, xhr) {
                    form.find('.contact-form-messages').html('');
                    if ( data !== '-1' ) {
                        if ( data.status === 'ok' ) {
                            form.find('.contact-form-messages').removeClass("hidden").html(Slimvideo.contact_form_success).addClass('success');
                            jQuery(this_element).attr('disabled', 'disabled');
                            form.find("input, textarea").not(".contact-form-submit").val('');

                        } else {
                            form.find('.contact-form-messages').removeClass("hidden").html('<div class="invalid">' + data.message + '</div>');
                        }

                        if ( typeof data.token !== "undefined" ) {
                            Slimvideo.contact_form_error = data.token;
                        }

                    } else {
                        form.addClass('hidden');
                        form.find('.contact-form-messages').html(Slimvideo.contact_form_error);
                        // $(clickElement).removeAttr('disabled');
                    }
                });
            }
        });
    }
    ts_send_date_ajax();

    jQuery(document).on('click', '.ts-get-calendar', function(){
        var tsYear  = jQuery(this).attr('data-year');
        var tsMonth = jQuery(this).attr('data-month');
        var classSize = 'ts-big-calendar';

        if(jQuery(this).parent().find('.ts-events-calendar').hasClass('ts-small-calendar')){
            classSize = 'ts-small-calendar';
        }

        var tsCalendar = jQuery(this).parent();
        var data = {};

        data = {
            action  : 'ts_draw_calendar',
            nonce   : Slimvideo.ts_security,
            tsYear  : tsYear,
            tsMonth : tsMonth,
            size    : classSize
        };

        jQuery.post(Slimvideo.ajaxurl, data, function(response) {

            if( response ) {
                jQuery(tsCalendar).html(response);
            }
        });
        return false;
    });

    jQuery('.ts-select-by-category li').click(function(){

        var idCategory = jQuery(this).attr('data-category-li');

        jQuery('.ts-select-by-category li').each(function(){
            if( jQuery(this).hasClass('active') ){
                jQuery(this).removeClass('active');
            }
        })

        jQuery(this).addClass('active');

        jQuery(this).closest('section').find('.ts-tabbed-category').each(function(){
            jQuery(this).removeClass('go');
            jQuery(this).css('display', 'none').removeClass('shown');
        });
        var sortableDiv = 0;
        jQuery(this).closest('section').find('.ts-tabbed-category').each(function(index, element){
            var categories = jQuery(this).attr('data-category').split('\\');
            jQuery(this).attr('data-id', index);
            for(var category in categories){
                if( idCategory == categories[category] ){
                    var thisHtml = jQuery(this).css('display', '').get(0).outerHTML;
                    jQuery('[data-category-div="' + idCategory + '"]').find('.ts-cat-row').append(thisHtml);
                    jQuery(this).remove();
                }
            }
        });

        jQuery('div[data-category-div]').each(function(){
            var i = 1;
            jQuery(this).find('.ts-tabbed-category').each(function(){
                jQuery(this).attr('data-id', i);
                i++
            });
        });

        jQuery.force_appear();
    });

    $('#ts-show-login-modal').click(function(e){
        e.preventDefault();

        $('#ts-login-modal').modal('show');
        $('.modal-backdrop').removeClass("modal-backdrop");

        if( $('.ts-user-login-modal .modal-body .ts-login').hasClass('slideX') ){
            $('.ts-show-login-modal').trigger('click');
        }
    });

    jQuery('.ts-form-login input[type="submit"]').click(function(e){
		jQuery("#loginform1").trigger("submit");
        //e.preventDefault();
        //var thisError = jQuery(this).closest('.ts-form-login').find('.ts-login-error');
        //var login = jQuery(this).closest('form').find('input[name="log"]').val();
        //var password = jQuery(this).closest('form').find('input[name="pwd"]').val();
        //var remember = jQuery(this).closest('form').find('input[name="rememberme"]').is(':checked') ? 'forever' : 'notforever';
		

        /*jQuery.post(Slimvideo.ajaxurl, {
                action     : 'tsLogUser',
                ts_security: Slimvideo.ts_security,
                login      : login,
                remember   : remember,
                password   : password
            }, function(data){
                if( data == 'islog' ){
                    location.reload();
                }else{
                    thisError.html(data);
                }
            }
        );*/
    });

    jQuery('.ts-add-favorite').click(function(e){
        e.preventDefault();
        var postId = jQuery('#ts-post-video-id').val();
        var makeAction = jQuery(this).attr('data-action');

        jQuery.post(Slimvideo.ajaxurl, {
                action     : 'tsAddFavorite',
                ts_security: Slimvideo.ts_security,
                postId     : postId,
                makeAction : makeAction
            }, function(data){
                if( data == 'succes' ){
                    if( makeAction == 'add' ){
                        jQuery('.ts-display-favorite').addClass('hidden');
                        jQuery('.ts-remove-favorite').removeClass('hidden');
                    }else{
                        jQuery('.ts-remove-favorite').addClass('hidden');
                        jQuery('.ts-display-favorite').removeClass('hidden');
                    }
                }
            }
        );
    });

    if( jQuery('.ts-preroll').length > 0 ){
        jQuery('.featured-video').hide();
        resizePreRoll();
    }

    jQuery(document).on('click', '.ts-preroll-linkto', function(event){
        var contentVideoPreRoll = jQuery(this).closest('.ts-preroll');
        var timePreroll = jQuery(this).closest('.ts-preroll').attr('data-time');
        var prerollId = jQuery(this).closest('.ts-preroll').attr('data-id');

        jQuery.post(Slimvideo.ajaxurl, {
                action     : 'tsSetViewClickPreroll',
                ts_security: Slimvideo.ts_security,
                prerollId  : prerollId,
                field      : 'click'
            }, function(data){
                return;
            }
        );
    });

    jQuery(document).on('click', '.ts-preroll .mejs-overlay-play', function(event){
        var thisContainer = jQuery(this).closest('.embedded_videos');
        var contentVideoPreRoll = jQuery(this).closest('.ts-preroll');
        var timePreroll = jQuery(this).closest('.ts-preroll').attr('data-time');
        var prerollId = jQuery(this).closest('.ts-preroll').attr('data-id');
        jQuery('.mejs-overlay.mejs-layer.mejs-overlay-play').remove();

        jQuery.post(Slimvideo.ajaxurl, {
                action     : 'tsSetViewClickPreroll',
                ts_security: Slimvideo.ts_security,
                field      : 'view',
                prerollId  : prerollId
            }, function(data){
                return;
            }
        );

        setTimeout(function(){
            contentVideoPreRoll.remove();
            jQuery('.featured-video').show();
            jQuery('.videoPlay').click();
            jQuery('.mejs-play').click();
            if( jQuery('.embedded_videos iframe').length > 0 ){
                autoPlayVideo();
            }
            if( Slimvideo.jwplayer == 'y' ){
                jwplayer('videoframe').play();
            }
        }, timePreroll * 1000);

        var myCounter = new Countdown({
            seconds: timePreroll-1,  // number of seconds to count down
            onUpdateStatus: function(sec){
                jQuery('#pre-roll-counter span').text(sec);
            }, // callback for each second
            onCounterEnd: function(){
                resizeVideo();
            } // final action
        });

        myCounter.start();
        jQuery('#pre-roll-counter').delay(1000).fadeIn(200);

    });

    if( Slimvideo.animsitionIn !== 'none' ){
        jQuery(".animsition").animsition({
            inClass     :   Slimvideo.animsitionIn,
            outClass    :   Slimvideo.animsitionOut,
            linkElement :   '.main-menu a, .ts-user-profile-dw a, .ts-big-posts a, .ts-grid-view a, .ts-list-view a, .ts-thumbnail-view a, .ts-big-posts a, .ts-super-posts a, .ts-timeline-view a, .mosaic-view a, .ts-small-news:not(.ts-featured-area-small) a, .ts-image-element a, .ts-icon-box a, .ts-listed-features a, .featured-area-tabs .entry-content a, .ts-banner-box a, .testimonials a, .ts-ribbon-banner a, .ts-video-carousel a, .ts-powerlink a, .ts-article-accordion .inner-content a, .ts-list-users a, .ts-animsition a, .ts-pricing-view a, .teams a, .block-title a, .featured-area-content a, .ts-breadcrumbs a, .ts-featured-article a, .logo, .video-single-section a, .post-video-content a'
        });
    }

    jQuery('.ts-featured-area-item').click(function(e){
        e.preventDefault();
        var postId = jQuery(this).attr('data-id');
        jQuery(this).closest('.ts-featured-area-small').find('.ts-featured-area-item').each(function(){
            jQuery(this).removeClass('ts-active');
        });
        jQuery(this).addClass('ts-active');
        jQuery(this).closest('.post-slider').find('.ts-featured-area-big-item').addClass('hidden');
        jQuery(this).closest('.ts-featured-area-small').parent().find('[data-id="' + postId + '"]').removeClass('hidden');
        resizeVideo();
    });

    if( jQuery('.ts-featured-area-item').length > 0 ){
        jQuery('.ts-featured-area-item').each(function(){
            if( jQuery(this).hasClass('ts-active') ){
                var postId = jQuery(this).attr('data-id');
                jQuery(this).closest('.ts-featured-area-small').find('.ts-featured-area-item').each(function(){
                    jQuery(this).removeClass('ts-active');
                });
                jQuery(this).addClass('ts-active');
                jQuery(this).closest('.post-slider').find('.ts-featured-area-big-item').addClass('hidden');
                jQuery(this).closest('.ts-featured-area-small').parent().find('[data-id="' + postId + '"]').removeClass('hidden');
            }
        });
    }

});

function Countdown(options) {
    var timer,
    instance = this,
    seconds = options.seconds || 10,
    updateStatus = options.onUpdateStatus || function () {},
    counterEnd = options.onCounterEnd || function () {};

    function decrementCounter() {
        updateStatus(seconds);
        if (seconds === 0) {
          counterEnd();
          instance.stop();
        }
        seconds--;
    }

    this.start = function () {
        clearInterval(timer);
        timer = 0;
        seconds = options.seconds;
        timer = setInterval(decrementCounter, 1000);
    };

    this.stop = function () {
        clearInterval(timer);
    };
}

var map, mapAddress, latlng, mapLat, mapLng, mapType, mapStyle, mapZoom,
    mapTypeCtrl, mapZoomCtrl, mapScaleCtrl, mapScroll, mapDraggable, mapMarker;
var style = '';

    var infinite_loading = false;
    jQuery(window).on('scroll',function() {
        jQuery(".ts-infinite-scroll").each(function(){
            var thisElem = jQuery(this);
            if( thisElem.prev().offset().top + thisElem.parent().height() - 120 < jQuery(window).scrollTop() + jQuery(window).height() && infinite_loading == false ){

                infinite_loading = true;
                jQuery(thisElem).trigger("click");
                setTimeout(function(){
                    infinite_loading = false;
                }, 1000)
            }
        });
    });
function ts_select_post_by_category(){
    jQuery('.ts-select-by-category li:first-child').each(function(){
        jQuery(this).trigger('click');
    });
}

function initialize(){
    jQuery('.ts-map-create').each(function(){
        var element = jQuery(this);
        mapAddress = jQuery(element).attr('data-address');
        mapLat = jQuery(element).attr('data-lat');
        mapLng = jQuery(element).attr('data-lng');
        mapStyle = jQuery(element).attr('data-style');
        mapZoom = jQuery(element).attr('data-zoom');
        mapTypeCtrl = (jQuery(element).attr('data-type-ctrl') === 'true') ? true : false;
        mapZoomCtrl = (jQuery(element).attr('data-zoom-ctrl') === 'true') ? true : false;
        mapScaleCtrl = (jQuery(element).attr('data-scale-ctrl') === 'true') ? true : false;
        mapScroll = (jQuery(element).attr('data-scroll') === 'true') ? true : false;
        mapDraggable = (jQuery(element).attr('data-draggable') === 'true') ? true : false;
        mapMarker = jQuery(element).attr('data-marker');

        if( jQuery(element).attr('data-type') === 'ROADMAP' )
            mapType = google.maps.MapTypeId.ROADMAP
        else if( jQuery(element).attr('data-type') === 'HYBRID' )
            mapType = google.maps.MapTypeId.HYBRID
        else if( jQuery(element).attr('data-type') === 'SATELLITE' )
            mapType = google.maps.MapTypeId.SATELLITE
        else if( jQuery(element).attr('data-type') === 'TERRAIN' )
            mapType = google.maps.MapTypeId.TERRAIN
        else
            mapType = google.maps.MapTypeId.ROADMAP

        // How you would like to style the map.
        // This is where you would paste any style found on Snazzy Maps.
        if ( mapStyle === 'map-style-essence' ){
            style = [{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill"},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#7dcdcd"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]}]

        } else if( mapStyle === 'map-style-subtle-grayscale' ){
            style = [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]

        } else if( mapStyle === 'map-style-shades-of-grey' ){
            style = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]}]

        } else if( mapStyle === 'map-style-purple' ){
            style = [{"featureType":"all","elementType":"all","stylers":[{"visibility":"simplified"},{"hue":"#bc00ff"},{"saturation":"0"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#e8b8f9"}]},{"featureType":"administrative.country","elementType":"labels","stylers":[{"color":"#ff0000"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#3e114e"},{"visibility":"simplified"}]},{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"},{"color":"#a02aca"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"simplified"},{"color":"#2e093b"}]},{"featureType":"landscape.natural","elementType":"labels.text","stylers":[{"color":"#9e1010"},{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"labels.text.fill","stylers":[{"color":"#ff0000"}]},{"featureType":"landscape.natural.landcover","elementType":"all","stylers":[{"visibility":"simplified"},{"color":"#58176e"}]},{"featureType":"landscape.natural.landcover","elementType":"labels.text.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#a02aca"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#d180ee"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#a02aca"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"off"},{"color":"#ff0000"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"color":"#a02aca"},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#cc81e7"},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"visibility":"simplified"},{"hue":"#bc00ff"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#6d2388"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#c46ce3"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#b7918f"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#280b33"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"simplified"},{"color":"#a02aca"}]}];

        } else if( mapStyle === 'map-style-best-ski-pros' ){
            style = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#2c3645"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#dcdcdc"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"color":"#476653"}]},{"featureType":"landscape.natural.landcover","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#93d09e"}]},{"featureType":"landscape.natural.terrain","elementType":"labels","stylers":[{"visibility":"on"},{"color":"#0d6f32"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.stroke","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#62bf85"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#95c4a7"}]},{"featureType":"road","elementType":"labels.text","stylers":[{"color":"#334767"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#334767"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b7b7b7"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"on"},{"color":"#364a6a"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"visibility":"on"}]},{"featureType":"transit.station.rail","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#535353"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#3fc672"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#4d6489"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]}]

        } else {
            style = '';
        }

        latlng = new google.maps.LatLng(mapLat, mapLng);

        var mapOptions = {
            zoom: parseInt(mapZoom),
            center: latlng,
            styles: style,
            zoomControl: mapZoomCtrl,
            scaleControl: mapScaleCtrl,
            mapTypeControl: mapTypeCtrl,
            scrollwheel: mapScroll,
            draggable: mapDraggable,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            },
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL
            },
            mapTypeId: mapType
        }
        var idElement = jQuery(element).attr('id');

        map = new google.maps.Map(document.getElementById(idElement), mapOptions);

        var marker = new google.maps.Marker({
            map: map,
            icon: mapMarker,
            position: latlng,
            title: mapAddress
        });
    });
}

jQuery(window).load(function() {
    initCarousel();
    activateStickyMenu();
    filterButtonsRegister();
    hidePreloader();
    twitterWidgetAnimated();
    fb_comments_width();
    alignElementVerticalyCenter();
    showMosaic();
    alignMegaMenu();
    resizeVideo();
    videoPostShow();
    getVideoThumb();
    ts_count_down_element();
    ts_fullscreen_scroll_btn();
    ts_select_post_by_category();
    single4_video();

    jQuery('.joyslider').addClass('active');

    // If onepage layout - run the onepage menu
    if ( ts_onepage_layout == 'yes' ) {
        startOnePageNav();
    }

    jQuery('.flexslider').each(function(){
        var nav_control;
        if( jQuery(this).hasClass('with-thumbs') ){
            nav_control = 'thumbnails';
        } else{
            nav_control = 'none';
        }
        var nav_animation = jQuery(this).attr('data-animation');
        jQuery(this).flexslider({
            animation: nav_animation,
            controlNav: nav_control,
            prevText: "",
            nextText: "",
            smoothHeight: true

        });
    });

    jQuery('.ts-horizontal-skills > li').each(function(index){
        var thisElem = jQuery(this);
        if ( thisElem.isOnScreen() ) {
            jQuery('.ts-horizontal-skills').countTo();
        };
    });

    jQuery('.ts-vertical-skills > li').each(function(index){
        var thisElem = jQuery(this);
        if ( thisElem.isOnScreen() ) {
            jQuery('.ts-vertical-skills').countTo();
        };
    });

    jQuery('.ts-counters').each(function(index){
        var thisElem = jQuery(this);
        if ( thisElem.isOnScreen() ) {
            startCounters();
        };
    });

    jQuery(window).on('scroll',function(){
        jQuery('.ts-horizontal-skills > li').each(function(index){
            var thisElem = jQuery(this);
            if ( thisElem.isOnScreen() ) {
                jQuery('.ts-horizontal-skills').countTo();
            };
        });

        jQuery('.ts-vertical-skills > li').each(function(index){
            var thisElem = jQuery(this);
            if ( thisElem.isOnScreen() ) {
                jQuery('.ts-vertical-skills').countTo();
            };
        });

        jQuery('.ts-counters').each(function(index){
            var thisElem = jQuery(this);
            if ( thisElem.isOnScreen() ) {
                startCounters();
            };
        });
    });

    jQuery('.panel-heading a[data-toggle="collapse"]').on('click', function(){
        var panelCollapse = jQuery(this).parent().next();
        if ( panelCollapse.hasClass('in')) {
            jQuery(this).find('i').css({
                '-webkit-transform': 'rotate(0deg)',
                '-o-transform': 'rotate(0deg)',
                '-mz-transform': 'rotate(0deg)',
                'transform': 'rotate(0deg)'
            })
        } else {
            jQuery(this).find('i').css({
                '-webkit-transform': 'rotate(90deg)',
                '-o-transform': 'rotate(90deg)',
                '-mz-transform': 'rotate(90deg)',
                'transform': 'rotate(90deg)'
            })
        }
    });

    jQuery('.megaWrapper').each(function(){
        if( jQuery(this).hasClass('ts-behold-menu') ){
            jQuery(this).removeClass('ts-behold-menu').addClass('ts-mega-menu');
        }
        jQuery(this).find('.ts_is_mega_div .sub-menu').addClass('ts_is_mega');
        jQuery(this).find('.ts_is_mega_div').parent().addClass('is_mega');
    })

    var all_anchor = jQuery('.ts-article-accordion > .panel-group').find('.panel-title > a');

    all_anchor.on('click', function(){
        all_anchor.not(this).parent().parent().removeClass('hidden');
        jQuery(this).parent().parent().addClass('hidden');
    });

}); //end load function

function resizePreRoll(){
    // Resize the pre-roll video
    var preRollContainerWidth = jQuery('.ts-preroll').parent().width();
    var preRollContainerHeight = preRollContainerWidth/1.777;

    // Set the sizes for pre-roll
    jQuery('.ts-preroll').width(preRollContainerWidth);
    jQuery('.ts-preroll').height(preRollContainerHeight);
    jQuery('.ts-preroll > .wp-video').width(preRollContainerWidth);
    jQuery('.ts-preroll > .wp-video').height(preRollContainerHeight);
    setTimeout(function(){
        jQuery('.ts-preroll > .wp-video > .mejs-container').width(preRollContainerWidth);
        jQuery('.ts-preroll > .wp-video > .mejs-container').height(preRollContainerHeight);
        jQuery('.ts-preroll .mejs-overlay').width(preRollContainerWidth);
        jQuery('.ts-preroll .mejs-overlay').height(preRollContainerHeight);
        jQuery('.ts-preroll .wp-video-shortcode').attr('width', preRollContainerWidth);
        jQuery('.ts-preroll .wp-video-shortcode').attr('height', preRollContainerHeight);
        jQuery('.ts-preroll .wp-video-shortcode').width(preRollContainerWidth);
        jQuery('.ts-preroll .wp-video-shortcode').height(preRollContainerHeight);
    }, 700);
}

// Start resize function
jQuery(window).on('resize', function(){
    single4_video();
    resizePreRoll();
});

/*****  Single videos show more button  *****/
jQuery('.ts-show-more').click(function(){
    var elem = jQuery(this);
    elem.prev().toggleClass('contained');
    return false;
});

// Single videos sharing

jQuery('.post-share a').click(function(){
    jQuery('.absolute-share').fadeIn(100);
    setTimeout(function(){
        jQuery('.absolute-share > ul').addClass('active');
    },200);
    return false;
});
jQuery('.absolute-share .close-share').click(function(){
    jQuery('.absolute-share > ul').removeClass('active');
    setTimeout(function(){
        jQuery('.absolute-share').fadeOut(100);
    },200);
    return false;
});

// Scripts for the lights off feature
jQuery('.light-off').click(function(){
    if ( jQuery(this).hasClass('activated') ) {
        jQuery(this).removeClass('activated');
        jQuery('.ts-smart-cover').remove();
    } else{
        jQuery(this).addClass('activated');
        jQuery('body').append('<div class="ts-smart-cover"></div>');
    }
    jQuery('.single-video .featured-video').toggleClass('is-lights-off');
    jQuery('.single-video .ts-preroll').toggleClass('is-lights-off');

    return false;
});

// Single video window resize
jQuery('.video-resizer').click(function(){
    var elem = jQuery(this);
    if( elem.hasClass('single3') ){
        if( elem.attr('data-video-size') == 'small' ){
            jQuery('.singlevideo_style3').find('.video-divs').removeClass('col-md-6').addClass('col-md-12');
            elem.attr('data-video-size','big');
            resizeVideo();
            resizePreRoll();
            return false;
        }
        if( elem.attr('data-video-size') == 'big' ){
            jQuery('.singlevideo_style3').find('.video-divs').removeClass('col-md-12').addClass('col-md-6');
            elem.attr('data-video-size','small');
            resizeVideo();
            resizePreRoll();
            return false;
        }
    }
});

function single4_video(){

    if ( jQuery('.video-single-section.video-section').length > 0 ){
        jQuery('.video-single-section.video-section').width( jQuery(window).width() );
        jQuery('.video-single-section.video-section').height( jQuery(window).height() );
        jQuery(window).scrollTo( jQuery('.video-single-section.video-section').offset().top, 800 );
    }

    jQuery('.embedded_videos iframe').each(function(){
        jQuery(this).attr('width', jQuery('.video-single-scedetion.video-section').width() );
        jQuery(this).attr('height', jQuery('.video-single-section.video-section').height() );
    });

    jQuery('.embedded_videos .wp-video').each(function(){
        jQuery(this).attr('width', jQuery('.video-single-section.video-section').width() );
        jQuery(this).attr('height', jQuery('.video-single-section.video-section').height() );
    });
}

jQuery('.show-hide-meta').click(function(){
    jQuery('.video-meta-over, .post-header-content').fadeToggle();
});

/*****  ANIMATIONS  *****/

(function($) {
  var selectors = [];

  var check_binded = false;
  var check_lock = false;
  var defaults = {
    interval: 250,
    force_process: false
  }
  var $window = $(window);

  var $prior_appeared;

  function process() {
    check_lock = false;
    for (var index = 0; index < selectors.length; index++) {
      var $appeared = $(selectors[index]).filter(function() {
        return $(this).is(':appeared');
      });

      $appeared.trigger('appear', [$appeared]);

      if ($prior_appeared) {

        var $disappeared = $prior_appeared.not($appeared);
        $disappeared.trigger('disappear', [$disappeared]);
      }
      $prior_appeared = $appeared;
    }
  }

  // "appeared" custom filter
  $.expr[':']['appeared'] = function(element) {
    var $element = $(element);
    if (!$element.is(':visible')) {
      return false;
    }

    var window_left = $window.scrollLeft();
    var window_top = $window.scrollTop();
    var offset = $element.offset();
    var left = offset.left;
    var top = offset.top;

    if (top + $element.height() >= window_top &&
        top - ($element.data('appear-top-offset') || 0) <= window_top + $window.height() &&
        left + $element.width() >= window_left &&
        left - ($element.data('appear-left-offset') || 0) <= window_left + $window.width()) {
      return true;
    } else {
      return false;
    }
  }

  $.fn.extend({
    // watching for element's appearance in browser viewport
    appear: function(options) {
      var opts = $.extend({}, defaults, options || {});
      var selector = this.selector || this;
      if (!check_binded) {
        var on_check = function() {
          if (check_lock) {
            return;
          }
          check_lock = true;

          setTimeout(process, opts.interval);
        };

        $(window).scroll(on_check).resize(on_check);
        check_binded = true;
      }

      if (opts.force_process) {
        setTimeout(process, opts.interval);
      }
      selectors.push(selector);
      return $(selector);
    }
  });

  $.extend({
    // force elements's appearance check
    force_appear: function() {
      if (check_binded) {
        process();
        return true;
      };
      return false;
    }
  });
})(jQuery);

(function($){
  '$:nomunge'; // Used by YUI compressor.

  var cache = {},

    // Reused internal string.
    doTimeout = 'doTimeout',

    // A convenient shortcut.
    aps = Array.prototype.slice;

  $[doTimeout] = function() {
    return p_doTimeout.apply( window, [ 0 ].concat( aps.call( arguments ) ) );
  };

  $.fn[doTimeout] = function() {
    var args = aps.call( arguments ),
      result = p_doTimeout.apply( this, [ doTimeout + args[0] ].concat( args ) );

    return typeof args[0] === 'number' || typeof args[1] === 'number'
      ? this
      : result;
  };

  function p_doTimeout( jquery_data_key ) {
    var that = this,
      elem,
      data = {},

      // Allows the plugin to call a string callback method.
      method_base = jquery_data_key ? $.fn : $,

      // Any additional arguments will be passed to the callback.
      args = arguments,
      slice_args = 4,

      id        = args[1],
      delay     = args[2],
      callback  = args[3];

    if ( typeof id !== 'string' ) {
      slice_args--;

      id        = jquery_data_key = 0;
      delay     = args[1];
      callback  = args[2];
    }

    // If id is passed, store a data reference either as .data on the first
    // element in a jQuery collection, or in the internal cache.
    if ( jquery_data_key ) { // Note: key is 'doTimeout' + id

      // Get id-object from the first element's data, otherwise initialize it to {}.
      elem = that.eq(0);
      elem.data( jquery_data_key, data = elem.data( jquery_data_key ) || {} );

    } else if ( id ) {
      // Get id-object from the cache, otherwise initialize it to {}.
      data = cache[ id ] || ( cache[ id ] = {} );
    }

    // Clear any existing timeout for this id.
    data.id && clearTimeout( data.id );
    delete data.id;

    // Clean up when necessary.
    function cleanup() {
      if ( jquery_data_key ) {
        elem.removeData( jquery_data_key );
      } else if ( id ) {
        delete cache[ id ];
      }
    };

    // Yes, there actually is a setTimeout call in here!
    function actually_setTimeout() {
      data.id = setTimeout( function(){ data.fn(); }, delay );
    };

    if ( callback ) {
      // A callback (and delay) were specified. Store the callback reference for
      // possible later use, and then setTimeout.
      data.fn = function( no_polling_loop ) {

        // If the callback value is a string, it is assumed to be the name of a
        // method on $ or $.fn depending on where doTimeout was executed.
        if ( typeof callback === 'string' ) {
          callback = method_base[ callback ];
        }

        callback.apply( that, aps.call( args, slice_args ) ) === true && !no_polling_loop

          // Since the callback returned true, and we're not specifically
          // canceling a polling loop, do it again!
          ? actually_setTimeout()

          // Otherwise, clean up and quit.
          : cleanup();
      };

      // Set that timeout!
      actually_setTimeout();

    } else if ( data.fn ) {
      delay === undefined ? cleanup() : data.fn( delay === false );
      return true;

    } else {
      // Since no callback was passed, and data.fn isn't defined, it looks like
      // whatever was supposed to happen already did. Clean up and quit!
      cleanup();
    }

  };

})(jQuery);

//CSS3 Animate-it
jQuery('.animatedParent').appear();
jQuery('.animatedClick').click(function(){
  var target = $(this).attr('data-target');


  if(jQuery(this).attr('data-sequence') != undefined){
    var firstId = jQuery("."+target+":first").attr('data-id');
    var lastId = jQuery("."+target+":last").attr('data-id');
    var number = firstId;

    //Add or remove the class
    if(jQuery("."+target+"[data-id="+ number +"]").hasClass('go')){
      jQuery("."+target+"[data-id="+ number +"]").addClass('goAway');
      jQuery("."+target+"[data-id="+ number +"]").removeClass('go');
    }else{
      jQuery("."+target+"[data-id="+ number +"]").addClass('go');
      jQuery("."+target+"[data-id="+ number +"]").removeClass('goAway');
    }
    number ++;
    delay = Number(jQuery(this).attr('data-sequence'));
    jQuery.doTimeout(delay, function(){

      //Add or remove the class
      if(jQuery("."+target+"[data-id="+ number +"]").hasClass('go')){
        jQuery("."+target+"[data-id="+ number +"]").addClass('goAway');
        jQuery("."+target+"[data-id="+ number +"]").removeClass('go');
      }else{
        jQuery("."+target+"[data-id="+ number +"]").addClass('go');
        jQuery("."+target+"[data-id="+ number +"]").removeClass('goAway');
      }

      //increment
      ++number;

      //continute looping till reached last ID
      if(number <= lastId){return true;}
    });
  }else{
    if(jQuery('.'+target).hasClass('go')){
      jQuery('.'+target).addClass('goAway');
      jQuery('.'+target).removeClass('go');
    }else{
      jQuery('.'+target).addClass('go');
      jQuery('.'+target).removeClass('goAway');
    }
  }
});

jQuery(document.body).on('appear', '.animatedParent', function(e, $affected){
  var ele = jQuery(this).find('.animated');
  var parent = jQuery(this);


  if(parent.attr('data-sequence') != undefined){

    var firstId = jQuery(this).find('.animated:first').attr('data-id');
    var number = firstId;
    var lastId = jQuery(this).find('.animated:last').attr('data-id');

    jQuery(parent).find(".animated[data-id="+ number +"]").addClass('go');
    number ++;
    var delay = Number(parent.attr('data-sequence'));

    jQuery.doTimeout(delay, function(){
      jQuery(parent).find(".animated[data-id="+ number +"]").addClass('go');
      ++number;
      if(number <= lastId){return true;}
    });
  }else{
    ele.addClass('go');
  }

});

 jQuery(document.body).on('disappear', '.animatedParent', function(e, $affected) {
  if(!jQuery(this).hasClass('animateOnce')){
    jQuery(this).find('.animated').removeClass('go');
   }
 });

jQuery(document).on('click', '.ts-url li', function(e) {
    jQuery('.tab-content').find('[required="required"]').removeAttr('required');
    jQuery('.tab-content .active').find('input[type="text"], input[type="file"], textarea').attr('required', 'required');
});

jQuery(window).load(function(){
    jQuery.force_appear();
});



/*****  END ANIMATIONS  *****/