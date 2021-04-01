<?php
defined( 'ABSPATH' ) || exit;

/**
 * Register Taxonomies
 * @add_action
 * @init
 * @frank_register_taxonomies
 */
add_action( 'init', 'frank_register_taxonomies' );
function frank_register_taxonomies() {

    /**
     * Gallery
     */
    $labels_gallery = [
        "name"                  => __( "Gallery", "frank" ),
        "singular_name"         => __( "Galleries", "frank" ),
        "menu_name"             => __( "Galleries", "frank" ),
        "all_items"             => __( "All Galleries", "frank" ),
        "edit_item"             => __( "Edit", "frank" ),
        "view_item"             => __( "View", "frank" ),
        "update_item"           => __( "Update", "frank" ),
        "add_new_item"          => __( "Add Image", "frank" ),
        "new_item_name"         => __( "New record", "frank" ),
        "parent_item"           => __( "Prev", "frank" ),
        "search_items"          => __( "Search", "frank" ),
        "popular_items"         => __( "Popular", "frank" ),
        "not_found"             => __( "Not Found", "frank" ),
        "no_terms"              => __( "No entries", "frank" ),
        "items_list"            => __( "List", "frank" ),
    ];

    $args = [
        "label"                 => __("Galleries", "frank"),
        "labels"                => $labels_gallery,
        "description"           => "",
        "public"                => true,
        "publicly_queryable"    => true,
        "show_ui"               => true,
        "show_in_rest"          => true,
        "rest_base"             => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive"           => true,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "delete_with_user"      => false,
        "exclude_from_search"   => false,
        "capability_type"       => "post",
        "map_meta_cap"          => true,
        "hierarchical"          => true,
        "rewrite"               => ["slug" => "gallery", "with_front" => true],
        "query_var"             => true,
        "menu_icon"             => "dashicons-clipboard",
        "supports"              => ["title", "thumbnail"],
    ];

    register_post_type("gallery", $args);

    /**
     * Reviews
     */
    $labels_reviews = [
        "name"                  => __( "Reviews", "frank" ),
        "singular_name"         => __( "Reviews", "frank" ),
        "menu_name"             => __( "Reviews", "frank" ),
        "all_items"             => __( "All Reviews", "frank" ),
        "edit_item"             => __( "Edit", "frank" ),
        "view_item"             => __( "View", "frank" ),
        "update_item"           => __( "Update", "frank" ),
        "add_new_item"          => __( "Add Image", "frank" ),
        "new_item_name"         => __( "New Review", "frank" ),
        "parent_item"           => __( "Prev", "frank" ),
        "search_items"          => __( "Search", "frank" ),
        "popular_items"         => __( "Popular", "frank" ),
        "not_found"             => __( "Not Found", "frank" ),
        "no_terms"              => __( "No entries", "frank" ),
        "items_list"            => __( "List", "frank" ),
    ];

    $args = [
        "label"                 => __("Reviews", "frank"),
        "labels"                => $labels_reviews,
        "description"           => "",
        "public"                => true,
        "publicly_queryable"    => true,
        "show_ui"               => true,
        "show_in_rest"          => true,
        "rest_base"             => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive"           => true,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "delete_with_user"      => false,
        "exclude_from_search"   => false,
        "capability_type"       => "post",
        "map_meta_cap"          => true,
        "hierarchical"          => true,
        "rewrite"               => ["slug" => "reviews", "with_front" => true],
        "query_var"             => true,
        "menu_icon"             => "dashicons-clipboard",
        "supports"              => ["title", "editor", "thumbnail"],
    ];

    register_post_type("reviews", $args);

}