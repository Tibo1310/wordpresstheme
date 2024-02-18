<?php get_header(); ?>

<div class="main-content">
    <div class="container">
        <?php if (is_page(89)): ?>
            <div class="row">
                <div class="col-md-6">
                    <?php get_sidebar('gauche'); ?>
                </div>
                <div class="col-md-6">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <?php if (is_page(91)): ?>
                <div class="col-md-8">
            <?php elseif (!is_page(array(3, 93))): ?>
                <div class="col-md-4">
                    <?php get_sidebar('gauche'); ?>
                </div>
                <div class="col-md-8">
            <?php else: ?>
                <div class="col-md-12">
            <?php endif; ?>
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('content', 'page'); ?>
                        <?php endwhile; ?>
                    </main>
                </div>
            </div>
            <?php if (is_page(91)): ?>
                <div class="col-md-4">
                    <?php get_sidebar('gauche'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if (is_page(93)): ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php get_sidebar('gauche'); ?>
            </div>
            <div class="col-md-6">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>
