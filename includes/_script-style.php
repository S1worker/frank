<?php
defined( 'ABSPATH' ) || exit;

/**
 * Register jQuery
 * @add_action
 * @wp_enqueue_scripts
 * @frank_jquery
 */
add_action( 'wp_enqueue_scripts', 'frank_jquery' );
function frank_jquery() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/src/jquery/jquery.js', false, '3.4.1', false );
	wp_enqueue_script( 'jquery' );
}
/**
 * CSS files
 * @add_action
 * @wp_enqueue_scripts
 * @frank_styles
 */
add_action( 'wp_enqueue_scripts', 'frank_styles' );
function frank_styles() {

	/**
	 * Dequeue Style
	 * @wp_dequeue_style
	 */
	wp_dequeue_style('font-awesome');

	/**
	 * Enqueue Style
	 * @wp_enqueue_style
	 */
    wp_enqueue_style( 'fonts-frank', 'https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap', [], null );
    wp_enqueue_style( 'bundle-frank', get_template_directory_uri() . '/assets/css/bundle.css', [], '1.0.0' );

}
/**
 * JS files
 * @add_action
 * @wp_enqueue_scripts
 * @frank_scripts
 */
add_action( 'wp_enqueue_scripts', 'frank_scripts' );
function frank_scripts() {

	/**
	 * Enqueue Script
	 * @wp_enqueue_script
	 */
    wp_enqueue_script( 'bundle-frank', get_template_directory_uri() . '/assets/js/bundle.js', ['jquery'], '1.0.0', true );

}

/**
 * Remove CSS
 * @wp_enqueue_scripts
 * @frank_dequeue_style
 * @wp_dequeue_style
 * @wp_dequeue_script
 */
add_action( 'wp_enqueue_scripts', 'frank_dequeue_style' );
function frank_dequeue_style() {

	wp_dequeue_style( 'wordfenceAJAXcss' );

    /**
     * WP Multilang
     */
    wp_dequeue_style( 'wpm-main' );
    /*
     * Otcher
     */
    wp_dequeue_style( 'jquery-selectBox' );
    wp_dequeue_style( 'mfcf7_zl_button_style' );
    /*
     * Contact Form
     */
    wp_dequeue_style( 'contact-form-7' );
	/*
	 * JS
	 */
    wp_deregister_script( 'wp-embed' );
    wp_dequeue_script( 'wp-embed-js' );
	wp_dequeue_script( 'wc_price_slider' );
	wp_dequeue_script( 'wc-chosen' );
	wp_dequeue_script( 'prettyPhoto' );
	wp_dequeue_script( 'prettyPhoto-init' );
	wp_dequeue_script( 'jquery-blockui' );
	wp_dequeue_script( 'jquery-placeholder' );
	wp_dequeue_script( 'fancybox' );
	wp_dequeue_script( 'jqueryui' );
	wp_dequeue_script( 'flexslider' );
	wp_dequeue_script( 'zoom' );
	wp_dequeue_script( 'photoswipe' );
    wp_dequeue_style( 'dashicons' );
    wp_dequeue_style( 'tawcvs-frontend' );
    wp_dequeue_style( 'dashicons' );
}