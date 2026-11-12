<?php get_header();

while (have_posts()) :
	the_post();

	//Campos para seccion 1
	$banner_inicial = get_field("seccion_1");
    $titulo = $banner_inicial['titulo'];
    $imagen = $banner_inicial['imagen'];
    $subtitulo = $banner_inicial['subtitulo'];
    $parrafo = $banner_inicial['parrafo'];


//Campos para seccion 2
	$banner_secundario = get_field("seccion_2");
    $imagen_s2_l1 = $banner_secundario['lista_1']['imagen'];
    $parrafo_s2_l1 = $banner_secundario['lista_1']['parrafo'];
	$imagen_s2_l2 = $banner_secundario['lista_2']['imagen'];
    $parrafo_s2_l2 = $banner_secundario['lista_2']['parrafo'];
	$imagen_s2_l3 = $banner_secundario['lista_3']['imagen'];
    $parrafo_s2_l3 = $banner_secundario['lista_3']['parrafo'];
	$parrafo_s2 = $banner_secundario['parrafo'];

	$lista_s2 = [
        ['texto' => $parrafo_s2_l1, 'imagen' => $imagen_s2_l1],
        ['texto' => $parrafo_s2_l2, 'imagen' => $imagen_s2_l2],
        ['texto' => $parrafo_s2_l3, 'imagen' => $imagen_s2_l3],
    ];

//Campos para seccion 3
	$beneficios = get_field("seccion_3");
	$titulo_beneficios = $beneficios['titulo'];
    
    $patrones = [
        'Beneficios del',
        'Beneficios de nuestra',
        'Beneficios de nuestro'
    ];

    $titulo_beneficios_parte1 = $titulo_beneficios;
    $titulo_beneficios_parte2 = '';

    foreach ($patrones as $patron) {
        if (stripos($titulo_beneficios, $patron) === 0) {
            $titulo_beneficios_parte1 = $patron;
            $titulo_beneficios_parte2 = trim(substr($titulo_beneficios, strlen($patron)));
            break;
        }
    }
    $imagen_beneficios_l1 = $beneficios['lista_1']['imagen'];
    $parrafo_beneficios_l1 = $beneficios['lista_1']['parrafo'];
	$imagen_beneficios_l2 = $beneficios['lista_2']['imagen'];
    $parrafo_beneficios_l2 = $beneficios['lista_2']['parrafo'];
	$imagen_beneficios_l3 = $beneficios['lista_3']['imagen'];
    $parrafo_beneficios_l3 = $beneficios['lista_3']['parrafo'];
	$imagen_beneficios_l4 = $beneficios['lista_4']['imagen'];
    $parrafo_beneficios_l4 = $beneficios['lista_4']['parrafo'];
	$imagen_beneficios_l5 = $beneficios['lista_5']['imagen'];
    $parrafo_beneficios_l5 = $beneficios['lista_5']['parrafo'];

//Campos para seccion 4
	$pasos = get_field("seccion_4");
    $paso1_titulo = $pasos['paso_1']['titulo'];
    $paso1_parrafo = $pasos['paso_1']['parrafo'];
	$paso2_titulo = $pasos['paso_2']['titulo'];
    $paso2_parrafo = $pasos['paso_2']['parrafo'];
	$paso3_titulo = $pasos['paso_3']['titulo'];
    $paso3_parrafo = $pasos['paso_3']['parrafo'];
	$paso4_titulo = $pasos['paso_4']['titulo'];
    $paso4_parrafo = $pasos['paso_4']['parrafo'];

//Campos para seccion 5
	$grupo_pf = get_field('seccion_5');
	$preg_frec = [];
	if ( $grupo_pf ){
      for ( $i = 1; $i <= 5; $i++ ) {
        $pf = $grupo_pf["pregunta_$i"];
        if ($pf) {
          $preg_frec[] = $pf;
        }
      }
    }

//Campos para seccion 6
	$seccion_6 = get_field("seccion_6");
    $lista_1_s6 = $seccion_6['lista_1'];
    $lista_2_s6 = $seccion_6['lista_2'];
    $lista_3_s6 = $seccion_6['lista_3'];

//Campos para seccion 7
	$seccion_7 = get_field("seccion_7");
    $pregunta_s7 = $seccion_7['pregunta'];
    $parrarfo_s7 = $seccion_7['parrafo'];

// --- Helpers de split ---
function smart_split_for_bicolor(string $text, array $delims, int $min_left = 10, int $min_right = 8): array {
    $t = trim(preg_replace('/\s+/', ' ', $text));
    if ($t === '') return ['', ''];

    foreach ($delims as $d) {
        $pattern = '/\s+'.preg_quote($d, '/').'\s+/iu';
        if (preg_match($pattern, $t)) {
            $parts = preg_split($pattern, $t, 2);
            if (count($parts) === 2) {
                $left  = trim($parts[0]);
                $right = trim($d.' '.$parts[1]);
                if (mb_strlen($left) >= $min_left && mb_strlen($right) >= $min_right) {
                    return [$left, $right];
                }
            }
        }
    }

    $len = mb_strlen($t);
    $target = (int)ceil($len * 0.55);
    $pos = mb_strpos($t, ' ', $target);
    if ($pos === false) {
        $before = mb_strrpos(mb_substr($t, 0, $target), ' ');
        $pos = $before !== false ? $before : $target;
    }
    $left  = trim(mb_substr($t, 0, $pos));
    $right = trim(mb_substr($t, $pos));

    if (mb_strlen($left) < $min_left || mb_strlen($right) < $min_right) {
        return [$t, ''];
    }

    return [$left, $right];
}

$delims_pregunta = [
    'y',        
    'para',     
    'sin',      
    'con',      
    'ni',       
];

$delims_parrafo = [
    'y recibe', 
    'y obtén',  
    'y conoce', 
    'y',        
    'para',
    'sin',
    'con',
];

list($preg_1, $preg_2) = smart_split_for_bicolor($pregunta_s7, $delims_pregunta);
list($p_1, $p_2)       = smart_split_for_bicolor($parrarfo_s7, $delims_parrafo);



?>
<!--baner 1---->
<div class="bg-home d-flex flex-column flex-lg-row">
    <div class="col-lg-6 text-start d-flex flex-column justify-content-center">
        <h1 class="fw-bold text-white"><?php echo $titulo; ?></h1>
        <p class="fw-bold text-white mt-3"><?php echo $subtitulo; ?></p>
        <p class="text-white mt-3"><?php echo $parrafo; ?></p>
        <p class="mt-4">
            <a href="<?php echo get_bloginfo("url")?>/contacto/" class="cta3"><img
                    src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/i.png"> Agenda tu sesión</a>
        </p>
    </div>
    <div class="col-lg-6 text-center">
        <img src="<?php echo $imagen; ?>" class="bg-img">
    </div>
</div>


<!--banner 2 ---->
<div class="padding d-flex flex-column-reverse flex-lg-row">
    <div class="col-lg-6 text-center">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/Capa_1.png" class="person-img">
    </div>
    <div class="col-lg-6">
      <?php foreach ($lista_s2 as $p) :
    if (!empty($p['texto'])) : ?>
        <div class="row">
            <p class="col-2 text-center">
                <img src="<?php echo $p['imagen']; ?>">
            </p>
            <p class="col-10 fw-bold">
                <?php echo $p['texto']; ?>
            </p>
        </div>
    <?php endif;
endforeach; ?>
        
        <p><?php echo $parrafo_s2; ?></p>
        <p class="pt-4">
            <a href="<?php echo get_bloginfo("url")?>/contacto/" class="cta"> Agenda tu sesión</a>
        </p>
    </div>
</div>

<!--banner beneficios-------------->
<div class="padding row" style="background: #F0F0F0">
    <div class="col-lg-6">
        <h2 class="fw-bold"><?php echo $titulo_beneficios_parte1; ?> <span style="color: #005EAA"> <?php echo $titulo_beneficios_parte2; ?> </span></h2>
        
        <!--BENEFICIOS------>
        <?php
          // Recorremos dinámicamente lista_1 ... lista_5
          for ($i = 1; $i <= 5; $i++) {
              if (!isset($beneficios['lista_' . $i])) continue; // seguridad

              $item = $beneficios['lista_' . $i];
              $parrafo = trim($item['parrafo'] ?? '');
              $imagen  = $item['imagen'] ?? '';

              if ($parrafo !== '') : ?>
                  <div class="row rounded-4 p-3 mb-3 align-items-center" style="background: white">
                      <p class="col-2 text-center mb-0">
                          <?php if ($imagen !== ''): ?>
                              <img src="<?php echo $imagen; ?>" alt="beneficio <?php echo $i; ?>">
                          <?php endif; ?>
                      </p>
                      <p class="col-10 mb-0">
                          <?php echo $parrafo; ?>
                      </p>
                  </div>
              <?php endif;
          }
          ?>

    </div>

    <div class="col-lg-6 d-flex justify-content-center align-items-center">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/beneficios.png" class="person-img">
    </div>
</div>

<!--banner pasos-------------->
<div class="padding">
    <h2 class="fw-bold">Nuestro proceso <span style="color: #005EAA"> en 4 pasos </span></h2>
    <div class="pasos">

        <!----Paso indivual----->
        <div class="paso">
            <div class="d-flex flex-row align-items-center">
                <h2 class="fw-bold" style="color:#059669"> 1 </h2> <hr class="fw-bold">
            </div>
            <h3 class="fw-bold"> <?php echo $paso1_titulo; ?> </h3>
            <p><?php echo $paso1_parrafo; ?></p>
        </div>
      
      	<div class="paso">
            <div class="d-flex flex-row align-items-center">
                <h2 class="fw-bold" style="color:#9333EA"> 2 </h2> <hr class="fw-bold">
            </div>
            <h3 class="fw-bold"> <?php echo $paso2_titulo; ?> </h3>
            <p><?php echo $paso2_parrafo; ?></p>
        </div>
      
      	<div class="paso">
            <div class="d-flex flex-row align-items-center">
                <h2 class="fw-bold" style="color:#EA580C"> 3 </h2> <hr class="fw-bold">
            </div>
            <h3 class="fw-bold"> <?php echo $paso3_titulo; ?> </h3>
            <p><?php echo $paso3_parrafo; ?></p>
        </div>
      
      	<div class="paso">
            <div class="d-flex flex-row align-items-center">
                <h2 class="fw-bold" style="color:#1E40AF"> 4 </h2> <hr class="fw-bold">
            </div>
            <h3 class="fw-bold"> <?php echo $paso4_titulo; ?> </h3>
            <p><?php echo $paso4_parrafo; ?></p>
        </div>
       
    </div>
</div>



<!------Preguntas Frecuentes---------->


<div class="padding faq-container">
    <h2 class="fw-bold mb-4">Preguntas frecuentes sobre <span style="color: #005EAA"><?php echo $titulo; ?></span></h2>
    
    <!----preguntas------->
    <?php foreach ($preg_frec as $p_fre): ?>
        <?php if($p_fre['pregunta'] != null): ?>
          
            <details class="faq-accordion" name="faq-group">
                <summary>
                    <span class="pregunta-text"><?php echo $p_fre['pregunta']; ?></span>
                    <span class="icono-flecha">⌄</span>
                </summary>
                <div class="respuesta-content">
                    <?php echo $p_fre['respuesta']; ?>
                </div>
            </details>
        <?php endif; ?>
    <?php endforeach; ?>
</div>


<!--banner fijo ---->
<div class="bg-home text-start row"> 
    <div class="col-lg-6 d-flex flex-column justify-content-center ps-0 ps-sm-5">
        <h2 class="text-white fw-bold mt-3">¡Tu tranquilidad <br class="d-none d-lg-block"> <span style="color: #D4AF37"> es nuestro compromiso! </span></h2>
        <ul class="text-white">
            <?php if($lista_1_s6 != null): ?><li><?php echo $lista_1_s6; ?></li><?php endif; ?>
            <?php if($lista_2_s6 != null): ?><li><?php echo $lista_2_s6; ?></li><?php endif; ?>
            <?php if($lista_3_s6 != null): ?><li><?php echo $lista_3_s6; ?></li><?php endif; ?>
        </ul>
    </div>
    <div class="col-lg-6 pt-3 text-center text-sm-start d-none d-lg-block">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/compromiso_draw.png" class="person-img">
    </div>
</div>


<!--banner fijo ---->
<div class="padding text-center" style="background-color: #E5E7EB">
    <h2 class="fw-bold">
        <?php echo $preg_1; ?>
        <?php if ($preg_2 !== ''): ?>
            <span style="color:#005EAA"><?php echo $preg_2; ?></span>
        <?php endif; ?>
    </h2>

    <p>
        <?php echo $p_1; ?>
        <?php if ($p_2 !== ''): ?>
            <span class="fw-bold"><?php echo ' ' . $p_2; ?></span>
        <?php endif; ?>
    </p>

    <p class="mt-4">
        <a href="<?php echo esc_url( get_bloginfo('url') . '/contacto/' ); ?>" class="cta">Agenda tu sesión</a>
    </p>
</div>

<?php endwhile;
    get_footer(); 
?>