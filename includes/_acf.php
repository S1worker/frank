<?php
defined( 'ABSPATH' ) || exit;

/**
 * Options page
 */
if (function_exists('acf_add_options_page')) {

    /**
     * Settings
     */
    acf_add_options_page(array(
        'page_title'    => __('Theme Settings', 'frank'),
        'menu_title'    => __('Theme Settings', 'frank'),
        'menu_slug'     => 'theme_settings',
        'capability'    => 'edit_posts',
        'position'      => '15.54',
        'post_id'       => 'theme_settings',
        'icon_url'      => 'dashicons-schedule',
        'redirect'      => false
    ));

}