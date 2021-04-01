<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frank
 */

if(is_page('blog')) :
    /*
     * Page: Blog
     */
    get_template_part( 'template-parts/pages/_page', 'blog' );
elseif(is_page('contacts')) :
    /*
     * Page: Contacts
     */
    get_template_part( 'template-parts/pages/_page', 'contacts' );

else:
    /*
     * Page: Text
     */
    get_template_part( 'template-parts/pages/_page', 'text' );
endif;
?>
