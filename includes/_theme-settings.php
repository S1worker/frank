<?php
defined( 'ABSPATH' ) || exit;
/**
* Theme Settings
*/
if ( ! function_exists( 'frank_setup' ) ) :

    function frank_setup() {

	    /**
	     * @add_theme_support
	     */
        add_theme_support( 'post-thumbnails' );

        /**
         * Remove Thumbnails
         */
        remove_image_size( 'thumbnail-100x100' );
        remove_image_size( 'thumbnail-150x150' );
        remove_image_size( 'thumbnail-300x300' );

        /**
         * REMOVE EMOJI ICONS
         */
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');

        /**
         * Enable shortcodes in text widgets
         */
        add_filter('widget_text','do_shortcode');

        /**
         * Enable Except Text All Page
         */
        add_post_type_support( 'page', array('excerpt') );

    }
    frank_setup();

endif;

/**
 * Loads the child theme textdomain.
 */
function frank_child_theme_setup() {
	load_child_theme_textdomain( 'frank', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'frank_child_theme_setup' );

/**
 * SVG Upload
 * @add_filter
 * @upload_mimes
 * @frank_myme_types
 */
add_filter('upload_mimes', 'frank_myme_types', 1, 1);
function frank_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; // поддержка SVG
    return $mime_types;
}
/**
 * ACF Google API KEY
 * @add_action
 * @acf/init
 * @frank_acf_init
 */
add_action('acf/init', 'frank_acf_init');
function frank_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyCSqQeiH6f0iSnHMZ0-WMAcZKkS3dKjEqQ');
}

/**
 * Template Directory
 * @archive_template
 * @add_filter
 * @frank_archive_template
 */
add_filter( 'archive_template', 'frank_archive_template' ) ;
function frank_archive_template( $template ) {
    $template = TEMPLATEPATH . '/template-parts/archive.php';
    return $template;
}

/**
 * Template Directory
 * @single_template
 * @add_filter
 * @frank_single_template
 */
add_filter('single_template', 'frank_single_template' );
function frank_single_template($template){
    $template = TEMPLATEPATH . '/template-parts/single.php';
    return $template;
}

/**
 * Template Directory
 * @404_template
 * @add_filter
 * @frank_single_template
 */
add_filter('404_template', 'frank_404_template' );
function frank_404_template($template){
	$template = TEMPLATEPATH . '/template-parts/404.php';
	return $template;
}

/**
 * Comments
 * disable
 * @comments_open
 */
add_filter('comments_open', function($open, $post_id) {
    return false;
}, 10, 2);


/**
 * ADMIN PANEL: Hide Menu
 * @add_action
 * @admin_menu
 * @frank_remove_admin_menu_links
 */
add_action('admin_menu', 'frank_remove_admin_menu_links', 999);
function frank_remove_admin_menu_links() {

    global $menu, $submenu;

    $menu[5][0] = __( 'Blog', 'frank' );

    $submenu['edit.php'][5][0] = __( 'All posts', 'frank' );
    $submenu['edit.php'][10][0] = __( 'Add New Post', 'frank' );
    /**
     *
     */
    remove_menu_page('edit-comments.php');

    $user = wp_get_current_user();

    if ( 'remstroy-od@yandex.ru' <> $user->user_email ) {
        remove_menu_page('edit.php?post_type=acf-options-page');
        remove_menu_page('edit.php?post_type=acf-field-group');
        remove_menu_page('wc-admin&path=/analytics/revenue');
        remove_menu_page('wpcf7');
        remove_menu_page('options-general.php');
        remove_menu_page('edit-comments.php');
        remove_menu_page('plugins.php');
        remove_menu_page('wpfront-user-role-editor-all-roles');
        remove_submenu_page('users.php', 'wpfront-user-role-editor-assign-roles');
        remove_submenu_page('edit.php?post_type=product', 'wt-woocommerce-related-products');
    }
}

/**
 * Disable Auto Update Plugins
 * @is_admin
 */
if( is_admin() ){

    remove_action( 'admin_init', '_maybe_update_core' );
    remove_action( 'admin_init', '_maybe_update_plugins' );
    remove_action( 'admin_init', '_maybe_update_themes' );
    remove_action( 'load-plugins.php', 'wp_update_plugins' );
    remove_action( 'load-themes.php', 'wp_update_themes' );
    add_filter( 'pre_site_transient_browser_'. md5( $_SERVER['HTTP_USER_AGENT'] ), '__return_true' );
}


/**
 * Filter to change breadcrumb args.
 *
 * @param  array $args Breadcrumb args.
 * @return array $args.
 */
add_filter( 'rank_math/frontend/breadcrumb/args', function( $args ) {

    $args = array(
        'delimiter'   => '',
        'wrap_before' => '<ul class="breadcrumbs__list">',
        'wrap_after'  => '',
        'before'      => '',
        'after'       => ''
    );
    return $args;
});
/**
 * Filter to change breadcrumb html.
 *
 * @param  html  $html Breadcrumb html.
 * @param  array $crumbs Breadcrumb items
 * @param  class $class Breadcrumb class
 * @return html  $html.
 */
add_filter( 'rank_math/frontend/breadcrumb/html', function( $html, $crumbs, $class ) {
    $html = str_replace('<span class="separator"> - </span>', ' > ', $html);
    return $html;
}, 10, 3);

/**
 * Add Table Column Image
 * @manage_{$post_type}_posts_columns
 * @add_filter
 * @manage_gallery_posts_columns
 * @frank_gallery_custom_column_header
 */
add_filter( "manage_gallery_posts_columns", 'frank_gallery_custom_column_header');
function frank_gallery_custom_column_header( $columns ){
    $columns['image'] = __( 'Image', 'frank' );
    return $columns;
}

/**
 * Add Table Column Image
 * @manage_{$post_type}_posts_custom_column
 * @add_action
 * @manage_gallery_posts_custom_column
 * @frank_gallery_custom_column_content
 */
add_action( "manage_gallery_posts_custom_column", 'frank_gallery_custom_column_content', 10, 2);
function frank_gallery_custom_column_content( $column, $post_id ){

    switch ( $column ) :
        case 'image' :
            echo get_the_post_thumbnail( $post_id, [60, 60] );
            break;
    endswitch;
}

