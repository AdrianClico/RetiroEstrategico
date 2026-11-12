<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blocksy
 */

blocksy_after_current_template();
do_action('blocksy:content:bottom');

?>
</main>

<div class="row padding pb-3" style="background-color: #111827">
    <div class="row mb-3">
        <div class="col-md-3 d-flex align-items-center justify-content-center justify-content-sm-start">
            <a href="<?php echo get_bloginfo("url")?>/">
                <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/logo.png" class="img"> 
            </a>
        </div>
        <div class="col-md-5 col-12 pe-0 pe-sm-4">
            <p class="mb-2">
                <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/phone_icon.png">
                <a href="tel:55 8000 6698" class="link"> 55 8000 6698</a>
            </p>
            <p class="mb-2">
                <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/wp.png">
                <a href="https://wa.link/ktfxw4" target="_blank" class="link"> 55 4142 0373</a>
            </p>
            <p class="mb-2">
                <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/mail.png">
                <a href="mailto:contacto@retiroestrategico.com" class="link"> contacto@retiroestrategico.com</a>
            </p>
            <p>
                <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/add.png">
                <a href="https://maps.app.goo.gl/MJt72AoGJFRtDyYj8" target="_blank" class="link"> Insurgentes Sur 730,
                    Col. del Valle, Benito Juárez, 03100, CDMX</a>
            </p>
			<p class="text-center text-sm-start">
				<a href="<?php echo get_bloginfo("url")?>/contacto/" class="cta"> Contáctanos</a>
			</p>
            
        </div>
        <div class="col-md-4 col-12 ps-0 ps-sm-5">
            <a href="<?php echo get_bloginfo("url")?>/servicios/" class="link"> Servicios</a> <br>
            <a href="<?php echo get_bloginfo("url")?>/pension-imss/" class="link"> Pensión IMSS</a> <br>
            <a href="<?php echo get_bloginfo("url")?>/modalidad-40/" class="link">Modalidad 40</a> <br>
            <a href="<?php echo get_bloginfo("url")?>/trabajadores-independientes/" class="link"> Trabajadores
                Independientes</a> <br>
            <a href="<?php echo get_bloginfo("url")?>/simulador/" class="link"> Simulador</a> <br>
            <a href="<?php echo get_bloginfo("url")?>/blog/" class="link"> Blog</a>
        </div>
      
    </div>
    
    <a href="https://retiroestrategico.mx/aviso-de-privacidad/" class="link text-center">Aviso de Privacidad</a>
  	
	<a href="https://clico.mx/" target="_blank" class="link text-center">Sitio web desarrollado por Clico® Digital Marketing S.A. de C.V.</a>
</div>
</div>

<?php wp_footer(); ?>
<script>
  AOS.init();
</script>
<script src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/accordion.js"></script>
<script src="<?php echo get_bloginfo("stylesheet_directory") ?>/assets/form.js"></script>
</body>

</html>