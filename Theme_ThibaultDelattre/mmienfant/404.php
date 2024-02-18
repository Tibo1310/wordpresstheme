<?php
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title">Erreur 404 - Page non trouvée</h1>
            </header>
            <div class="page-content">
                <p>Désolé, la page que vous recherchez n'a pas pu être trouvée. Veuillez retourner à <a href="<?php echo esc_url(home_url('/')); ?>">la page d'accueil</a>.</p>
            </div>
        </section>
    </main>
</div>

<?php
get_footer();
