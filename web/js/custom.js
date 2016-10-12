$(function() {
    /*##### un Sticky map at end of row2 ####*/
    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        if (scroll > $(window).height() - ($('.row3').height() + $('footer').height() + $('#map').height()+100)) {
            $('#map').removeClass('affix');
        } else if (scroll > ($('header').height())) {
            $('#map').addClass('affix');
        }
    });
});