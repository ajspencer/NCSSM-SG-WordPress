<?php
/**
 * Template Name: Legislation Subpage
 *
 * @package ncssm_sg
 */
$slidesArgs = array('post_type' => 'legislation', 'showposts' => 20);
$slidesQuery = new WP_Query($slidesArgs);
get_header(); ?>
<!--
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php //while ( have_posts() ) : the_post(); ?>

				<?php //get_template_part( 'content', 'page' ); ?>

				<?php
// If comments are open or we have at least one comment, load up the comment template
//if ( comments_open() || get_comments_number() ) :
//	comments_template();
//endif;
?>

			<?php //endwhile; // end of the loop. ?>

		</main>
	</div>
-->

<div class="section-header">
</div>
<main>
    <div class="container">
        <?php while (have_posts()) : the_post();
            get_template_part('content', 'page');
        endwhile; // end of the loop. ?>

        <div class="legislation">
            <p>Filter the Bills:
                <button class="filter" data-filter="all">All</button>
                <button class="filter" data-filter=".budget">Budget and Finance</button>
                <button class="filter" data-filter=".government">Government</button>
                <button class="filter" data-filter=".confirmation">Confirmation</button>
                <button class="filter" data-filter=".resolutions">Resolutions</button>
            </p>

            <?php
            $legislation = get_field('legislation');

            for ($i = 0; $i < sizeof($legislation); $i++) {
                $name = $legislation[$i]['name'];
                $description = $legislation[$i]['legislation'];
                $tags = $legislation[$i]['tags'];
                ?>

                <div class="bill <?php foreach ($tags as $tag) {
                    echo($tag . ' ');
                } ?>">
                    <h2><?php echo $name; ?></h2>
                    <ul class="tags">
                        <?php foreach ($tags as $tag) { ?>
                            <li class="filter" data-filter=".<?php echo $tag; ?>"><?php echo $tag; ?></li><?php } ?>
                    </ul>
                    <p>
                        <?php echo $description; ?>
                    </p>
                </div>

            <?php } ?>
        </div>

    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js"></script>
<script>
    $(function () {
        $('.legislation').mixItUp({
            selectors: {
                target: '.bill'
            }
        });
    });
</script>


<?php //get_sidebar(); ?>
<?php get_footer(); ?>
