<?php
/**
 * Template Name: Home Page
 *
 * @package ncssm_sg
 */
$slidesArgs = array('post_type' => 'homepage-slides', 'showposts' => 10);
$slidesQuery = new WP_Query($slidesArgs);
get_header(); ?>
<script src="../js/jQuery-Plugin-To-Add-Cool-Animations-To-Your-Text-Text-Animator"></script>

<div class="slider">
    <?php while ($slidesQuery->have_posts()): $slidesQuery->the_post(); ?>
        <div class="slide">
            <img src="<?php the_field('slide_background') ?>"/>
            <span class="caption"><?php (the_field('slide_text'))?></span>
        </div>

    <?php endwhile; ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        slides = $("div.slide");
        slicedSlides = slides.slice(1, slides.length);
        var i;
        for (i = 0; i < slicedSlides.length; i++) {
            $(slicedSlides[i]).css("display", "none")
        }

        currentSlide = 0;

        window.setInterval(function () {
            $(slides[currentSlide]).slideUp(1000);
            if (currentSlide == slides.length - 1) {
                currentSlide = 0;
                $(slides[currentSlide]).slideDown(1000);
            }
            else {
                currentSlide++;
                $(slides[currentSlide]).slideDown(1000);
            }
        }, 7000);

    });
</script>


<main class="homepage">
    <section class="container branches">
        <h2>NCSSM Student Government Association</h2>

        <div class="branch">
            <a href="legislative.html"><i class="fa fa-legal fa-2x"></i></a>

            <h3>Legislative</h3>

            <p>The legislative branch holds the ultimate decision making authority of SG. Presided by Senate President
                Ren, the Senate creates legislation which directly affects the student body and school policy.</p>
        </div>
        <div class="branch">
            <a href="executive.html"><i class="fa fa-briefcase fa-2x"></i></a>

            <h3>Executive</h3>

            <p>Presided by Student Body President Kulgod, the executive branch of SG holds the power to implement
                Resolutions of the Senate, and represent SG to the administration, the state, and the student body.</p>
        </div>
        <div class="branch">
            <a href="treasury.html"><i class="fa fa-bank fa-2x"></i></a>

            <h3>Treasury</h3>

            <p>The Treasury of SG, managed by Vinay Kshirsagar, controls the distribution of all funds and expenses of
                SG.</p>
        </div>
    </section>


    <?php //get_sidebar(); ?>
    <?php get_footer(); ?>
