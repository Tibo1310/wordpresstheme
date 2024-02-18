<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
    <style>
        header {
            background-color: #DAC0A3;
            height: 100px;
            border-bottom: 1px solid black;
        }
        /* Style du titre du site */
        .site-title {
            font-size: 50px; /* Ajustez la taille de la police du titre */
            color: #333; /* Couleur du texte du titre */
            margin-left: 10px; /* Espacement entre le logo et le titre */
            text-decoration: none; /* Supprimer les soulignements du lien */
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .site-title:hover {
            color: white;
            text-decoration: none;
        }

        .topheader {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        /* Header */
        header {
            height: 25%;
            width: 100%;
            background-color: #DAC0A3;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .header-items {
            height: 30%;
            width: 50%;
            margin-bottom: 0;
            background-color: #ffdc00; /* Jaune */
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
            list-style: none;
            padding: 0;
        }

        /* Ajoutez ceci à votre fichier style.css */
        .header-content {
            display: flex;
            flex-direction: column;
            align-items: center; /* Centrez horizontalement les éléments */
        }

        /* Styles pour les liens sous le logo */
        header a {
            color: #333; /* Couleur du texte des liens */
            text-decoration: none; /* Supprimer les soulignements */
            font-weight: bold; /* Gras */
        }

        header a:hover {
            color: #ff6600; /* Couleur au survol */
            text-decoration: none; /* Supprimer les soulignements */
        }

        .header-items li {
            background-color: #e3d5ca; /* Jaune */
            padding: 5px 10px;
            border-radius: 5px;
        }

        /* Personnalisation des liens dans la div "items" */
        .header-content .items a {
            display: block; /* Les liens deviennent des blocs pour occuper toute la largeur */
            background-color: #e3d5ca; /* Couleur de fond */
            padding: 10px; /* Espace intérieur pour le texte */
            text-align: center; /* Centrez le texte horizontalement */
            transition: background-color 0.3s; /* Animation de changement de couleur au survol */
            color: #333; /* Couleur du texte */
            text-decoration: none; /* Supprimer les soulignements */
        }

        .header-content .items a:hover {
            background-color: #f5ebe0; /* Couleur de fond au survol */
            color: #fff; /* Couleur du texte au survol */
        }

        .items {
            display: flex;
            flex-direction: row;
        }

        /* Style du logo */
        img {
            width: 100px;
            height: auto;
        }

    </style>
</head>
<body>
    <header>
    <div class="header-content">
            <a class="topheader" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/basique.png" alt="Logo de votre site">
                <span class="site-title"><?php bloginfo('name'); ?></span>
            </a>


        <div class="items"> <!-- Ajoutez une classe "items" ici -->
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
