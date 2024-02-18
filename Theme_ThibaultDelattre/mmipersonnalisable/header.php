<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>
<body>
    <header>
    <div class="header-content">
            <a class="topheader" href="<?php echo esc_url(home_url('/')); ?>">
            <?php $header_logo = get_theme_mod('header_logo', ''); ?>
            <img class="logo" src="<?php echo $header_logo ? $header_logo : get_template_directory_uri() . '/basique.png'; ?>" alt="Logo de votre site">

                <span class="site-title"><?php bloginfo('name'); ?></span>
            </a>


        <div class="items">
            <a href="<?php echo esc_url(home_url('')); ?>">Accueil</a>
            <a href="<?php echo esc_url(home_url('/?page_id=86')); ?>">Actualités</a>
            <a href="<?php echo esc_url(home_url('/?page_id=89')); ?>">Equipe</a>
            <a href="<?php echo esc_url(home_url('/?page_id=91')); ?>">Rencontres</a>
            <a href="<?php echo esc_url(home_url('/?page_id=93')); ?>">Contact</a>
            <a href="<?php echo esc_url(home_url('/?page_id=3')); ?>">Mentions légales</a>
        </div>
    </div>

    </header>
</body>
</html>
