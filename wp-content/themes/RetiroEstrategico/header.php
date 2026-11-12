<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blocksy
 */

?><!doctype html>
<html <?php language_attributes(); ?><?php echo blocksy_html_attr() ?>>
<head>
    <?php do_action('blocksy:head:start') ?>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, viewport-fit=cover">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="<?php echo get_bloginfo("stylesheet_directory") ?>/assets/styles.css" as="style">
    <link rel="shortcut icon" href="<?php echo get_bloginfo("stylesheet_directory") ?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo get_bloginfo("stylesheet_directory") ?>/favicon.ico" type="image/x-icon">


    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
          integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"
            integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
            integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/localization/messages_es.min.js"
            integrity="sha512-Kcb2OYCSBj5/343s73G4ue17xTxHhWeLwfzE8gDQh9EAbWyEt8Jh6cNgGt86XgjS0JRzIlARtVPLa+o57+HQ2g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--AOS---->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- reCaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PDRL33XJ');</script>
    <!-- End Google Tag Manager -->

    <?php wp_head(); ?>
    <?php do_action('blocksy:head:end') ?>
</head>

<body <?php body_class(); ?> <?php echo blocksy_body_attr() ?>>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PDRL33XJ"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<?php
if (function_exists('wp_body_open')) {
    wp_body_open();
}
?>

<div id="main-container">
    <?php
    do_action('blocksy:header:before');

    ?>

    <header class="re-header" id="re-header">

        <div class="re-header__top">
            <div class="re-header__container re-header__top-inner">

                <nav class="re-header__secondary" aria-label="Menú secundario">
                    <a href="<?php echo esc_url(home_url('/nosotros/')); ?>">
                        Nosotros
                    </a>

                    <a href="<?php echo esc_url(home_url('/blog/')); ?>">
                        Blog
                    </a>

                    <a href="<?php echo esc_url(home_url('/contacto/')); ?>">
                        Contacto
                    </a>
                </nav>

                <div class="re-header__social">

                    <a
                            href="https://www.facebook.com/profile.php?id=61582439542307"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Facebook"
                    >
                        <img
                                src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/header/facebook.svg'); ?>"
                                alt=""
                                width="18"
                                height="18"
                        >
                    </a>

                    <a
                            href="https://www.linkedin.com/company/retiro-estrat%C3%A9gico/about/"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="LinkedIn"
                    >
                        <img
                                src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/header/linkedin.svg'); ?>"
                                alt=""
                                width="18"
                                height="18"
                        >
                    </a>

                    <a
                            href="https://www.youtube.com/@RetiroEstrategicoIMSS"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="YouTube"
                    >
                        <img
                                src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/header/youtube.svg'); ?>"
                                alt=""
                                width="22"
                                height="18"
                        >
                    </a>

                    <a
                            href="https://www.tiktok.com/@retiroestrategico"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="TikTok"
                    >
                        <img
                                src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/header/tiktok.svg'); ?>"
                                alt=""
                                width="18"
                                height="18"
                        >
                    </a>

                    <a
                            href="https://www.instagram.com/retiroestrategico/"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Instagram"
                    >
                        <img
                                src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/header/instagram.svg'); ?>"
                                alt=""
                                width="18"
                                height="18"
                        >
                    </a>

                    <a
                            href="https://x.com/RetiroEst"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="X"
                    >
                        <img
                                src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/header/x.svg'); ?>"
                                alt=""
                                width="18"
                                height="18"
                        >
                    </a>

                </div>

            </div>
        </div>

        <div class="re-header__container re-header__main">

            <a
                    class="re-header__logo"
                    href="<?php echo esc_url(home_url('/')); ?>"
                    aria-label="Retiro Estratégico · Inicio"
            >
                <img
                        class="re-header__logo-positive"
                        src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/header/logopositivo.svg'); ?>"
                        alt="Retiro Estratégico"
                        width="214"
                        height="82"
                >

                <img
                        class="re-header__logo-negative"
                        src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/header/logo_negativo.svg'); ?>"
                        alt=""
                        aria-hidden="true"
                        width="214"
                        height="82"
                >
            </a>

            <button
                    class="re-header__toggle"
                    type="button"
                    aria-label="Abrir menú"
                    aria-expanded="false"
                    aria-controls="re-header-navigation"
            >
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="re-header__navigation" id="re-header-navigation">

                <nav class="re-header__primary" aria-label="Menú principal">

                    <?php
                    $re_menu_filter = static function ($items, $args) {

                        if (($args->menu_id ?? '') !== 're-header-menu') {
                            return $items;
                        }

                        $secondary_urls = [
                            untrailingslashit(home_url('/nosotros/')),
                            untrailingslashit(home_url('/blog/')),
                            untrailingslashit(home_url('/contacto/')),
                        ];

                        $excluded_ids = [];

                        foreach ($items as $item) {
                            if (
                                !(int)$item->menu_item_parent &&
                                in_array(
                                    untrailingslashit($item->url),
                                    $secondary_urls,
                                    true
                                )
                            ) {
                                $excluded_ids[] = (int)$item->ID;
                            }
                        }

                        do {
                            $previous_count = count($excluded_ids);

                            foreach ($items as $item) {
                                if (
                                    in_array(
                                        (int)$item->menu_item_parent,
                                        $excluded_ids,
                                        true
                                    ) &&
                                    !in_array((int)$item->ID, $excluded_ids, true)
                                ) {
                                    $excluded_ids[] = (int)$item->ID;
                                }
                            }
                        } while (count($excluded_ids) > $previous_count);

                        return array_values(
                            array_filter(
                                $items,
                                static function ($item) use ($excluded_ids) {
                                    return !in_array(
                                        (int)$item->ID,
                                        $excluded_ids,
                                        true
                                    );
                                }
                            )
                        );
                    };

                    add_filter('wp_nav_menu_objects', $re_menu_filter, 10, 2);

                    wp_nav_menu([
                        'menu'        => 'header',
                        'container'   => false,
                        'menu_id'     => 're-header-menu',
                        'menu_class'  => 're-header__menu',
                        'fallback_cb' => false,
                        'depth'       => 0,
                    ]);

                    remove_filter('wp_nav_menu_objects', $re_menu_filter, 10);
                    ?>

                </nav>

                <a
                        class="re-header__whatsapp"
                        href="https://wa.link/ktfxw4"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Contactar por WhatsApp al 55 4142 0373"
                >
                    55 4142 0373
                </a>

            </div>

        </div>

    </header>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const header = document.getElementById('re-header');

            if (!header) return;

            const toggle = header.querySelector('.re-header__toggle');
            const navigation = header.querySelector('.re-header__navigation');
            const mainRow = header.querySelector('.re-header__main');
            const topRow = header.querySelector('.re-header__top');
            const logo = header.querySelector('.re-header__logo');
            const mobile = window.matchMedia('(max-width: 1200px)');
            const submenus = [];

            /*
             * Conserva el espacio del encabezado cuando pasa a posición fija.
             */
            const spacer = document.createElement('div');

            spacer.className = 're-header-spacer';
            spacer.setAttribute('aria-hidden', 'true');

            header.before(spacer);

            /*
             * Añade un botón independiente a cada enlace con submenú.
             */
            header.querySelectorAll('.re-header__menu li').forEach(function (item, index) {
                const children = Array.from(item.children);
                const submenu = children.find(function (child) {
                    return child.tagName === 'UL';
                });
                const link = children.find(function (child) {
                    return child.tagName === 'A';
                });

                if (!submenu || !link) return;

                submenu.id = 're-header-submenu-' + index;

                const button = document.createElement('button');
                const label = link.textContent.replace(/\s+/g, ' ').trim();

                button.type = 'button';
                button.className = 're-header__submenu-toggle';
                button.setAttribute('aria-controls', submenu.id);
                button.setAttribute('aria-expanded', 'false');
                button.setAttribute('aria-label', 'Abrir submenú: ' + label);

                function setExpanded(open) {
                    item.classList.toggle('is-submenu-open', open);

                    button.setAttribute('aria-expanded', String(open));
                    button.setAttribute(
                        'aria-label',
                        (open ? 'Cerrar' : 'Abrir') + ' submenú: ' + label
                    );
                }

                button.addEventListener('click', function () {
                    setExpanded(button.getAttribute('aria-expanded') !== 'true');
                });

                item.addEventListener('pointerenter', function (event) {
                    if (!mobile.matches && event.pointerType === 'mouse') {
                        setExpanded(true);
                    }
                });

                item.addEventListener('pointerleave', function (event) {
                    if (
                        !mobile.matches &&
                        event.pointerType === 'mouse' &&
                        !item.contains(document.activeElement)
                    ) {
                        setExpanded(false);
                    }
                });

                item.addEventListener('focusin', function (event) {
                    if (!mobile.matches && event.target === link) {
                        setExpanded(true);
                    }
                });

                item.addEventListener('focusout', function (event) {
                    if (!mobile.matches && !item.contains(event.relatedTarget)) {
                        setExpanded(false);
                    }
                });

                item.addEventListener('keydown', function (event) {
                    if (
                        event.key === 'Escape' &&
                        button.getAttribute('aria-expanded') === 'true'
                    ) {
                        event.stopPropagation();
                        setExpanded(false);
                        button.focus();
                    }
                });

                item.insertBefore(button, submenu);
                submenus.push(setExpanded);
            });

            function setMenuOpen(open) {
                header.classList.toggle('is-menu-open', open);

                toggle.setAttribute('aria-expanded', String(open));
                toggle.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');

                if (!open) {
                    submenus.forEach(function (setExpanded) {
                        setExpanded(false);
                    });
                }
            }

            toggle.addEventListener('click', function () {
                setMenuOpen(!header.classList.contains('is-menu-open'));
            });

            navigation.addEventListener('click', function (event) {
                if (mobile.matches && event.target.closest('a')) {
                    setMenuOpen(false);
                }
            });

            document.addEventListener('click', function (event) {
                if (!header.contains(event.target)) {
                    setMenuOpen(false);
                }
            });

            document.addEventListener('keydown', function (event) {
                if (
                    event.key === 'Escape' &&
                    header.classList.contains('is-menu-open')
                ) {
                    setMenuOpen(false);
                    toggle.focus();
                }
            });

            header.addEventListener('focusout', function (event) {
                if (mobile.matches && !header.contains(event.relatedTarget)) {
                    setMenuOpen(false);
                }
            });

            /*
             * Ajusta el desplazamiento por la barra de administración de WordPress.
             */
            function updateAdminOffset() {
                const adminBar = document.getElementById('wpadminbar');
                const offset = adminBar
                    ? Math.max(0, adminBar.getBoundingClientRect().bottom)
                    : 0;

                document.documentElement.style.setProperty(
                    '--re-admin-offset',
                    offset + 'px'
                );
            }

            function measureHeader() {
                let mainHeight = mainRow.getBoundingClientRect().height;

                /*
                 * En móvil medimos solo la fila del logo y el botón,
                 * sin incluir el panel desplegado.
                 */
                if (mobile.matches) {
                    const styles = getComputedStyle(mainRow);

                    mainHeight = Math.max(
                        parseFloat(styles.minHeight) || 0,
                        Math.max(
                            logo.getBoundingClientRect().height,
                            toggle.getBoundingClientRect().height
                        ) +
                        (parseFloat(styles.paddingTop) || 0) +
                        (parseFloat(styles.paddingBottom) || 0)
                    );
                }

                const height = Math.ceil(
                    topRow.getBoundingClientRect().height + mainHeight
                );

                document.documentElement.style.setProperty(
                    '--re-header-height',
                    height + 'px'
                );

                updateAdminOffset();
            }

            function updateScroll() {
                header.classList.toggle('is-scrolled', window.scrollY > 24);
                updateAdminOffset();
            }

            mobile.addEventListener('change', function () {
                setMenuOpen(false);
                measureHeader();
            });

            window.addEventListener('resize', measureHeader, { passive: true });
            window.addEventListener('scroll', updateScroll, { passive: true });

            if ('ResizeObserver' in window) {
                const observer = new ResizeObserver(measureHeader);

                observer.observe(topRow);
                observer.observe(logo);
            }

            header.classList.add('re-header--ready');

            measureHeader();
            updateScroll();

            if (document.fonts) {
                document.fonts.ready.then(measureHeader);
            }
        });
    </script>

    <?php

    do_action('blocksy:header:after');
    do_action('blocksy:content:before');
    ?>

    <main <?php echo blocksy_main_attr() ?>>

        <?php
        do_action('blocksy:content:top');
        blocksy_before_current_template();
        ?>
