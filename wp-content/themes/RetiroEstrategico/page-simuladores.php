<?php get_header(); ?>
<div class="padding" style="background-color: #F0F0F0;">
    <h1 class="fw-bold">Simuladores <span style="color: #1E40AF"> y calculadoras </span></h1>
    <div class="grid-home mt-3">
       <div class="item d-flex flex-column justify-content-between p-4" style="background-color: #FFFFFF;" data-aos="zoom-out-left" data-aos-duration="3000">
            <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/cal_m40.png" class="pb-3">
            <a href="<?php echo get_bloginfo("url")?>/simuladores/calculadora-modalidad-40/" class="fw-bold h4">Calculadora Modalidad 40</a>
            <p class="pt-3">
                Con nuestra Calculadora de Modalidad 40, puedes saber de forma inmediata y gratuita cuánto te costaría cotizar con el salario base de cotización que tú elijas.
            </p>
            <a href="<?php echo get_bloginfo("url")?>/simuladores/calculadora-modalidad-40/" class="fw-bold">Usar calculadora</a>
        </div>
        <div class="item d-flex flex-column justify-content-between p-4" style="background-color: #FFFFFF;" data-aos="zoom-out-right" data-aos-duration="3000">
            <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/cal_pension.png" class="pb-3"><br>
            <a href="<?php echo get_bloginfo("url")?>/simuladores/simulador-pension-imss/" class="fw-bold h4">Simulador Pensión IMSS</a>
            <p class="pt-3">
                El simulador de pensión IMSS te permite estimar cuánto recibirías al jubilarte según tu régimen, edad, semanas cotizadas y salario.
            </p>
            <a href="<?php echo get_bloginfo("url")?>/simuladores/simulador-pension-imss/" class="fw-bold">Usar simulador </a>
        </div>
    </div>
</div>

<?php get_footer(); ?>