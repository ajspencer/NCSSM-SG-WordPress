<?php
/*
* Template Name: Profile Page
*/

get_header(); ?>

<main>
    <div class="pageContainer">
        <div class="sg-image">
            <img src="<?php the_field('headshot');  ?>"/>
            <span class="caption">  <?php  the_field('name'); ?>, <?php the_field('title'); ?></span>
        </div>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'page'); ?>
        <?php endwhile; // end of the loop. ?>
    </div>
</main>


<?php //get_sidebar(); ?>
<?php get_footer(); ?>
