// var navHeight = $('nav.navbar').height();
var navHeight = 50;
jQuery.easing.def = "easeInOutCubic";

// DETECT IE
var ie = (function(){
    var undef,
        v = 3,
        div = document.createElement('div'),
        all = div.getElementsByTagName('i');
    while (
        div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->',
        all[0]
    );
    return v > 4 ? v : undef;
}());

function init() {

    /* DETECT MOBILE */
    if( navigator.userAgent.match(/Android/i)
    || navigator.userAgent.match(/webOS/i)
    || navigator.userAgent.match(/iPhone/i)
    || navigator.userAgent.match(/iPad/i)
    || navigator.userAgent.match(/iPod/i)
    || navigator.userAgent.match(/BlackBerry/i)
    || navigator.userAgent.match(/Windows Phone/i)
    ){
        $('body').addClass('mobile');
    }
    else {
        $('body').addClass('notmobile');
    }
    
    // DETECT FIREFOX

    var userAg = navigator.userAgent;
    if (userAg.indexOf("Firefox") != -1) {
        $('body').addClass('ff');
    }

    /*HIDDEN SIDEBAR*/
    
    var btnOpen = $('a[data-toggle="sidebar"]');
    var view = $('#view,.navbar');
    var sidebar = $('.sidebar');
    var sdSticky = false;
    if ($('body').hasClass('sd-left')){
        var sideLeft = true;
        var sBarClose = false;
    }
    if ($('body').hasClass('sd-right')){
        var sideRight = true;
        var sBarClose = true;
    }
    if ($('body').hasClass('sd-sticky')){
        var sdSticky = true;
    }

    /*if (sideRight && !sdSticky){
        btnOpen.click(function(e){
            e.preventDefault();
            $('body').toggleClass('sidebar-open');
            view.velocity({
                left: sBarClose ? "-400px" : "0"
            },250);
            sidebar.velocity({
                right: sBarClose ? "0" : "-400px"
            },250);
            sBarClose = !sBarClose;
        });
    }*/
    if (sideRight && !sdSticky){
        btnOpen.clearQueue().click(function(e){
            e.preventDefault();
            $('body').toggleClass('sidebar-open');
            view.velocity({
                left: sBarClose ? "-400px" : "0"
            },350);
            sidebar.velocity({
                right: sBarClose ? "0" : "-400px"
            },350);
            sBarClose = !sBarClose;
        });
    }
    if (sideLeft && !sdSticky){
        btnOpen.clearQueue().click(function(e){
            e.preventDefault();
            $('body').toggleClass('sidebar-open');
            view.velocity({
                left: sBarClose ? "0" : "400px"
            },150);
            sidebar.velocity({
                left: sBarClose ? "-400px" : "0"
            },150);
            sBarClose = !sBarClose;
        });
    }
    if (sideLeft && sdSticky){
        btnOpen.clearQueue().click(function(e){
            e.preventDefault();
            $('body').toggleClass('sidebar-open');
            sidebar.velocity({
                left: sBarClose ? "-100%" : "0"
            },150);
            sBarClose = !sBarClose;
        });
    }
    if (sideRight && sdSticky){
        btnOpen.clearQueue().click(function(e){
            e.preventDefault();
            $('body').toggleClass('sidebar-open');
            sidebar.velocity({
                right: sBarClose ? "0" : "-100%"
            },250);
            sBarClose = !sBarClose;
        });
    }

    // sub-nav horizontal sidebar
    var subBtn = $('a[data-toggle="subnav"]');
    var subClose = $('a[data-toggle="subclose"]');
    var subparent;
    subBtn.click(function(e){
        e.preventDefault();
        subparent = $(this).parent().parent();
        subchild = $($(this).attr("href"));
        subparent.velocity({
            left: "-100%"
        });
        subchild.velocity({
            left: "0"
        });
    });
    subClose.click(function(e){
        e.preventDefault();
        subparent = $(this).parent().parent();
        subchild = $($(this).attr("href"));
        subparent.velocity({
            left: "100%"
        });
        subchild.velocity({
            left: "0"
        });
    });

    /*TRANSLATE AND MENU MODAL*/
    $('#myModal').on('show.bs.modal', function (e) {
        view = $('#view');
        scrolls = document.body.scrollTop;
        view.addClass('to-translate');
        view.scrollTop(scrolls);
        setTimeout(function(){ 
            $('body').addClass('dark-bgcolor');
            view.addClass('translate');
        },300);
    });
    $('#myModal').on('hide.bs.modal', function (e) {
        view = $('#view');
        view.removeClass('translate');
        scrolls = view.scrollTop();
        setTimeout(function(){ 
            $('body').removeClass('dark-bgcolor');
            view.removeClass('to-translate');
            $(window).scrollTop(scrolls);
        },300);
    });
    // FIN TRANSLATE


    /* SCROLL TO ELEMENT */
    $('a[data-scrollTo="true"]').each(function(){
        triggers = $(this);
        var targets = triggers.attr('href');
        triggers.click(function(event) {

            event.preventDefault();
            
            $('html, body').animate({
                "scrollTop": $(targets).offset().top
            }, 750);
        });
    });
    /*anchor = $('*[data-scroll="true"]');
    anchor.click(function(event){
        event.preventDefault;
        target = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(target).offset().top
        }, 2000);
        
    });*/

    

    /* Resize header on scroll. 
    Credits: http://callmenick.com/2014/02/18/create-an-animated-resizing-header-on-scroll/ */
    if ($('.navbar-fixed-top').length > 0){
        

        if (window.addEventListener) {
            window.addEventListener('scroll', function(e){
                var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                    shrinkOn = 30,
                    nav = $('nav');
                if (distanceY > shrinkOn) {
                    nav.removeClass('nav-transparent');
                    nav.addClass('nav-white');
                } else {
                    nav.addClass('nav-transparent');
                    nav.removeClass('nav-white');
                }
            });
        }
        else {
            window.attachEvent('onscroll', function(e){
                var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                    shrinkOn = 30,
                    nav = $('nav');
                if (distanceY > shrinkOn) {
                    nav.removeClass('nav-transparent');
                    nav.addClass('nav-white');
                } else {
                    nav.addClass('nav-transparent');
                    nav.removeClass('nav-white');
                }
            });
        }
    }

    /*Skrollr*/
    /*if(!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
        skrollr.init({
            forceHeight: false,
            smoothScrolling: true
        });
    }*/

    /*STELLAR*/
    /*$.stellar();*/

    /*Window height applied to header*/
    window_size = $(window).height();
    header = $('#header');
    header.height(window_size - 166);

    /*Waypoints*/
    /*var waypoint = new Waypoint({
      element: document.getElementsByClassName('from-right'),
      handler: function() {
        console.log('ahora');
        $(this.element.addClass('hola');
      },
      offset:100
    })*/

    

    
    /*$('.anim').waypoint(function(direction){
        $(this.element).toggleClass('animate');
    });*/

    /*$('.from-right').waypoint(function(direction) {
        $('.from-right').toggleClass('animate');
    },{
        offset:'bottom-in-view'
    });
    $('.from-right').waypoint(function(direction) {
        $('.from-right').toggleClass('animate');
    });
    $('.from-left').waypoint(function(direction) {
        $('.from-left').toggleClass('animate');
    },{
        offset:'bottom-in-view'
    });
    $('.from-left').waypoint(function(direction) {
        $('.from-left').toggleClass('animate');
    });
    $('.from-top').waypoint(function(direction) {
        $(this.element).toggleClass('animate');
    },{
        offset:'bottom-in-view'
    });
    $('.from-top').waypoint(function(direction) {
        $(this.element).toggleClass('animate');
    });

    $('.from-center').waypoint(function(direction) {
        $(this.element).toggleClass('animate');
    },{
        offset:'bottom-in-view'
    });
    $('.from-center').waypoint(function(direction) {
        $(this.element).toggleClass('animate');
    });


    $('.from-bottom').waypoint(function(direction) {
        $(this.element).toggleClass('animate');
    },{
        offset:'bottom-in-view'
    });
    $('.from-bottom').waypoint(function(direction) {
        $(this.element).toggleClass('animate');
    });*/
    
    /*ANIMACIONES SCROll*/

    function scrollAnimations(){

        $('.anim').each(function() {
            $(this).waypoint(function(direction){
                $(this.element).toggleClass('animate');
            }, { offset: '90%', triggerOnce: true });
            $(this).waypoint(function(direction){
                $(this.element).toggleClass('animate');
            });
        });
        /*$('img.img-with-animation').each(function() {
        
            $(this).waypoint(function(direction) {

                if($(this).css('opacity') != '1') {
                    
                    if($(this).attr('data-animation') == 'fade-in-from-left'){
                        $(this).delay($(this).attr('data-delay')).animate({
                            'opacity' : 1,
                            'left' : '0px'
                        },600,'easeOutSine');
                    } else if($(this).attr('data-animation') == 'fade-in-from-right'){
                        $(this).delay($(this).attr('data-delay')).animate({
                            'opacity' : 1,
                            'right' : '0px'
                        },600,'easeOutSine');
                    } else if($(this).attr('data-animation') == 'fade-in-from-bottom'){
                        $(this).delay($(this).attr('data-delay')).animate({
                            'opacity' : 1,
                            'bottom' : '0px'
                        },600,'easeOutSine');
                    } else if($(this).attr('data-animation') == 'fade-in') {
                        $(this).delay($(this).attr('data-delay')).animate({
                            'opacity' : 1
                        },600,'easeOutSine');   
                    } else if($(this).attr('data-animation') == 'grow-in') {
                        var $that = $(this);
                        setTimeout(function(){ 
                            $that.transition({ scale: 1, 'opacity':1 },900,'cubic-bezier(0.15, 0.84, 0.35, 1.25)');
                        },$that.attr('data-delay'));
                    }
                    
                    else if($(this).attr('data-animation') == 'flip-in') {
                        var $that = $(this);
                        setTimeout(function(){ 
                            $that.transition({  rotateY: 0, 'opacity':1 },1100);
                        },$that.attr('data-delay'));
                    }
                    
                }
                
            }, { offset: '90%', triggerOnce: true });
        
        });



        $('.col.has-animation, .wpb_column.has-animation').each(function() {
            
            $(this).waypoint(function(direction) {
                
                if($(this).css('opacity') != '1') {
                    
                    if($(this).attr('data-animation') == 'fade-in-from-left'){
                        $(this).delay($(this).attr('data-delay')).animate({
                            'opacity' : 1,
                            'left' : '0px'
                        },800,'easeOutSine');
                    } else if($(this).attr('data-animation') == 'fade-in-from-right'){
                        $(this).delay($(this).attr('data-delay')).animate({
                            'opacity' : 1,
                            'right' : '0px'
                        },800,'easeOutSine');
                    } else if($(this).attr('data-animation') == 'fade-in-from-bottom'){
                        $(this).delay($(this).attr('data-delay')).animate({
                            'opacity' : 1,
                            'bottom' : '0px'
                        },800,'easeOutSine');
                    } else if($(this).attr('data-animation') == 'fade-in') {
                        $(this).delay($(this).attr('data-delay')).animate({
                            'opacity' : 1
                        },800,'easeOutSine');   
                    } else if($(this).attr('data-animation') == 'grow-in') {
                        var $that = $(this);
                        setTimeout(function(){ 
                            $that.transition({ scale: 1, 'opacity':1 },900,'cubic-bezier(0.15, 0.84, 0.35, 1.25)');
                        },$that.attr('data-delay'));
                    } else if($(this).attr('data-animation') == 'flip-in') {
                        var $that = $(this);
                        setTimeout(function(){ 
                            $that.transition({  rotateY: 0, 'opacity':1 },1100);
                        },$that.attr('data-delay'));
                    }
                
                }
                
        
            }, { offset: '90%', triggerOnce: true });
        
        });*/     
    }
        
    setTimeout(function(){ 
        scrollAnimations();
        chainAnimations();
    },100);  

    /*ANIMACIONES EN CADENA*/
    function chainAnimations(){
        var datadelay;
        $('.chain-container').each(function(){
            $(this).waypoint(function(direction){
                $('.chain-link',this.element).each(function() {
                    datadelay = $(this).attr('data-delay');
                    $(this).delay(datadelay*100).queue(function(next){
                        $(this).addClass('animate');
                    });
                });
            }, { offset: '90%', triggerOnce: true });
        })
    }

    /* IMAGES LOADED */
    // var imgLoad = imagesLoaded('#view');

    // SLICE IMAGES
    /*$('.slice-corner').each(function(){
        height = $(this).height();
        if (height > 530) {
            $(this).addClass('corner-'+height);
        }
        document.styleSheets[0].addRule('.corner-'+height+':before','border-bottom-width: '+(320+height)+'px;');
    });*/
    if (ie<9) {
        console.log('ie');
    } else {
        $('.slice-corner').each(function(){
            height = $(this).height();
            $(this).addClass('corner-'+height);
            // document.styleSheets[0].addRule('.corner-'+height+':before','border-bottom-width: '+(height)+'px;');
            var styleEl = document.createElement('style'),
          styleSheet;
            document.head.appendChild(styleEl);
            styleSheet = styleEl.sheet;
            styleSheet.insertRule('.corner-'+height+':before { border-bottom-width: '+(height)+'px;}',0);
        });
                    
    }
    

    // ACCORDION
    $('.accordion-show').click(function(event){
        event.preventDefault();
        href = $(this).attr('href');
        $('.accordion-container').addClass('acc-closed');
        $(href).removeClass('acc-closed');
        offacc = $('.accordion').offset().top;
        heightacc = 20;
        $('html, body').animate({
            scrollTop: offacc - heightacc}, 750 );
        navHeight = '444px';
        
    });

    /* CAROUSEL */
    
    function setSlideImages(direction){
        $('.item').removeClass('slide-prev');
        $('.item').removeClass('slide-next');

        if (direction == 1){

            if ($('.item.active').prev().prev().length > 0) {
                $('.item.active').prev().prev().addClass('slide-prev');
            } else if ($('.item.active').prev().length > 0) {
                $('.item').last().addClass('slide-prev');
            } else {
                $('.item').last().prev().addClass('slide-prev');
            }

            if ($('.item.active').next().next().next().length > 0) {
                $('.item.active').next().next().next().addClass('slide-next');
            } else if ($('.item.active').next().next().length > 0) {
                $('.item').first().addClass('slide-next');
            } else if ($('.item.active').next().length > 0) {
                $('.item').first().next().addClass('slide-next');
            } else {
                $('.item').first().next().next().addClass('slide-next');
            }
            
        } else if (direction == 2) {

            if ($('.item.active').prev().prev().prev().length > 0) {
                $('.item.active').prev().prev().prev().addClass('slide-prev');
            } else if ($('.item.active').prev().prev().length > 0) {
                $('.item').last().addClass('slide-prev');
            } else if ($('.item.active').prev().length > 0) {
                $('.item').last().prev().addClass('slide-prev');
            } else {
                $('.item').last().prev().prev().addClass('slide-prev');
            }

            if ($('.item.active').next().next().length > 0) {
                $('.item.active').next().next().addClass('slide-next');
            } else if ($('.item.active').next().length > 0) {
                $('.item').first().addClass('slide-next');
            } else {
                $('.item').first().next().addClass('slide-next');
            }

        } else {
            if ($('.item.active').prev().length > 0) {
                $('.item.active').prev().addClass('slide-prev');
            } else {
                $('.item').last().addClass('slide-prev');
            }

            if ($('.item.active').next().length > 0) {
                $('.item.active').next().addClass('slide-next');
            } else {
                $('.item').first().addClass('slide-next');
            }
        }
        
        imagenext = $('.slide-next .img').css("backgroundImage");
        imageprev = $('.slide-prev .img').css("backgroundImage");
        $('.right.carousel-control .img').fadeOut(function(){
            $('.right.carousel-control .img').css({'background-image':imagenext});
        })
        $('.left.carousel-control .img').fadeOut(function(){
            $('.left.carousel-control .img').css({'background-image':imageprev});
        })
        $('.left.carousel-control .img').fadeIn();
        $('.right.carousel-control .img').fadeIn();
    }

    setTimeout(function(){ 
        setSlideImages(3);
    },0);

    $('.left.carousel-control').click(function(){
        imagenext = "";
        imageprev = "";
        setTimeout(function(){ 
            setSlideImages(1);
        },0);
        
    });

    $('.right.carousel-control').click(function(){
        imagenext = "";
        imageprev = "";
        setTimeout(function(){ 
            setSlideImages(2);
        },0);
    });

    // FIN CAROUSEL

    // VIDEO BACKGROUND
    function videoBackground(vPath,vVideo,vImage) {
        if($('body').hasClass('notmobile')){
            var videobackground = new $.backgroundVideo($('#videoBg'), {
              "align": "centerXY",
              "width": 1280,
              "height": 720,
              "path": vPath,
              "filename": vVideo,
              "types": ["mp4","ogg","webm"]
            });
            $('#video_background').css({'position':'absolute','z-index':'initial'});
        } else {
            $('#videoBg').addClass('background-full').css({'background-image':'url('+vImage+')'})
        }
    }
    // videoBackground("assets/misc/demo02/","videoplane","http://galisteoaviation.com/assets/img/galisteo/section-01.jpg");
    // FIN VIDEO BACKGROUND

    /*CAROUSEL SLICK*/
    //- IF CAROUSEL CENTERED
    function slickInit(cont) {
        var slCenterMode;
        // Mode
        if ($(cont).hasClass('slide-block')){
            slCenterMode = true;
        } else {
            slCenterMode = false;
        }

        if ($(cont).hasClass('slide-no-arrows')){
            slArrows = true;
        } else {
            slArrows = false;
        }

        if ($(cont).hasClass('slide-no-draggable')){
            slDraggable = true;
        } else {
            slDraggable = false;
        }

        //- Initialize slick
        $(cont).slick({
        infinite: true,
        arrows: slArrows,
        touchMove : slDraggable,
        swipe : slDraggable,
        draggable : slDraggable,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        dots: false,
        centerMode: slCenterMode,
        responsive: [
            {
              breakpoint: 480,
              settings: {
                centerMode: false
              }
            }
          ]
        });

        // Customize
        var slCarousel = $(cont);
        var slActive = $(cont+' .slick-active');
        var slButton = $(cont+' button');
        var slHeight;
        var slSlides = $(cont+' .slick-slide');
        var slActive = $(cont+' .slick-active');

        slActive.prev().addClass('sl-prev');
        slActive.next().addClass('sl-next');
        slActive.addClass('sl-animate');
        slButton.addClass('sl-btn-anim');

        slCarousel.on('beforeChange',function(){    
        slSlides.removeClass('sl-prev sl-next');
        slButton.removeClass('sl-btn-anim');
        });

        slCarousel.on('afterChange',function(){  
        slHeight = $('.slick-list').height();
        slActive = $('.slick-active');
        slSlides.removeClass('sl-animate');
        slButton.addClass('sl-btn-anim');
        slActive.prev().addClass('sl-prev');
        slActive.next().addClass('sl-next');
        slActive.addClass('sl-animate');
        });
    }
    slickInit('#slickslide');
    /*FULLPAGE*/
    /*$('#fullpage').fullpage();*/
}
if (ie<9) {
    init();
} else {
    window.onload = init();
}

