<?php get_header(); ?>

<div class="padding row" style="background-color: #F0F0F0">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 class="fw-bold mb-1" style="color: #005EAA"> Contacto</h1>
        <h3 class="fw-bold">¿Quieres maximizar tu pensión?</h3>
        <p>En RETIRO Estratégico te acompañamos paso a paso para lograrlo.</p>
        <div class="bg-light rounded-3 p-2 p-sm-5">
            <?php include get_stylesheet_directory() . '/template-parts/form.php';?>
        </div>
    </div>
    <div class="col-lg-6 d-flex align-items-center justify-content-center">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/contact.png" class="person-img">
    </div>
</div>

<div class="padding row">
	<div class="col-lg-6 text-center mt-3">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/whats.png" class="person-img my-4">
    </div>
    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-start mb-5">
        <h3 class="fw-bold">WhatsApp</h3>
        <p>Envíanos un mensaje al<span class="fw-bold"> 55-4142-0373</span> para consultas rápidas sobre tu trámite de pensión.</p>
        <a href="https://wa.link/ktfxw4" class="cta3">
            <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/wp.png">
             Escribe por WhatsApp
        </a>
    </div>
    <div class="col-lg-6 text-center">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/phone.png" class="person-img my-4">
    </div>
    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-start mb-5">
        <h3 class="fw-bold">Teléfono directo</h3>
        <p>Comunícate al <span class="fw-bold"> 55-8000-6698 </span>para atención inmediata sobre tu plan de pensión IMSS.</p>
        <a href="tel:5580006698" class="cta3">
            <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/phone_icon.png">
             llama ahora
        </a>
    </div>
    <div class="col-lg-6 text-center">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/mail_contact.png" class="person-img my-4">
    </div>
    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-start mb-5">
        <h3 class="fw-bold">Correo electrónico</h3>
        <p>Escríbenos a <span class="fw-bold"> contacto@retiroestrategico.com</span> y responderemos en menos de 24 horas. </p>
        <a href="mailto:contacto@retiroestrategico.com" class="cta">
            <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/mail.png">
             Envía un correo
        </a>
    </div>
</div>

<div class="bg-home text-start row"> 
    <div class="col-lg-6 d-flex flex-column justify-content-center ps-0 ps-sm-5">
        <h2 class="text-white fw-bold mt-3">Más de 20 años de experiencia <span style="color: #D4AF37"> respaldan nuestro trabajo.  </span></h2>
        <p class="text-white"><span class="fw-bold"> Escríbenos y recibe la orientación que necesitas </span> para planear tu retiro y obtener la mejor pensión posible.</p>
    </div>
    <div class="col-lg-6 pt-3 text-center text-sm-start d-none d-lg-block">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/compromiso_draw.png" class="bg-img">
    </div>
</div>

<div class="padding row">
    <div class="col-md-4">
        <h2 class="fw-bold">Ubicación</h2>
        <a href="https://maps.app.goo.gl/bwQURPsEEHxrDqWA8" target="_blank">
            <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/add.png">
            Domicilio: Insurgentes Sur 730, Col. Del valle, Benito Juárez, 03100, CDMX
        </a>
    </div>
    <div class="col-md-8">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.4616702309577!2d-99.17500062611587!3d19.392448741964554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ffa1d69acbcd%3A0xc38433fae074d868!2sAv.%20Insurgentes%20Sur%20730%2C%20Col%20del%20Valle%20Nte%2C%20Benito%20Ju%C3%A1rez%2C%2003100%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX!5e0!3m2!1ses-419!2smx!4v1759107347750!5m2!1ses-419!2smx" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

</div>

<?php get_footer(); ?>