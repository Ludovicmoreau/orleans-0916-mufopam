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
    $(".flash-success, .flash-notice, .flash-alerte, .alert-message").alert();
    window.setTimeout(function() { $(".flash-success, .flash-notice, .flash-alerte, .alert-message").alert('close'); }, 4000);

    /*##### bp back to top #####*/
    // scroll distance to display bp
    var amountScrolled = 600;
    $(window).scroll(function() {
        if ( $(window).scrollTop() > amountScrolled ) {
            $('a.back-to-top').fadeIn('slow');
        } else {
            $('a.back-to-top').fadeOut('slow');
        }
    });
    // bp action to up
    $('a.back-to-top').click(function() {
        $(window).animate({
            scrollTop: 0
        }, 700);
    });
    /*##### Table sorter #####*/
    $('.tableSorter').tablesorter();

});