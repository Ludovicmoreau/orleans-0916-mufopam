$(function() {
    /*##### Animation scrolling sticky navbar ####*/
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$('.banniere').height()){
            $('nav').addClass('navbar-fixed-top');
        } else if ($(window).scrollTop()<$('.banniere').height()) {
            $('nav').removeClass('navbar-fixed-top');
        }
    });
});