( function( $ ) {
    /////// OWL CAROUSEL ////////
    //Slider Home
    $('#slider_home').owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        dots:false,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
		center: false,
        rewind: false,
        mouseDrag: true,
		touchDrag: true,
		pullDrag: true,
        freeDrag: false,
        merge: false,
		mergeFit: true,
        autoWidth: false,
        startPosition: 0,
		rtl: false,
        margin: 0,
        stagePadding: 0,
        smartSpeed: 250,
		fluidSpeed: false,
		dragEndSpeed: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    //Slider Novedades en el home
    $('#slider_novedades').owlCarousel({
        loop:false,
        margin:30,
        nav:true,
        dots:true,
        autoplay:true,
        autoplayTimeout:5000,
        animateOut: 'fadeOutDown',
        animateIn: 'fadeIn',
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });

   /////// ELASTIC MENU ////////
    $("#btn_show").click(function(){
        $("#elastic-menu").addClass("active");
    });

    $("#btn_show2").click(function(){
        $("#elastic-menu").addClass("active");
    });

    $("#btn_show3").click(function(){
        $("#elastic-menu").addClass("active");
    });

    $("#btn_show4").click(function(){
        $("#elastic-menu").addClass("active");
    });

    $("#btn_show5").click(function(){
        $("#elastic-menu").addClass("active");
    });

    $("#btn_close").click(function(){
        $("#elastic-menu").removeClass("active");
    });

    /////// LOGIN DE USUARIOS ////////
    $('.swpm-username-input input[type=text]').attr("placeholder","Usuario");
    $('.swpm-password-input input[type=password]').attr("placeholder","Password");
    $('.swpm-login-submit input[type=submit]').addClass('btn btn-success');
    $('.swpm-login-submit input[type=submit]').attr("value","Iniciar Sesión");

    /////// AOS INITIALIZE ////////
    AOS.init();

    /////// SCROLL MAIN MENU////////

    //$('.scroll-nav').onePageNav();

    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {
            $('#main-menu').addClass('esconder-menu');
            $('#main-menu2').addClass('mostrar-menu');
            $('#main-menu').removeClass('mostrar-menu');
            $('#main-menu2').removeClass('esconder-menu');
        } else {
            $('#main-menu').addClass('mostrar-menu');
            $('#main-menu2').addClass('esconder-menu');
            $('#main-menu').removeClass('esconder-menu');
            $('#main-menu2').removeClass('mostrar-menu');
        }
    });

    $("#search-form-button").click(function(){
        $(".search-form-top").removeClass("hide");
        $(".search-form-top input").focus();
        $("#search-form-button").addClass("hide");
    });    

    $("#main-menu input#s").blur(function(){
        $(".search-form-top").addClass("hide");
        $("#search-form-button").removeClass("hide");
    });

    $("#search-form-button2").click(function(){
        $(".search-form-top2").removeClass("hide");
        $(".search-form-top2 input").focus();
        $("#search-form-button2").addClass("hide");
    });

    $("#main-menu2 input#s").blur(function(){
        $(".search-form-top2").addClass("hide");
        $("#search-form-button2").removeClass("hide");
    });

    /////// EMBAJADORES////////

    //Fondo para embajadores
    $("#embajadores-tab").click(function(){
        $("main").addClass("main-bg-embajadores");
    });

    /*$("#dashboard-tab").click(function(){
        $("main").removeClass("main-bg-embajadores");
    });

    $("#cliente-incognito-tab").click(function(){
        $("main").removeClass("main-bg-embajadores");
    });

    $("#mi-perfil-tab").click(function(){
        $("main").removeClass("main-bg-embajadores");
    });

    $("#novedades-tab").click(function(){
        $("main").removeClass("main-bg-embajadores");
    });

    $("#procedimientos-tab").click(function(){
        $("main").removeClass("main-bg-embajadores");
    });

    $("#embajadores .comment-reply-link").click(function(){
        $(".comment-respond form p.form-submit").append('<a rel="nofollow" class="btn btn-danger" id="cancel-comment-reply-link" href="/web/somos_turbus2/my-place/#respond"><i class="fas fa-times"></i></a>');
        $("#embajadores .comment-respond form p.comment-form-comment").attr("style","width:70%");
        $("#embajadores .comment-respond form p.form-submit input#submit").attr("value","Responder");
    });

    */

    $("#comentarios-myplace p.comment-form-comment #comment").attr("rows","1");
    $("#comentarios-myplace p.comment-form-comment #comment").attr("placeholder","Escribe un comentario aquí");

    $("#comentarios-myplace p.form-submit input#submit").attr("value","Publicar");


    /////////CAMBIO DE ERRORES DE FORMULARIO///////////

    $(".swpm-join-us-link").hide();

    $(".swpm-pw-reset-submit").addClass("btn-custom");
    $(".swpm-pw-reset-submit").attr("value","Restaurar Contraseña");
    $(".swpm-pw-reset-email-label").empty();
    $(".swpm-pw-reset-email-label").append("Ingresa tu email:");

    /*Success Msj.*/
    $("#swpm_message").addClass("wrapper-box");
    $(".swpm-reset-pw-success-box").addClass("alert alert-success alert-dismissible fade show alert alert-success alert-dismissible fade show custom-alerts");
    $(".swpm-reset-pw-success-box").attr("role","alert");
    $(".swpm-reset-pw-success-box").append("<div><h4 class='alert-heading'>Email enviado</h4><p>Hemos enviado un mail a su correo para proceder con el cambio de contraseña</p></div>");
    $(".swpm-reset-pw-success").hide();
    $(".swpm-reset-pw-success-email").hide();
    $(".swpm-reset-pw-success-box").append("<button type='button' id='close-custom-alert' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");

    $(".wrapper-box").click(function(){
        $("#swpm_message").fadeOut();
    });

    /*Error Msj.*/
    $(".swpm-reset-pw-error").empty();
    $(".swpm-reset-pw-error-email").empty();
    $(".swpm-reset-pw-error").addClass("alert alert-warning alert-dismissible fade show alert alert-warning alert-dismissible fade show custom-alerts");
    $(".swpm-reset-pw-error").attr("role","alert");
    $(".swpm-reset-pw-error").append("<div><h4 class='alert-heading'>Email no encontrado</h4><p>Lo sentimos pero el mail ingresado no se encuentra en nuestra base de datos</p></div>");
    $(".swpm-reset-pw-error").append("<button type='button' id='close-custom-alert' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");

    /////////USUARIO NO ENCONTRADO///////////

    $("span.swpm-login-widget-action-msg").clone().appendTo("#respuesta-login");
    $("#swpm-login-form span.swpm-login-widget-action-msg").hide();
    
    if($('#respuesta-login span.swpm-login-widget-action-msg').text().length > 0){
        $("#respuesta-login").addClass("alert alert-warning alert-dismissible fade show alert alert-warning alert-dismissible fade show custom-alerts");
        $("#respuesta-login").append("<div><h4 class='alert-heading'>Usuario no encontrado</h4><p>Lo sentimos pero el usuario ingresado no se encuentra en nuestra base de datos</p></div>");
        $("#respuesta-login").append("<button type='button' id='close-custom-alert' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
        $("#respuesta-login span.swpm-login-widget-action-msg").hide();        
    }


    // Cambios en Mi Perfil

    $(".swpm-profile-username-row label").html("Tipo de Usuario");
    $(".swpm-profile-firstname-row label").html("Nombre:");
    $(".swpm-profile-lastname-row label").html("Apellido:");
    $(".swpm-profile-password-row label").html("Contraseña:");
    $(".swpm-profile-password-retype-row label").html("Repetir Contraseña:");
    $("input#password").attr("placeholder","Dejar en blanco si quieres mantener el actual");
    $("input#password_re").attr("placeholder","Dejar en blanco si quieres mantener el actual");
    $(".swpm-edit-profile-submit-section input").attr("value","Actualizar");

    //Ocultar
    $(".swpm-profile-phone-row").addClass("d-none");
    $(".swpm-profile-street-row").addClass("d-none");
    $(".swpm-profile-city-row").addClass("d-none");
    $(".swpm-profile-state-row").addClass("d-none");
    $(".swpm-profile-zipcode-row").addClass("d-none");
    $(".swpm-profile-country-row").addClass("d-none");
    $(".swpm-profile-company-row").addClass("d-none");
    $(".swpm-profile-membership-level-row").addClass("d-none");

} )( jQuery );