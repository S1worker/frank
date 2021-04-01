<?php
defined( 'ABSPATH' ) || exit;
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frank
 */
get_header();

while ( have_posts() ) : // Start of the loop.

    the_post();

    /*
     * Home: Intro
     */
    get_template_part('template-parts/pages/home/_home', 'intro');

    /*
     * Home: Gallery
     */
    get_template_part('template-parts/pages/home/_home', 'gallery');

    /*
     * Home: Gallery
     */
    get_template_part('template-parts/pages/home/_home', 'services');

    /*
     * Home: Reviews
     */
    get_template_part('template-parts/pages/home/_home', 'reviews');

    /*
     * Home: Blog
     */
    get_template_part('template-parts/pages/home/_home', 'blog');


endwhile; // End of the loop.

get_footer();
