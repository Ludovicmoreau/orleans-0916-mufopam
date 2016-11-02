$(function() {
    /*##### stick dynamic navbar ####*/
    $('#custom-bootstrap-menu').affix({
       offset: {
           top:$('.banniere').height()-$('nav').height()-8
       }
    });
    /*##### Gestion du flashbag #####*/
    $(".flash-success, .flash-notice, .flash-alerte, .alert-message").alert();
    window.setTimeout(function() { $(".flash-success, .flash-notice, .flash-alerte, .alert-message").alert('close'); }, 5000);

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

    /*##### datetime picker in form #####*/
    $( "#flux_datePublication" ).datepicker({
        dateFormat: "yy-m-d"
    });

    /*##### Summernote #####*/
    
         $('#flux_contenu, #equipe_descriptionEquipe, #brevets_brevet').summernote({
                height: 300
            });
    
        
    
        var save = function() {
            var makrup = $('.click2edit').summernote('code');
            $('.click2edit').summernote('destroy');
        };
    
        /* Taille image */
    
        $('#summernote').summernote('insertImage', url, function ($image) {
            $image.css('width', $image.width() / 4);
            $image.attr('data-filename', 'retriever');
        });


});