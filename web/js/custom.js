$(function() {
    /*##### un Sticky map at end of row2 ####*/
    //alert($(window).height()-($('.row3').height()+ $('footer').height()));
    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        //console.log(scroll);
        console.log($('row3').position());
        if (scroll > $(window).height() - ($('.row3').height() + $('footer').height())) {
            alert($(window).position() - ($('.row3').height() + $('footer').height()));
            //$('#map').removeClass('affix');
        }
    });
});