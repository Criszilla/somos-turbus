/////// OWL CAROUSEL ////////

( function( $ ) {
    //Clone comment
    //$(".contenido-comentarios #respond").clone().appendTo(".formulario-comentarios");
    $(".contenido-comentarios #respond").hide();

    $("a.comment-reply-link").click(function(){
        $(".contenido-comentarios #respond").show();
    });

} )( jQuery );