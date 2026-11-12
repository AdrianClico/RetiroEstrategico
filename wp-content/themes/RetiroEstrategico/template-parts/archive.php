<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blocksy
 */

$maybe_custom_output = apply_filters(
	'blocksy:posts-listing:canvas:custom-output',
	null
);

if ($maybe_custom_output) {
	echo $maybe_custom_output;
	return;
}

$container_class = 'ct-container';


/**
 * Note to code reviewers: This line doesn't need to be escaped.
 * Function blocksy_output_hero_section() used here escapes the value properly.
 */
echo blocksy_output_hero_section([
	'type' => 'type-2'
]);

$section_class = '';

if (! have_posts()) {
	$section_class = 'class="ct-no-results"';
}

?>
<div class="padding row" style="background-color: #F0F0F0">
    <div class="col-md-7 d-flex flex-column justify-content-center">
        <h1 class="fw-bold" style="color: #005EAA">  Blog </h1>
        <p>Te compartimos información clara sobre pensiones IMSS: guías prácticas de Ley 73, Ley 97, semanas cotizadas y Modalidad 40, entre otros temas, para tomar decisiones inteligentes y planear tu retiro con seguridad.</p>
        
    </div>
    <div class="col-md-5 d-flex justify-content-center align-items-center">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/blog.png" class="person-img">
    </div>
</div>

<div class="<?php echo $container_class ?>" <?php echo wp_kses_post(blocksy_sidebar_position_attr()); ?> <?php echo blocksy_get_v_spacing() ?>>
	<section <?php echo $section_class ?>>
		<?php
			/**
			 * Note to code reviewers: This line doesn't need to be escaped.
			 * Function blocksy_output_hero_section() used here
			 * escapes the value properly.
			 */
			echo blocksy_output_hero_section([
				'type' => 'type-1'
			]);

			echo blocksy_render_archive_cards();
		?>
	</section>
	
	<?php get_sidebar(); ?>
</div>


<div class="bg-home text-start row"> 
    <div class="col-lg-6 d-flex flex-column justify-content-center ps-0 ps-sm-5">
        <h2 class="text-white fw-bold mt-3">Tu pensión, <br class="d-none d-lg-block"> <span style="color: #D4AF37"> con la guia de expertos </span></h2>
        <p class="text-white"> Entender tu <span class="fw-bold"> pensión IMSS</span> puede ser complejo <span class="fw-bold"> pero no tienes que hacerlo solo </span></p>
        <p class="mt-3">
            <a href="<?php echo get_bloginfo("url")?>/contacto/" class="cta3"><img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/i.png"> Agenda tu sesión inicial sin costo</a>
        </p>
    </div>
    <div class="col-lg-6 pt-3 text-center text-sm-start d-none d-lg-block">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/compromiso_draw.png" class="bg-img">
    </div>
</div>