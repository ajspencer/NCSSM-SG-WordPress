<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package ncssm_sg
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function ncssm_sg_jetpack_setup() {
    add_theme_support('infinite-scroll', array('container' => 'main', 'footer' => 'page',));
}

add_action('after_setup_theme', 'ncssm_sg_jetpack_setup');
