<?php
/**
 * ncssm_sg functions and definitions
 *
 * @package ncssm_sg
 */

/**
 * Add the executive branch options
 */

add_action('admin_menu', 'add_executive_branch_options');
function add_executive_branch_options() {
    add_options_page('Executive Branch Options', 'Executive Branch Options', 'manage_options', 'exec-functions', 'exec_options');
}

?>

<?php
function exec_options() {
    ?>
    <div class="wrap">
        <h2>Executive Branch Options</h2>

        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>
            <p><strong>URL of Executive Image:</strong><br/>
                <input type="text" name="execimage" value="<?php echo get_option('execimage'); ?>"/>
            </p>

            <p><strong>Exec Caption:</strong><br/>
                <input type="text" name="execcaption" value="<?php echo get_option('execcaption'); ?>"/>
            </p>

            <p><input type="submit" name="Submit" value="Store Options"/></p>
            <input type="hidden" name="action" value="update"/>
            <input type="hidden" name="page_options" value="execimage"/>
            <input type="hidden" name="page_options" value="execcaption"/>
        </form>
    </div>
    <?php
}

?>

<?php
/**
 * Add a global theme options page
 */

add_action('admin_menu', 'add_legislative_branch_options');
function add_legislative_branch_options() {
    add_options_page('Legislative Branch Options', 'Legislative Branch Options', 'manage_options', 'legis-functions', 'legislative_options');
}

?>

<?php
function legislative_options() {
    ?>
    <div class="wrap">
        <h2>Legislative Branch Options</h2>

        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>
            <p><strong>URL of Legislative Image:</strong><br/>
                <input type="text" name="legisimage" value="<?php echo get_option('legisimage'); ?>"/>
            </p>

            <p><strong>Legislative Caption:</strong><br/>
                <input type="text" name="legiscaption" value="<?php echo get_option('legiscaption'); ?>"/>
            </p>

            <p><input type="submit" name="Submit" value="Store Options"/></p>
            <input type="hidden" name="action" value="update"/>
            <input type="hidden" name="page_options" value="legisimage"/>
            <input type="hidden" name="page_options" value="legiscaption"/>
        </form>
    </div>
    <?php
}

?>

<?php

/**
 * Set the content width based on the theme's design and stylesheet.
 */


if (!isset($content_width)) {
    $content_width = 640; /* pixels */
}

if (!function_exists('ncssm_sg_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function ncssm_sg_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on ncssm_sg, use a find and replace
         * to change 'ncssm_sg' to the name of your theme in all the template files
         */
        load_theme_textdomain('ncssm_sg', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        //add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array('primary' => __('Primary Menu', 'ncssm_sg'),));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption',));

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link',));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('ncssm_sg_custom_background_args', array('default-color' => 'ffffff', 'default-image' => '',)));
    }
endif; // ncssm_sg_setup
add_action('after_setup_theme', 'ncssm_sg_setup');

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ncssm_sg_widgets_init() {
    register_sidebar(array('name' => __('Sidebar', 'ncssm_sg'), 'id' => 'sidebar-1', 'description' => '', 'before_widget' => '<aside id="%1$s" class="widget %2$s">', 'after_widget' => '</aside>', 'before_title' => '<h1 class="widget-title">', 'after_title' => '</h1>',));
}

add_action('widgets_init', 'ncssm_sg_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ncssm_sg_scripts() {
    wp_enqueue_style('ncssm_sg-style', get_stylesheet_uri());

    wp_enqueue_script('ncssm_sg-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);

    wp_enqueue_script('ncssm_sg-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'ncssm_sg_scripts');

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
