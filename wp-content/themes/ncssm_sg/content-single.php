<?php
/**
 * @package ncssm_sg
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

        <div class="entry-meta">
            <?php ncssm_sg_posted_on(); ?>
        </div>
        <!-- .entry-meta -->
    </header>
    <!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'ncssm_sg'), 'after' => '</div>',));
        ?>
    </div>
    <!-- .entry-content -->

    <footer class="entry-footer">
        <?php ncssm_sg_entry_footer(); ?>
    </footer>
    <!-- .entry-footer -->
</article><!-- #post-## -->
