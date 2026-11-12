function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

$(function () {
    $("#form").validate({
        rules: {
            name: { required: true, minlength: 3 },
            email: { required: true, email: true },
            phone: { required: true, digits: true, minlength: 10, maxlength: 10 },
            servicio: { required: true },
        },
        messages: {
            name: {
                required: "Introduzca su nombre completo",
                minlength: "Nombre de al menos 3 caractéres"
            },
            email: {
                required: "Introduzca su correo electrónico",
                email: "El email debe estar en formato: abc@domain"
            },
            phone: {
                required: "Introduzca su número a 10 dígitos",
                digits: "Por favor introduzca solo dígitos",
                minlength: "El número debe ser a 10 dígitos",
                maxlength: "El número no debe ser mayor a 10 dígitos"
            },
            servicio: { required: "Seleccione un servicio" }
        }
    });

    $("#enviar").on('click', function () {
        $("#form-contact").valid();
        $('#msg-enviar').hide().show();

        var captcha = grecaptcha.getResponse();
        if (!captcha) {
            $('#msg').empty().append("<p style='color: red; text-align:center'>Por favor completa el CAPTCHA</p>").hide().fadeIn();
            $('#msg-enviar').hide();
            return;
        }

        if ($("#form-contact").valid()) {
            var formData = $('#form-contact').serializeArray();
            formData.push({ name: 'g-recaptcha-response', value: captcha });
            var hubspotutk = getCookie('hubspotutk');
            if (hubspotutk) {
                formData.push({ name: 'hubspotutk', value: hubspotutk });
            }

            $.ajax({
                url: "https://apiv2.clico.com.mx/api/retiro_estrategico/contact",
                type: "POST",
                data: $.param(formData),
                success: function (response) {
                    $('#msg-enviar').hide();
                    $('#msg').hide();

                    if (response.status === 'success') {
                        $('#msg').empty().append('<p class="text-white">Su solicitud fue enviada exitosamente, ¡Gracias por contactarnos!</p>').hide().fadeIn();
                        $("#form-contact").trigger("reset");
                        grecaptcha.reset();
                        window.location = '../contacto/typ';
                    } else {
                        $('#msg').empty().append("<p> Ha ocurrido un error al enviar su solicitud, por favor intente nuevamente</p>").hide().fadeIn();
                    }
                },
                error: function () {
                    $('#msg').empty().append("<p><br> Ha ocurrido un error al enviar su solicitud, por favor intente nuevamente </p>").hide().fadeIn();
                    $('#msg-enviar').hide();
                }
            });
        } else {
            $('#msg').empty().append("<p style='color: red; text-align:center '> Por favor llene todos los campos requeridos</p>").hide().fadeIn();
            $('#msg-enviar').hide();
        }
    });
});
