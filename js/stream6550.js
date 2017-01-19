(function() {
    jQuery.fn.JoySlider = function(op) {
        var joy_options = jQuery.extend({
            auto: true,             // boolean: animate automatically
            nav: true,              // boolean: show slider controls
            loop: true,             // boolean: go to first slide after the last slide
            preview: true,          // boolean: show/hide preview slides
            speed: 400,             // integer: transition between slides
            timeout: 7000,          // ingeger: time between slides transition
            gutter: 40,             // integer: space between preview slides
            previewTimeout: 7000    // integer: time between preview slides transiton
        }, op);

        // jquery objects
    var joy_slider = jQuery(this),
        // slider container
        container = joy_slider.find('.slider-container'),
        // slides container
        slides_container = container.find('.slides-container'),
        // slides
        slides = slides_container.children('.slide'),
        // preview slides container
        preview_slides_container,
        // preview slides
        preview_slides,
        // slider controls
        navigation = null,
        // preview slides progress
        progress = null;

        // number of slides
    var count_slides = slides.size(),
        // the width of one preview slide
        preview_slide_width = 0,
        // the width of one slide
        slide_width = 0,
        // slides timer for slides timeout
        timer = 0,
        // get the remaining time before the timer trigger
        timer_remaining = 0,
        // current active slide
        current = 0,
        // the index of the clicked element
        clicked = 0,
        // slider container width
        container_width = 0,
        // slider transition completion if it's true allow changing the slide
        // otherwise don't change the slide
        transition_complete = true,
        // if the slider was stopped dont start to change automaticaly
        // when the slide is changed
        status = true; // false: stopped
                       // true: play

    // function create slider elements
    (function createElements() {
        // create slider navigation
        if ( joy_options.nav ) {
            var nav = '<ul class="slider-controls">' +
                '<li><a href="#" class="prev-slide" data-direction="previous">' +
                    '<i class="icon-left"></i></a></li>' +
                '<li><a href="#" class="next-slide" data-direction="next">' +
                    '<i class="icon-right"></i></a></li>' +
                '<li><a href="#" data-stop="stop">' +
                    '<i class="icon-pause"></i></a></li>' +
            '</ul>';
            // append slider controls inside DOM
            // the save a reverence to the object
            navigation = container.append(nav).find('.slider-controls li');
        }
        // create preview slides
        if ( joy_options.preview ) {
            var prev_slides = '<div class="container slides-main-contanier"><div class="slides-tab-nav"><ul class="slides-preview-container">';

            // create preview slides
            slides.each(function(){
                var slide_index = ( jQuery(this).index() < 9 ) ? '0' + (jQuery(this).index() + 1) : jQuery(this).index() + 1; 
                var custom_font = jQuery(this).data('custom-font');
                var meta_categoty = '';

                if( typeof(jQuery(this).data('slide-meta-date')) !== 'undefined' ){
                    meta_categoty += '<ul class="entry-meta-date">' +
                                        '<li>' +
                                            jQuery(this).data('slide-meta-date') +
                                        '</li>' +
                                    '</ul>';
                }

                prev_slides += '<li class="slide-preview">' +
                                    '<div class="progress"></div>' +
                                    '<div class="preview-data">' +
                                        '<span class="slide-index" style="font-family: '+custom_font+'">.' + slide_index +'</span>' +
                                        '<h4 class="entry-title">' + jQuery(this).data('slide-title') + '</h4>' +
                                        meta_categoty +
                                    '</div>' +
                                '</li>';
            });

            prev_slides += '</ul></div></div>';
            // insert preview slides inside the DOM and get a reference to the them
            preview_slides = container.append(prev_slides).find('.slide-preview');

            // get slides preview container
            preview_slides_container = preview_slides.parent('.slides-preview-container');

            progress = preview_slides.find('.progress');
        }
        setWidths();
    })();

    // set widths for slides base on container width
    function setWidths() {
        // get slider container width
        container_width = container.width();
        // set slides container width based on number of slider
        slides_container.width(container_width * count_slides);
        // Get the size of the container (of content)
        var content_container = jQuery(container).find('.slides-main-contanier').width();
        var content_container_height = jQuery(container).find('.slide:first').height();

        // set the width of the slide based on slider container width
        slides.width(container_width);
        // save slide width
        slide_width = container_width;

        if ( joy_options.preview ) {
            // calculate preview slide width
            preview_slide_width = jQuery(container).find('.slide-preview').height();
            // set preview slides container width
            // preview_slides_container.width( preview_slide_width * count_slides);
            // set slides preview width
            // preview_slides.width( preview_slide_width - joy_options.gutter);
            // set preview slide margin right
            // preview_slides.css({ 'margin-right': joy_options.gutter + 'px' });

            if ( current > 0)
                var left = 1;
                
                if ( current === slides.size() - 1)
                    left = 3;

                preview_slides_container.css({
                    'top': (preview_slide_width * (current - left) ) * -1 + 'px'
                }, joy_options.speed );
            
            
            previewSlideToggleClass();
        }

        slides.css({
            'left': current * slide_width * -1 + 'px'
        });
    };

    var timeBetweenResize = null;
    
    // calculate again slides width on window resize
    jQuery(window).resize(function () {
        stopTimeout(); 

        clearInterval(timeBetweenResize);
        timeBetweenResize = setTimeout(function(){
            setWidths();

            if ( joy_options.auto && status)
                startTimeout();

        }, 400);
    });

    // enable click events on preview slides click
    if ( joy_options.preview ) {
        preview_slides.on('click', function(){

            if( jQuery(this).index() == current )
                return;

            // set current active slide to the index of the clicked element
            current = jQuery(this).index();
            // change the slides
            changeSlide();
        });
    }

    // enable click events on slider navigation items
    if ( joy_options.nav ) {
        navigation.on('click', 'a', function(event){
            event.preventDefault();
            var context = jQuery(this);

            if(context.data('stop') === 'stop') {

                if(context.hasClass('stop')) {
                    context.removeClass('stop');

                    // add back the icon to stop the slides
                    context.children().removeClass().addClass('icon-pause');
                    
                    // the slide can change automatically when preview slider are clicked
                    status = true;
                    
                    // resume the timer if it was stopped
                    startTimeout();
                }
                else {
                    context.addClass('stop');

                    // the slider is stopped add the icon to start the slider
                    context.children().removeClass().addClass('icon-play');
                    
                    // don't allow changind the slides
                    status = false;

                    transition_complete = true;
                    
                    stopTimeout();
                }
            }

            // Until the transition is completed 
            // don't allow slide change
            if(!transition_complete)
                return;
             
            // go to previous slide
            if ( jQuery(this).data('direction') === 'previous') {
                if ( current === 0 ) {
                    if( !joy_options.loop )
                        return;

                    current = count_slides - 1;
                    changeSlide();
                }
                else {
                    current--;
                    changeSlide();

                }
                transition_complete = false;

            }
            // got to next slide
            else if( jQuery(this).data('direction') === 'next' ) {
                if(current === count_slides - 1) {
                    if ( !joy_options.loop )
                        return;

                    current = 0;
                    changeSlide();
                }
                else {
                    current++;
                    changeSlide();
                }
                transition_complete = false;
            }
        });
    }

    if( joy_options.auto && status ){
        changeSlide();
    }

    // change current slide
    function changeSlide(){
        if(joy_options.auto && status ){
            stopTimeout();
        }

        // disable preview slide transition is there are less then 4 slides
        if(slides.size() > 4) {
            if(clicked === count_slides - 1 && current === 0 && joy_options.preview ) {
                preview_slides_container.animate({
                    'top': '0'
                }, joy_options.speed );
            }

            else if(clicked === 0 && current === count_slides - 1 && joy_options.preview ){
                preview_slides_container.animate({
                    'top': ((count_slides - 4)  * preview_slide_width) * -1 + 'px'
                }, joy_options.speed );
            }

            // slide to right
            if ( clicked <= current ) {
                // change only the slide dont't change preview slide contianer position
                if(current !== count_slides - 1 && current > 2  && joy_options.preview ){
                    preview_slides_container.animate({
                        'top': '+=' + preview_slide_width * -1 + 'px'
                    }, joy_options.speed);
                }
            }
            // slide to left
            else if (clicked >= current ) {
                if( current > 0 && current < count_slides - 3  && joy_options.preview ) {
                    preview_slides_container.animate({
                        'top': '-=' + preview_slide_width * -1 + 'px'
                    }, joy_options.speed );
                }
            }
        }
        slides.animate({
            'left': current * slide_width * -1 + 'px'
        }, {
            queue: false,
            duration: joy_options.speed,
            complete: function() {
                transition_complete = true;
            }
        });

        if ( joy_options.preview ) {
            // toggle active class on the preview slides
            previewSlideToggleClass();
        }

        if( joy_options.auto && status){
            startTimeout();
        }

        clicked = current;
    }

    function previewSlideToggleClass() {
        // remeve active class from slides
        preview_slides.removeClass('slide-preview-active');
        // add active class to clicked slide
        preview_slides.eq(current).addClass('slide-preview-active');
    }

    // create a timer for slides timeout
    function startTimeout(){

        timer = setInterval( function() {
            if ( current === count_slides - 1)
                current = -1;

            current++;
            changeSlide();
        },joy_options.timeout);

        if ( joy_options.preview && joy_options.auto ){
            progress.eq(current).animate({
                "height": "100%"
            }, joy_options.timeout);
        }
    }

    // clear the timer previus created
    function stopTimeout(){
        if ( joy_options.preview && joy_options.auto )
            progress.stop().height(0);
        clearInterval(timer);
        timer = null;
    }
    };
}(jQuery));