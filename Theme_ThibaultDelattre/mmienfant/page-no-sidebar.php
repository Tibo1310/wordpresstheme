<?php get_header(); ?>

<div class="main-content">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'page'); ?>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>