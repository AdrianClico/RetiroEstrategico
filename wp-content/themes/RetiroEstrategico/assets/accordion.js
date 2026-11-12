$(document).ready(function() {
    $('.pregunta').click(function() {
        // Ocultar todas las respuestas
        $('.respuesta').slideUp();
        
        // Mostrar solo la respuesta del elemento clickeado si estaba oculta
        var respuesta = $(this).siblings('.respuesta');
        if (respuesta.is(':hidden')) {
            respuesta.slideDown();
        }
    });
});