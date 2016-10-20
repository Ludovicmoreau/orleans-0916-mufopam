$(function() {
    /*##### un Sticky map at end of row2 ####*/
    $(window).scroll(function (event) {
        if ($(window).scrollTop() > ($('header').height() + $('.row1').height()) && ($(window).scrollTop()+$(window).height()) < ($(document).height()-$('footer').height()-$('.row3').height())){
            $('#map').addClass('affix');
        } else {
            $('#map').removeClass('affix');
        }
    });
    /*$('#accueil').click(function() {
        $(this).addClass('active');
        $('#equipes, #actualites, #publications, #brevets, #jobs').removeClass('active');
    });
    $('#equipes').click(function() {
        $(this).addClass('active');
        $('#accueil, #actualites, #publications, #brevets, #jobs').removeClass('active');
    });
    $('#actualites').click(function() {
        $(this).addClass('active');
        $('#accueil, #equipes, #publications, #brevets, #jobs').removeClass('active');
    });
    $('#publications').click(function() {
        $(this).addClass('active');
        $('#accueil, #equipes, #actualites, #brevets, #jobs').removeClass('active');
    });
    $('#brevets').click(function() {
        $(this).addClass('active');
        $('#accueil, #equipes, #actualites, #publications, #jobs').removeClass('active');
    });
    $('#jobs').click(function() {
        $(this).addClass('active');
        $('#accueil, #equipes, #actualites, #brevets, #publications').removeClass('active');
    });*/
});