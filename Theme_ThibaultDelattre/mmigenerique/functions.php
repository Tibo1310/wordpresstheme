<?php
function mmibasique_setup() {
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'mmibasique_setup');

// Fonction pour enregistrer et charger les styles
function register_styles_mmibasique() {
    // Enregistrez le style.css du thème
    wp_enqueue_style('mmibasique-style', get_stylesheet_uri());

    // Enregistrez Bootstrap (exemple avec Bootstrap CDN)
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
}

// Ajouter la fonction à wp_enqueue_scripts
add_action('wp_enqueue_scripts', 'register_styles_mmibasique');

function register_menu() {
    register_nav_menus(array(
        'menu-principal' => 'Menu principal'
    ));
}
add_action('after_setup_theme', 'register_menu');

function mmistandard_widgets_init() {
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar-1',
        'description' => 'Widget area for the sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'mmistandard_widgets_init');

function mmigenerique_widgets_init() {
    register_sidebar(array(
        'name' => 'Sidebar Gauche',
        'id' => 'sidebar-gauche',
        'description' => 'Widget area for the left sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'mmigenerique_widgets_init');

