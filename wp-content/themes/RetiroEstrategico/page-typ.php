<?php get_header(); ?>
<div class="padding row" style="background-color: #F0F0F0">
    <div class="col-md-7 d-flex flex-column justify-content-center text-center">
        <h2 class="fw-bold" style="color: #005EAA"> ¡Gracias por contactarnos!</h2>
        <h3 class="fw-bold">En breve uno de nuestros asesores se pondrá en contacto contigo</h3>
        <p class="mt-3 text-center">
            <a href="<?php echo get_bloginfo("url")?>/" class="cta rounded-5"> Ir al inicio</a>
        </p>
    </div>
    <div class="col-md-5 d-flex justify-content-center align-items-center">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/blog.png" class="person-img">
    </div>
    
</div>
<?php get_footer(); ?>