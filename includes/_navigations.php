<?php
defined( 'ABSPATH' ) || exit;
/**
* Navigations
 * @register_nav_menus
*/

/**
 * Register our menu.
 * @register_nav_menus
 */
register_nav_menus( array(
	'header-menu'           => esc_html__( 'Header: Меню', 'frank' ),
));