<div class="contenu">
    <h2 class="contenu-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p class="contenu-meta"><?php the_date(); ?> par <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></p>
    <?php the_content(); ?>
</div>
