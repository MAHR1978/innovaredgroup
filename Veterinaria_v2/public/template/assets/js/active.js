/*
Author       : EnvyTheme
Template Name: AutoServicing
Version      : 1.1
*/
(function ($) {
    "use strict";
    $(document).on('ready', function () {
        // MENU JS
       $(window).on('scroll', function () {
            if ($(this).scrollTop() > 100) {
                $('.main-menu-area-two, .main-menu-area').addClass('menu-shrink');
            } else {
                $('.main-menu-area-two, .main-menu-area').removeClass('menu-shrink');
            }
        });		 
        
        // Default Slider
        var swiper1 = new Swiper('.swiper1', {
            pagination: '.swiper-pagination1',
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            spaceBetween: 0,
            effect: 'coverflow',
            speed: 700,
            loop: true
            //paginationType: 'custom'
        }); 
		
        // Fullpage Slider
		var swiper2 = new Swiper('.swiper2', {
            pagination: '.swiper-pagination2',
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            spaceBetween: 0,
            effect: 'fade',
            speed: 700,
            loop: true,
            //paginationType: 'custom'
        });
        
        // Instagram Slider
		var swiper3 = new Swiper('.swiper3', {
            pagination: '.swiper-pagination3',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            slidesPerView: 'auto',
            grabCursor: true,
            freeMode: true
        }); 
		
		// Gallery Thumbs Slider
        var galleryTop = new Swiper('.gallery-top', {
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            spaceBetween: 10,
            loop:true,
            loopedSlides: 5, //looped slides should be the same     
        });
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 5,
            touchRatio: 0.2,
            loop:true,
            loopedSlides: 5, //looped slides should be the same
            slideToClickedSlide: true
        });
        galleryTop.params.control = galleryThumbs;
        galleryThumbs.params.control = galleryTop;
   
        //Searchbx 
        $('a[href="#search"]').on("click", function(event) {
            event.preventDefault();
            $("#search").addClass("open");
            $('#search > form > input[type="search"]').focus();
        });

        $("#search, #search button.close").on("click keyup", function(event) {
            if (
              event.target == this ||
              event.target.className == "close" ||
              event.keyCode == 27
            ) {
              $(this).removeClass("open");
            }
        });

        $("form").on('submit',function(event) {
            event.preventDefault();
            return false;
        });

        // ACCORDION WITH TOGGLE ICONS
        function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus fa-minus');
        }
        $('.panel-group').on('hidden.bs.collapse', toggleIcon);
        $('.panel-group').on('shown.bs.collapse', toggleIcon);

        //Appointent Form
        $('select').each(function(){
            var $this = $(this), numberOfOptions = $(this).children('option').length;

            $this.addClass('select-hidden'); 
            $this.wrap('<div class="select"></div>');
            $this.after('<div class="select-styled"></div>');

            var $styledSelect = $this.next('div.select-styled');
            $styledSelect.text($this.children('option').eq(0).text());

            var $list = $('<ul />', {
                'class': 'select-options'
            }).insertAfter($styledSelect);

            for (var i = 0; i < numberOfOptions; i++) {
                $('<li />', {
                    text: $this.children('option').eq(i).text(),
                    rel: $this.children('option').eq(i).val()
                }).appendTo($list);
            }

            var $listItems = $list.children('li');

            $styledSelect.on('click',function(e) {
                e.stopPropagation();
                $('div.select-styled.active').not(this).each(function(){
                    $(this).removeClass('active').next('ul.select-options').hide();
                });
                $(this).toggleClass('active').next('ul.select-options').toggle();
            });

            $listItems.on('click',function(e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel'));
                $list.hide();
                //console.log($this.val());
            });

            $(document).on('click',function() {
                $styledSelect.removeClass('active');
                $list.hide();
            });
        });
        
        //Datepicker
        $( "#datepicker" ).datepicker();
            $( "#anim" ).on( "change", function() {
            $( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
        });
        
        // Client Slides
        $(".partner-slides").owlCarousel({
            dots: false,
            autoplay: true,
            loop: true,
            margin:20,
            autoplayHoverPause: true,
            nav:false,
            smartSpeed: 500,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:6
                }
            }
        });
        
        // This will create a single gallery from all elements that have class "gallery-item"
        $(".lightbox, .insta-lightbox").magnificPopup({
          type: 'image',
          gallery:{
            enabled:true,
          }
        });
        
        // This will create a single image"
        $(".singleImage").magnificPopup({
          type: 'image',
        });
       
        // This will create video popup
            $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
        
        // Shorting
        $(".shorting").mixItUp();
        
        //Wow Js
        new WOW().init();
        
		// Isotop Js
        var $grid = $('.blog-items').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: '.grid-item'
            }
        });   

        // Load More
        if ($(".gallery-boxed:hidden, .services-item:hidden, .services-item-two:hidden").length == 0) {
            $("#loadmore").fadeOut('slow');
        }
        $(".gallery-boxed, .services-item:hidden, .services-item-two:hidden").slice(0, 6).show();
            $("#loadmore").on('click', function (e) {
            e.preventDefault();
            $(".gallery-boxed:hidden, .services-item:hidden, .services-item-two:hidden").slice(0, 3).slideDown();

            $('html,body').animate({
                scrollTop: $(this).offset().top
            }, 1500);
        });
        
        // Counter JS
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
        
        // jarallax
        $('.jarallax').jarallax({
            speed: 0.5
        });
        
        // Jquery Ripple
        $('.ripple-effect, .ripple-playing').ripples({
            resolution: 512,
            dropRadius: 40,
            perturbance: 0.04,
        });
        
        // Video Background
        $("#videobg").YTPlayer({
            containment:'self',
            autoPlay:true,
            mute:true,
            startAt:9,
            stopAt:102,
            opacity:0.8,
            showYTLogo: false,
            showControls: false
        });
        
        // Parsley js
        if ($('#contatc_form').length) {
			$('#contatc_form').parsley();
		}
        
        // Check distance to top and display back-to-top.
        jQuery( window ).on('scroll', function() {
            if ( $( this ).scrollTop() > 800 ) {
                $( '.back-to-top' ).addClass( 'show-back-to-top' );
            } else {
                $( '.back-to-top' ).removeClass( 'show-back-to-top' );
            }
        });

        // Click event to scroll to top.
        jQuery( '.back-to-top' ).on('click', function() {
            $( 'html, body' ).animate( { scrollTop : 0 }, 800 );
            return false;
        });
        
        // Google Map
        $("#map").googleMap();
        $("#map").addMarker({
            coords: [40.712784, -74.005941]
        });

        // Input Field Space Validatiton
        jQuery(function() {
          jQuery('body').on('keydown', '#contact_name, #contact_email, #contact_subject, #contact_phone, #contact_message', function(e) {
                console.log(this.value);
                 if (e.which === 32 &&  e.target.selectionStart === 0) {
                   return false;
                }  
            });
        });

        // Send Mail
        $('#contatc_form').on('submit',function(event) {
            event.preventDefault();
            var name 	= $('#contact_name').val();
            var email 	= $('#contact_email').val();
            var sub 	= $('#contact_subject').val();
            var phone 	= $('#contact_phone').val();
            var message = $('#contact_message').val();
            var recaptcha = $("#g-recaptcha-response").val();

            if(name == "" || email == "" || message == "" || name == "" || message == "" || recaptcha == "" || sub == "" || phone ==""){
                jQuery('#contact_send_status').removeClass('message_send');
                jQuery('#contact_send_status').addClass('message_notsend');
                jQuery('#contact_send_status').text('Please fill all fields with correct data.');

            }else{
                var formData = $('#contatc_form').serialize();
                $.ajax({
                    type: 'POST',
                    url: $('#contatc_form').attr('action'),
                    data: formData,
                    success:function(data){  
                        jQuery('form[name="myform"]')[0].reset();
                        grecaptcha.reset();
                        $("#g-recaptcha-response").val("");
                    },
                })
                .done(function(response) {
                    $('#contact_send_status').removeClass('message_notsend');
                    $('#contact_send_status').addClass('message_send');
                    $('#contact_send_status').html("<div class='alert alert-success' role='alert'>Your email successfully Sent ! Thank you.</div>");
                    $("#contact_send_status").fadeOut(3000);				
                })
                .fail(function(data) {
                    jQuery('#contact_send_status').removeClass('message_send');
                    jQuery('#contact_send_status').addClass('message_notsend');
                    jQuery('#contact_send_status').html("<div class='alert alert-danger' role='alert'>Something wrong please try again!</div>");
                });
            }
        });

        //  Home version 4 JS
        // Petcare-slider
        $('.petcare-slider').owlCarousel({
            items:1,
            loop:true,
            nav:true,
            dots: false,
            autoplay: true,
            autoplayHoverPause: true,
            smartSpeed: 1500,
            mouseDrag: false,
            navText: [
                "<i class='flaticon-last-track-left-arrow'></i>", 
                "<i class='flaticon-arrow-point-to-right'></i>"
            ],
        })

        $(".petcare-slider").on("translate.owl.carousel", function(){
            $(".single-petcare-slider .p-slide-item h1, .single-petcare-slider .p-slide-item p").removeClass("animated fadeInUp").css("opacity", "0");
            $(".single-petcare-slider .p-slide-item .custom-btn1").removeClass("animated fadeInDown").css("opacity", "0");
        });
        
        $(".petcare-slider").on("translated.owl.carousel", function(){
            $(".petcare-slider .p-slide-item h1, .single-petcare-slider .p-slide-item p").addClass("animated fadeInUp").css("opacity", "1");
            $(".petcare-slider .p-slide-item .custom-btn1").addClass("animated fadeInDown").css("opacity", "1");
        });

        // services-slider
        $('.pc-services-slider').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots: false,
            autoplay: false,
            autoplayHoverPause: true,
            smartSpeed: 2000,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            },
            navText: ["<i class='flaticon-last-track-left-arrow'></i>", "<i class='flaticon-arrow-point-to-right'></i>"]
        });

        // Gallery-slider
        $('.sngl-gallery-slider').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots: false,
            autoplay: true,
            autoplayHoverPause: true,
            smartSpeed: 2000,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            },
        });

        // Popup Gallery
        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            }
        });

        // Logo Slider
        $('.pc-logo-slider').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots: false,
            autoplay: false,
            autoplayHoverPause: true,
            smartSpeed: 2000,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                768:{
                    items: 3
                },
                1000:{
                    items:4
                }
            },
        });

        // Testimonial Slider Petcare
        $('.pc-testi-slider')
        .owlCarousel({
            loop:true,
            margin:30,
            nav:true,
            dots: false,
            autoplay: true,
            autoplayHoverPause: true,
            smartSpeed: 2000,
            navText: ["<i class='flaticon-left-arrow'></i>", "<i class='flaticon-right-arrow'></i>"],
            responsive:{
                0:{
                    items:1
                },
                768:{
                    items:2
                },
                1000:{
                    items:2
                }
            },
        });
        // End Home version 4 JS
    });

    // Preloader
    jQuery(window).on('load',function(){
        jQuery(".site-preloader-wrap").fadeOut(500);
    });

}(jQuery));