<?php
defined( 'ABSPATH' ) || exit;

/**
 * Shortcodes: Theme Path
 * @return
 */
add_shortcode('path', 'frank_shortcodes_path');
function frank_shortcodes_path( $arr ){
    return get_template_directory_uri();
}
