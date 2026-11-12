<?php

$opciones_servicio = [
    "Análisis de situación afiliatoria",
    "Desarrollo de escenarios personalizados",
    "Asesorías pensiones IMSS",
	"Trámite de pension IMSS",
    "Guía Integral"
];
?>

<form method="post" id="form-contact">

    <label for="name" class="w-100">
        Nombre:
        <input type="text" name="name" value="" size="40" class="w-100" placeholder="Escribe tu nombre" required>
    </label>

    <label for="phone" class="w-100 mb-2">
        Teléfono:
        <input type="tel" name="phone" value="" size="40" class="w-100" placeholder="Escribe tu teléfono" required>
    </label>

    <label for="email" class="w-100">
        Correo:
        <input type="email" name="email" value="" size="40" class="w-100" placeholder="Escribe tu correo" required>
    </label>

    <label for="servicio" class="w-100">
        Servicio:
        <select name="servicio" id="servicio" class="w-100" required>
            <option value="">Seleciona un servicio</option>
            <?php foreach($opciones_servicio as $servicio): ?>
                <option value="<?php echo $servicio; ?>"><?php echo $servicio; ?></option>
            <?php endforeach; ?>
        </select>
    </label>

    <label for="comments" class="w-100">
        Comentarios:
        <textarea name="comments" rows="5" cols="20" class="w-100" placeholder="¡Quiero una consulta personalizada!"></textarea>
    </label>

    <!-- Google reCAPTCHA -->
    <div class="g-recaptcha my-3" data-sitekey="6LcGXdwrAAAAAPwE8X1ohsuuKw0PF-4ZsjRjHYk5"></div>

    <input type="hidden" name="source" value="contacto">
    <input type="hidden" name="utm_source" value="<?php echo @$_GET['utm_source'] ?>">
    <input type="hidden" name="utm_medium" value="<?php echo @$_GET['utm_medium'] ?>">
    <input type="hidden" name="utm_campaign" value="<?php echo @$_GET['utm_campaign'] ?>">
    <input type="hidden" name="utm_id" value="<?php echo @$_GET['utm_id'] ?>">
    <input type="hidden" name="utm_term" value="<?php echo @$_GET['utm_term'] ?>">
    <input type="hidden" name="utm_content" value="<?php echo @$_GET['utm_content'] ?>"><br>

    <p class="mt-3">
        <input type="button" value="Enviar" id="enviar" class="btn1 border-0 fw-bold">
    </p>

    <div style="display:none;" class="my-2" id="msg-enviar">
        <p class="text-center text-white">Espere un momento, su solicitud está siendo atendida...</p>
    </div>
</form>