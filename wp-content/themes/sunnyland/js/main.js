$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('a.avt-user').click(function(event) {
        $('.acc-top').slideToggle(300);
    });

    if($('.form-search').height()>0){
        $( function() {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 10000000000,
                values: [ minmoney, maxmoney ],
                slide: function( event, ui ) {
                    $('.mo-left').html(ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + ' VNĐ');
                    $('.mo-right').html(ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + ' VNĐ');
                    $('.min-money').val(ui.values[0]);
                    $('.max-money').val(ui.values[1]);
                }
            });
            $('.mo-left').html($( "#slider-range" ).slider( "values", 0 ).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")+ ' VNĐ');
            $('.mo-right').html($( "#slider-range" ).slider( "values", 1 ).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")+ ' VNĐ ');
            $('.min-money').val($( "#slider-range" ).slider( "values", 0 ));
            $('.max-money').val($( "#slider-range" ).slider( "values", 1 ));
        });
    }
    $('.featured-slider').owlCarousel({
        // loop:true,
        margin:30,
        nav:true,
        autoplay: true,
        navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
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
        }
    });
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 80) {
            $(".header .navbar").addClass("active");
        } else {
            $(".header .navbar").removeClass("active");
        }
        if (scroll >= 220) {
            $('.back-to-top').fadeIn(500);
        } else {
            $('.back-to-top').fadeOut(500);
        }
    });
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
});