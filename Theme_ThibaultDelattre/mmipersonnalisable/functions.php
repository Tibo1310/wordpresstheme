<?php

function mmipersonnalisable_setup() {
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'mmipersonnalisable_setup');

// Fonction pour enregistrer et charger les styles
function register_styles_mmipersonnalisable() {
    // Enregistrez le style.css du thème
    wp_enqueue_style('mmipersonnalisable-style', get_stylesheet_uri());

    // Enregistrez Bootstrap (exemple avec Bootstrap CDN)
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
}

// Ajouter la fonction à wp_enqueue_scripts
add_action('wp_enqueue_scripts', 'register_styles_mmipersonnalisable');

function register_menu() {
    register_nav_menus(array(
        'menu-principal' => 'Menu principal'
    ));
}
add_action('after_setup_theme', 'register_menu');

function mmistandard_widgets_init() { // crée la sidebar de base
    register_sidebar(array(
        'name' => 'Sidebar', // J'attribue un nom Sidebar pour le voir dans l'onglet Widgets de Wordpress
        'id' => 'sidebar-1', // J'attribue un id à sidebar-1 pour pouvoir le sélectionner dans le fichier sidebar.php
        'description' => 'Widget area for the sidebar', // Une courte description de la sidebar, visible dans le tableau de bord WordPress.
        'before_widget' => '<div id="%1$s" class="widget %2$s">', // code HTML qui va envelopper chaque widget ajouté à cette sidebar. %1$s et %2$s seront remplacés par l'ID et la classe du widget pour le stocker et l'assigner.
        'after_widget' => '</div>', // le before et after permettent aux widgets d'être ajoutés dynamiquement.
        'before_title' => '<h2 class="widget-title">', // code HTML qui va envelopper le titre de chaque widget
        'after_title' => '</h2>', // 
    ));
}
add_action('widgets_init', 'mmistandard_widgets_init');

function mmigenerique_widgets_init() { // crée la sidebar gauche
    register_sidebar(array(
        'name' => 'Sidebar Gauche', // J'attribue un nom Sidebar Gauche pour le voir dans l'onglet Widgets de Wordpress
        'id' => 'sidebar-gauche', // J'attribue un id à sidebar-gauche pour pouvoir le sélectionner dans le fichier sidebar-gauche.php
        'description' => 'Widget area for the left sidebar', 
        'before_widget' => '<div id="%1$s" class="widget %2$s">', 
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    )); 
}
add_action('widgets_init', 'mmigenerique_widgets_init');

/////////////////////////////////////////////////////////////////////////////////////////////////
// Rendre les éléments personnalisables depuis l'onglet personnalisation de Wordpress directement

function mmipersonnalisable_customize_register($wp_customize) {
    
    //////////////////////////
    // HEADER

    $wp_customize->add_section('header', array(
        'title' => __('Header', 'mmipersonnalisable'),
        'priority' => 31,
    ));

    // Ajout d'un paramètre pour l'image de fond de l'en-tête
    $wp_customize->add_setting('header_background_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Ajout d'un contrôle pour l'image de fond de l'en-tête
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'header_background_image',
        array(
            'label' => __('Image de fond pour l\'en-tête', 'mmipersonnalisable'),
            'section' => 'header',
            'settings' => 'header_background_image',
        )
    ));

    // Ajout d'un paramètre pour le logo
    $wp_customize->add_setting('header_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Ajout d'un contrôle pour le logo
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'header_logo',
        array(
            'label' => __('Logo du header', 'mmipersonnalisable'),
            'section' => 'header',
            'settings' => 'header_logo',
        )
    ));

    // alignement des éléments
    $wp_customize->add_setting('header_text_align', array(
        'default' => 'flex-end',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // alignement des éléments
    $wp_customize->add_control(
        'header_text_align',
        array(
            'type' => 'select',
            'label' => __('Alignement des éléments du header', 'mmipersonnalisable'),
            'section' => 'header',
            'choices' => array(
                'flex-start' => 'Gauche',
                'center' => 'Centre',
                'flex-end' => 'Droite',
            ),
        )
    );

    // changer la couleur du fond du header
    $wp_customize->add_setting('header_background_color', array(
        'default' => 'lightgray',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // changer la couleur du fond du header
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_background_color',
            array(
                'label' => __('Couleur de fond du header', 'mmipersonnalisable'),
                'section' => 'header',
                'settings' => 'header_background_color',
            )
        )
    );

    // Ajouter setting pour le padding des liens
    $wp_customize->add_setting('items_link_padding', array(
        'default' => '10px',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Ajouter control pour le padding des liens
    $wp_customize->add_control(
        'items_link_padding',
        array(
            'type' => 'text',
            'label' => __('Padding des liens', 'mmipersonnalisable'),
            'section' => 'header',
        )
    );

    // Ajouter setting pour la background-color des liens
    $wp_customize->add_setting('items_link_background_color', array(
        'default' => '#e3d5ca',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    // Ajouter control pour la background-color des liens
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'items_link_background_color',
            array(
                'label' => __('Couleur de fond des liens', 'mmipersonnalisable'),
                'section' => 'header',
                'settings' => 'items_link_background_color',
            )
        )
    );

    // Ajout d'un setting pour la couleur des liens
    $wp_customize->add_setting('items_link_text_color', array(
        'default' => '#333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Ajout d'un contrôle pour la couleur des liens
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'items_link_text_color',
            array(
                'label' => __('Couleur du texte des liens', 'mmipersonnalisable'),
                'section' => 'header',
                'settings' => 'items_link_text_color',
            )
        )
    );

    $wp_customize->add_setting('header_link_hover_bg_color', array(
        'default' => '#f5ebe0',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_link_hover_bg_color',
            array(
                'label' => __('Couleur de fond des liens dans le header (au survol)', 'mmipersonnalisable'),
                'section' => 'header',
                'settings' => 'header_link_hover_bg_color',
            )
        )
    );
    
    $wp_customize->add_setting('header_link_hover_text_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_link_hover_text_color',
            array(
                'label' => __('Couleur du texte des liens dans le header (au survol)', 'mmipersonnalisable'),
                'section' => 'header',
                'settings' => 'header_link_hover_text_color',
            )
        )
    );

    // TITRE DU SITE
    // Font-size
    $wp_customize->add_setting('site_title_font_size', array(
        'default' => '50px',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Text color
    $wp_customize->add_setting('site_title_text_color', array(
        'default' => '#333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Margin-left
    $wp_customize->add_setting('site_title_margin_left', array(
        'default' => '10px',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Text decoration
    $wp_customize->add_setting('site_title_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Font family
    $wp_customize->add_setting('site_title_font_family', array(
        'default' => 'Trebuchet MS',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_title_text_color',
            array(
                'label' => __('Couleur du titre du site', 'mmipersonnalisable'),
                'section' => 'header',
                'settings' => 'site_title_text_color',
            )
        )
    );
    
    // Pour la taille de la police (Font-Size)
    $wp_customize->add_control('site_title_font_size', array(
        'label' => __('Taille de la police du titre du site', 'mmipersonnalisable'),
        'section' => 'header',
        'settings' => 'site_title_font_size',
        'type' => 'text',
    ));

    // Pour la couleur du texte (Text Color)
    // Vous l'avez déjà fait, donc je le saute.

    // Pour la marge à gauche (Margin-Left)
    $wp_customize->add_control('site_title_margin_left', array(
        'label' => __('Marge à gauche du titre du site', 'mmipersonnalisable'),
        'section' => 'header',
        'settings' => 'site_title_margin_left',
        'type' => 'text',
    ));

    // Pour la décoration du texte (Text Decoration)
    $wp_customize->add_control('site_title_text_decoration', array(
        'label' => __('Décoration du texte du titre du site', 'mmipersonnalisable'),
        'section' => 'header',
        'settings' => 'site_title_text_decoration',
        'type' => 'select',
        'choices' => array(
            'none' => 'Aucun',
            'underline' => 'Souligné',
        ),
    ));

    // Pour la famille de polices (Font Family)
    $wp_customize->add_control('site_title_font_family', array(
        'label' => __('Famille de polices du titre du site', 'mmipersonnalisable'),
        'section' => 'header',
        'settings' => 'site_title_font_family',
        'type' => 'text',
    ));

    // Couleur du texte au survol
    $wp_customize->add_setting('site_title_hover_text_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Pour la couleur du texte au survol
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_title_hover_text_color',
            array(
                'label' => __('Couleur du texte au survol du titre', 'mmipersonnalisable'),
                'section' => 'header',
                'settings' => 'site_title_hover_text_color',
            )
        )
    );

    // Décoration du texte au survol
    $wp_customize->add_setting('site_title_hover_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Pour la décoration du texte au survol
    $wp_customize->add_control('site_title_hover_text_decoration', array(
        'label' => __('Décoration du texte au survol du titre', 'mmipersonnalisable'),
        'section' => 'header',
        'settings' => 'site_title_hover_text_decoration',
        'type' => 'select',
        'choices' => array(
            'none' => 'Aucun',
            'underline' => 'Souligné',
            'overline' => 'Overline',
            'line-through' => 'Barré',
        ),
    ));

    // Width for .logo
    $wp_customize->add_setting('logo_width', array(
        'default' => '100px',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Height for .logo
    $wp_customize->add_setting('logo_height', array(
        'default' => 'auto',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Contrôle pour la largeur du logo
    $wp_customize->add_control(
        'logo_width',
        array(
            'label' => __('Largeur du logo', 'mmipersonnalisable'),
            'section' => 'header',
            'settings' => 'logo_width',
            'type' => 'text',
        )
    );

    // Contrôle pour la hauteur du logo
    $wp_customize->add_control(
        'logo_height',
        array(
            'label' => __('Hauteur du logo', 'mmipersonnalisable'),
            'section' => 'header',
            'settings' => 'logo_height',
            'type' => 'text',
        )
    );


    //////////////////////////
    // MAIN

    $wp_customize->add_section('main_content', array(
        'title' => __('Contenu Principal', 'mmipersonnalisable'),
        'priority' => 32,
    ));

    
    // Ajout d'un paramètre pour l'image de fond du main-content
    $wp_customize->add_setting('main_content_background_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Ajout d'un contrôle pour l'image de fond du main-content
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'main_content_background_image',
        array(
            'label' => __('Image de fond pour le contenu principal', 'mmipersonnalisable'),
            'section' => 'main_content',
            'settings' => 'main_content_background_image',
        )
    ));

    $wp_customize->add_setting('main_content_bg_color', array(
        'default' => '#fff6ec',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'main_content_bg_color',
            array(
                'label' => __('Couleur de fond du contenu principal', 'mmipersonnalisable'),
                'section' => 'main_content',
                'settings' => 'main_content_bg_color',
            )
        )
    );
    
    // TITRE

    // Alignement du texte pour contenu-title et contenu-meta
    $wp_customize->add_setting('contenu_text_alignment', array(
        'default' => 'center',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Couleur du texte de contenu-title
    $wp_customize->add_setting('contenu_title_text_color', array(
        'default' => 'rgb(255, 0, 0)',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Couleur du texte au survol pour contenu-title
    $wp_customize->add_setting('contenu_title_hover_text_color', array(
        'default' => '#00ccff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Font-family pour contenu-title
    $wp_customize->add_setting('contenu_title_font_family', array(
        'default' => 'Arial',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Text decoration pour contenu-title
    $wp_customize->add_setting('contenu_title_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Contrôle pour l'alignement du texte de contenu-title et contenu-meta
    $wp_customize->add_control(
        'contenu_text_alignment',
        array(
            'type' => 'select',
            'label' => __('Alignement du texte pour contenu-title et contenu-meta', 'mmipersonnalisable'),
            'section' => 'main_content',
            'settings' => 'contenu_text_alignment',
            'choices' => array(
                'left' => 'Gauche',
                'center' => 'Centre',
                'right' => 'Droite',
            ),
        )
    );

    // Contrôle pour la couleur du texte de contenu-title
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'contenu_title_text_color',
            array(
                'label' => __('Couleur du texte de contenu-title', 'mmipersonnalisable'),
                'section' => 'main_content',
                'settings' => 'contenu_title_text_color',
            )
        )
    );

    // Contrôle pour la couleur du texte au survol pour contenu-title
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'contenu_title_hover_text_color',
            array(
                'label' => __('Couleur du texte au survol de contenu-title', 'mmipersonnalisable'),
                'section' => 'main_content',
                'settings' => 'contenu_title_hover_text_color',
            )
        )
    );

    // Contrôle pour la police de caractères pour contenu-title
    $wp_customize->add_control(
        'contenu_title_font_family',
        array(
            'type' => 'text',
            'label' => __('Police de caractères de contenu-title', 'mmipersonnalisable'),
            'section' => 'main_content',
            'settings' => 'contenu_title_font_family',
        )
    );

    // Contrôle pour le text-decoration de contenu-title
    $wp_customize->add_control(
        'contenu_title_text_decoration',
        array(
            'type' => 'select',
            'label' => __('Text Decoration de contenu-title', 'mmipersonnalisable'),
            'section' => 'main_content',
            'settings' => 'contenu_title_text_decoration',
            'choices' => array(
                'none' => 'None',
                'underline' => 'Underline',
                'overline' => 'Overline',
                'line-through' => 'Line Through',
            ),
        )
    );

    // sous-titre 

    // Text decoration
    $wp_customize->add_setting('contenu_meta_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Font family
    $wp_customize->add_setting('contenu_meta_font_family', array(
        'default' => 'Arial',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Text color
    $wp_customize->add_setting('contenu_meta_text_color', array(
        'default' => 'rgb(255, 0, 0)',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Contrôle pour la décoration du texte
    $wp_customize->add_control(
        'contenu_meta_text_decoration',
        array(
            'label' => __('Décoration du texte pour contenu-meta a', 'mmipersonnalisable'),
            'section' => 'main_content',
            'settings' => 'contenu_meta_text_decoration',
            'type' => 'select',
            'choices' => array(
                'none' => 'None',
                'underline' => 'Underline',
                'overline' => 'Overline',
                'line-through' => 'Line-through',
            ),
        )
    );

    // Contrôle pour la famille de police
    $wp_customize->add_control(
        'contenu_meta_font_family',
        array(
            'label' => __('Famille de police pour contenu-meta a', 'mmipersonnalisable'),
            'section' => 'main_content',
            'settings' => 'contenu_meta_font_family',
            'type' => 'text',
        )
    );

    // Contrôle pour la couleur du texte
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'contenu_meta_text_color',
            array(
                'label' => __('Couleur du texte pour contenu-meta a', 'mmipersonnalisable'),
                'section' => 'main_content',
                'settings' => 'contenu_meta_text_color',
            )
        )
    );


    //////////////////////////
    // FOOTER

    $wp_customize->add_section('footer', array(
        'title' => __('Footer', 'mmipersonnalisable'),
        'priority' => 33,
    ));

    // Ajout d'un paramètre pour l'image de fond du footer
    $wp_customize->add_setting('footer_background_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Ajout d'un contrôle pour l'image de fond du footer
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'footer_background_image',
        array(
            'label' => __('Image de fond pour le pied de page', 'mmipersonnalisable'),
            'section' => 'footer',
            'settings' => 'footer_background_image',
        )
    ));


        // Setting pour changer la couleur du fond du footer
    $wp_customize->add_setting('footer_background_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Control pour changer la couleur du fond du footer
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_background_color',
            array(
                'label' => __('Couleur de fond du footer', 'mmipersonnalisable'),
                'section' => 'footer',
                'settings' => 'footer_background_color',
            )
        )
    );

    // Setting pour changer la couleur du texte du footer
    $wp_customize->add_setting('footer_text_color', array(
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Control pour changer la couleur du texte du footer
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_text_color',
            array(
                'label' => __('Couleur du texte du footer', 'mmipersonnalisable'),
                'section' => 'footer',
                'settings' => 'footer_text_color',
            )
        )
    );

    // Setting pour l'alignement du texte du footer
    $wp_customize->add_setting('footer_text_align', array(
        'default' => 'center',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Control pour l'alignement du texte du footer
    $wp_customize->add_control(
        'footer_text_align',
        array(
            'type' => 'select',
            'label' => __('Alignement du texte du footer', 'mmipersonnalisable'),
            'section' => 'footer',
            'choices' => array(
                'left' => 'Gauche',
                'center' => 'Centre',
                'right' => 'Droite',
            ),
        )
    );

    //////////////////////////
    // SIDEBAR

    $wp_customize->add_section('sidebar', array(
        'title' => __('Sidebar', 'mmipersonnalisable'),
        'priority' => 34,
    ));

    // Ajout d'un paramètre pour la couleur de fond des widget-area
    $wp_customize->add_setting('widget-area_background_color', array(
        'default' => '#ffffff', // Couleur par défaut
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Ajout d'un contrôle pour la couleur de fond des widget-area
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'widget-area_background_color',
            array(
                'label' => __('Couleur de fond des widget-area', 'mmipersonnalisable'),
                'section' => 'sidebar',
                'settings' => 'widget-area_background_color',
            )
        )
    );

    // Latest Posts Hover Link Color
    $wp_customize->add_setting('latest_posts_hover_link_color', array(
        'default' => '#fbff00',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'latest_posts_hover_link_color',
            array(
                'label' => __('Couleur au survol des liens des derniers articles', 'mmipersonnalisable'),
                'section' => 'sidebar',
                'settings' => 'latest_posts_hover_link_color',
            )
        )
    );

    $wp_customize->add_setting('latest_posts_link_color', array(
        'default' => '#0026ff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'latest_posts_link_color',
            array(
                'label' => __('Couleur des liens des derniers articles', 'mmipersonnalisable'),
                'section' => 'sidebar',
                'settings' => 'latest_posts_link_color',
            )
        )
    );

    // Tag Cloud Link Color
    $wp_customize->add_setting('tag_cloud_link_color', array(
        'default' => 'black',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Tag Cloud Background Color
    $wp_customize->add_setting('tag_cloud_background_color', array(
        'default' => '#14658b',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tag_cloud_link_color',
            array(
                'label' => __('Couleur du texte du nuage de tags', 'mmipersonnalisable'),
                'section' => 'sidebar',
                'settings' => 'tag_cloud_link_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tag_cloud_background_color',
            array(
                'label' => __('Couleur de fond du nuage de tags', 'mmipersonnalisable'),
                'section' => 'sidebar',
                'settings' => 'tag_cloud_background_color',
            )
        )
    );

    // sidebar gauche

    // Ajout d'un paramètre pour la couleur de fond de la sidebar gauche
    $wp_customize->add_setting('sidebar_left_bg_color', array(
        'default' => '#ff00dd', // Couleur par défaut
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Ajout d'un contrôle pour la couleur de fond de la sidebar gauche
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sidebar_left_bg_color',
            array(
                'label' => __('Couleur de fond de la sidebar gauche', 'mmipersonnalisable'),
                'section' => 'sidebar',
                'settings' => 'sidebar_left_bg_color',
            )
        )
    );




    //////////////////////////
    // FONTS

    $wp_customize->add_section('fonts', array(
        'title' => __('Polices', 'mmipersonnalisable'),
        'priority' => 35,
    ));

    //////////////////////////
    // COULEURS

    // Section pour personnaliser les couleurs
    $wp_customize->add_section('colors', array(
        'title' => __('Couleurs', 'mmipersonnalisable'),
        'priority' => 36,
    ));

    // Setting pour changer la couleur du texte
    $wp_customize->add_setting('text_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    // Control pour changer la couleur du texte
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'text_color',
            array(
                'label' => __('Couleur du texte', 'mmipersonnalisable'),
                'section' => 'colors',
                'settings' => 'text_color',
            )
        )
    );
    
    }

add_action('customize_register', 'mmipersonnalisable_customize_register');

function mmipersonnalisable_customize_css() {
    ?>
    <style type="text/css">
        body { color: <?php echo get_theme_mod('text_color', '#000000'); ?>; }
        header { 
            background-image: url('<?php echo get_theme_mod('header_background_image', ''); ?>'); 
            justify-content: <?php echo get_theme_mod('header_text_align', 'flex-end'); ?>;
            background-color: <?php echo get_theme_mod('header_background_color', 'lightgray'); ?>;
        }
        .header-content .items a {
            background-color: <?php echo get_theme_mod('items_link_background_color', '#e3d5ca'); ?>;
            padding: <?php echo get_theme_mod('items_link_padding', '10px'); ?>;
            color: <?php echo get_theme_mod('items_link_text_color', '#333'); ?>;
        }
        .header-content .items a:hover {
            background-color: <?php echo get_theme_mod('header_link_hover_bg_color', '#f5ebe0'); ?>;
            color: <?php echo get_theme_mod('header_link_hover_text_color', '#fff'); ?>;
        }
        .site-title {
            font-size: <?php echo get_theme_mod('site_title_font_size', '50px'); ?>;
            color: <?php echo get_theme_mod('site_title_text_color', '#333'); ?>;
            margin-left: <?php echo get_theme_mod('site_title_margin_left', '10px'); ?>;
            text-decoration: <?php echo get_theme_mod('site_title_text_decoration', 'none'); ?>;
            font-family: <?php echo get_theme_mod('site_title_font_family', 'Trebuchet MS'); ?>;
        }
        .site-title:hover {
            color: <?php echo get_theme_mod('site_title_hover_text_color', '#ffffff'); ?>;
            text-decoration: <?php echo get_theme_mod('site_title_hover_text_decoration', 'none'); ?>;
        }
        .logo {
            width: <?php echo get_theme_mod('logo_width', '100px'); ?>;
            height: <?php echo get_theme_mod('logo_height', 'auto'); ?>;
        }
        .main-content { 
            background-image: url('<?php echo get_theme_mod('main_content_background_image', ''); ?>'); 
            background-color: <?php echo get_theme_mod('main_content_bg_color', '#fff6ec'); ?>;
        }
        .contenu-title, .contenu-meta {
            text-align: <?php echo get_theme_mod('contenu_text_alignment', 'center'); ?>;
        }
        .contenu-title a {
        text-decoration: <?php echo get_theme_mod('contenu_title_text_decoration', 'none'); ?>;
        font-family: <?php echo get_theme_mod('contenu_title_font_family', 'Arial'); ?>;
        color: <?php echo get_theme_mod('contenu_title_text_color', 'rgb(255, 0, 0)'); ?>;
        }
        .contenu-title a:hover {
            color: <?php echo get_theme_mod('contenu_title_hover_text_color', '#00ccff'); ?>;
        }
        .contenu-meta a {
            text-decoration: <?php echo get_theme_mod('contenu_meta_text_decoration', 'none'); ?>;
            font-family: <?php echo get_theme_mod('contenu_meta_font_family', 'Arial'); ?>;
            color: <?php echo get_theme_mod('contenu_meta_text_color', 'rgb(255, 0, 0)'); ?>;
        }
        footer { 
            background-image: url('<?php echo get_theme_mod('footer_background_image', ''); ?>'); 
        }
        footer {
            background-color: <?php echo get_theme_mod('footer_background_color', '000000'); ?>;
            color: <?php echo get_theme_mod('footer_text_color', 'ffffff'); ?>;
            text-align: <?php echo get_theme_mod('footer_text_align', 'center'); ?>;
        }
        .widget-area { 
            background-color: <?php echo get_theme_mod('widget-area_background_color', '#ffffff'); ?>; 
        }
        #sidebar-gauche {
            background-color: <?php echo get_theme_mod('sidebar_left_bg_color', '#ff00dd'); ?>;
            padding: 20px;
        }

        .wp-block-latest-posts__list li a:hover {
            color: <?php echo get_theme_mod('latest_posts_hover_link_color', '#fbff00'); ?>;
        }
        .wp-block-latest-posts__list li a {
            color: <?php echo get_theme_mod('latest_posts_link_color', '#0026ff'); ?>;
        }
        .wp-block-tag-cloud.is-style-outline a {
            color: <?php echo get_theme_mod('tag_cloud_link_color', 'black'); ?>;
            background-color: <?php echo get_theme_mod('tag_cloud_background_color', '#14658b'); ?>;
        }

    </style>
    <?php
}

add_action('wp_head', 'mmipersonnalisable_customize_css');
