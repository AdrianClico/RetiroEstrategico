<?php
function enqueue_styles_child_theme() {

	$parent_style = 'parent-style';
	$child_style  = 'child-style';

	wp_enqueue_style( $parent_style,
		get_template_directory_uri() . '/style.css'
	);

	wp_enqueue_style( $child_style,
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
	);
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles_child_theme' );

// Aqui se asignan las plantillas de templates a los CPT
function asignar_plantilla_cpt($template) {
    if ( is_singular('servicio') && file_exists(get_stylesheet_directory() . '/template-parts/single-servicio.php') ) {
        return get_stylesheet_directory() . '/template-parts/single-servicio.php';
    }
    return $template;
}
add_filter('template_include', 'asignar_plantilla_cpt');

// 🔹 Habilitar shortcodes en widgets y bloques HTML personalizados
add_filter('widget_text', 'do_shortcode');

/**
 * Inyecta el Schema de FAQ dinámicamente desde un grupo de campos de ACF.
 * Estructura de ACF esperada:
 * seccion_5 (grupo)
 * -> pregunta_1 (grupo) -> pregunta (texto), respuesta (texto/textarea)
 * -> pregunta_2 (grupo) -> pregunta (texto), respuesta (texto/textarea)
 * ... y así hasta pregunta_5
 */
add_action('wp_head', 'inyectar_schema_faq_desde_acf');

function inyectar_schema_faq_desde_acf() {
    if (is_singular('servicio')) {

        // Obtenemos el grupo principal 'seccion_5'
        $seccion_5 = get_field('seccion_5');

        // Si el grupo no existe o está vacío, no hacemos nada.
        if (empty($seccion_5)) {
            return;
        }

        $preguntas_para_schema = []; // Aquí guardaremos las preguntas válidas.

        // Iteramos del 1 al 5 para revisar cada subgrupo de pregunta.
        for ($i = 1; $i <= 5; $i++) {
            $nombre_grupo_pregunta = 'pregunta_' . $i;

            // Verificamos si el subgrupo existe y tiene contenido.
            if (isset($seccion_5[$nombre_grupo_pregunta])) {
                $grupo_pregunta = $seccion_5[$nombre_grupo_pregunta];

                // Extraemos la pregunta y la respuesta.
                $pregunta_texto = isset($grupo_pregunta['pregunta']) ? trim($grupo_pregunta['pregunta']) : '';
                $respuesta_texto = isset($grupo_pregunta['respuesta']) ? trim($grupo_pregunta['respuesta']) : '';

                // Solo añadimos la pregunta al schema si AMBOS campos tienen contenido.
                if (!empty($pregunta_texto) && !empty($respuesta_texto)) {
                    $preguntas_para_schema[] = [
                        '@type'          => 'Question',
                        'name'           => $pregunta_texto,
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text'  => $respuesta_texto,
                        ],
                    ];
                }
            }
        }

        // Solo si encontramos al menos una pregunta válida, imprimimos el script.
        if (!empty($preguntas_para_schema)) {
            $schema = [
                '@context'   => 'https://schema.org',
                '@type'      => 'FAQPage',
                'mainEntity' => $preguntas_para_schema,
            ];

            // Imprimimos el script JSON-LD en el <head> de la página.
            echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
        }
    }
}

/**
 * Inyecta el Schema de FAQ dinámicamente capturando y parseando el HTML completo
 * de las plantillas de página personalizadas.
 */
add_action('template_redirect', 'iniciar_buffer_para_schema_faq');

function iniciar_buffer_para_schema_faq() {
    $paginas_con_faq = ['ley-73-imss', 'ley-97-imss', 'ley-73-vs-97', 'semanas-cotizadas', 'requisitos', 'modalidad-40', 'trabajadores-independientes'];

    if (is_page($paginas_con_faq)) {
        ob_start('procesar_pagina_y_anadir_schema_faq');
    }
}

function procesar_pagina_y_anadir_schema_faq($buffer) {
    // Si el buffer está vacío, no hacemos nada.
    if (empty($buffer)) {
        return $buffer;
    }

    // Usamos DOMDocument para parsear el HTML completo de la página.
    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML('<?xml encoding="utf-8" ?>' . $buffer);
    libxml_clear_errors();

    $xpath = new DOMXPath($dom);
    $preguntas_para_schema = [];
    $schema_script = '';

    // Buscamos cada "item" del acordeón en todo el documento.
    $items_faq = $xpath->query("//div[contains(@class, 'accordion-item')]");

    if ($items_faq->length > 0) {
        foreach ($items_faq as $item) {
            $pregunta_node = $xpath->query(".//button[contains(@class, 'accordion-button')]", $item)->item(0);
            $pregunta_texto = $pregunta_node ? trim($pregunta_node->nodeValue) : '';

            $respuesta_node = $xpath->query(".//div[contains(@class, 'accordion-body')]", $item)->item(0);
            $respuesta_texto = $respuesta_node ? trim(strip_tags($respuesta_node->nodeValue)) : '';

            if (!empty($pregunta_texto) && !empty($respuesta_texto)) {
                $preguntas_para_schema[] = [
                    '@type'          => 'Question',
                    'name'           => $pregunta_texto,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => $respuesta_texto,
                    ],
                ];
            }
        }
    }

    // Si encontramos preguntas, construimos el script de schema.
    if (!empty($preguntas_para_schema)) {
        $schema = [
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => $preguntas_para_schema,
        ];
        $schema_script = '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
    }

    // Inyectamos el script justo antes de la etiqueta de cierre </body>
    return str_replace('</body>', $schema_script . '</body>', $buffer);
}

add_action('wp_enqueue_scripts', function () {

  if (is_page('simulador-pension-imss')) {
    wp_enqueue_script('simulador', get_stylesheet_directory_uri() . '/assets/simulador.js', [], null, true);
  }
  
  if (is_page('calculadora-modalidad-40')) {
    wp_enqueue_script('calculadora_modalidad_40', get_stylesheet_directory_uri() . '/assets/calculadora_modalidad_40.js', [], null, true);
  }


});

