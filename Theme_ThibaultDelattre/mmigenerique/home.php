<?php
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="blog-posts">
            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>
            <div class="page-content">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="entry-meta">
                                    <span class="posted-on"><?php the_date(); ?></span>
                                    <span class="byline">par <?php the_author(); ?></span>
                                </div>
                            </header>
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Aucun article trouvé.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>
</div>

<?php
get_footer();
?>
