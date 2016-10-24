$(function() {
    /*##### un Sticky map at end of row2 ####*/
    $(window).scroll(function (event) {
        if ($(window).scrollTop() > ($('header').height() + $('.row1').height()) && ($(window).scrollTop()+$(window).height()) < ($(document).height()-$('footer').height()-$('.row3').height())){
            $('#map').addClass('affix');
        } else {
            $('#map').removeClass('affix');
        }
    });

    /*##### datetime picker in form #####*/
    $( "#flux_datePublication" ).datepicker({
        dateFormat: "yy-m-d"
    });

    /**/
    $(".alert-message").alert();
    window.setTimeout(function() { $(".alert-message").alert('close'); }, 4000);
});