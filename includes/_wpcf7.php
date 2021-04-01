<?php
defined( 'ABSPATH' ) || exit;

/**
 * Contact Form 7
 * After Hook
 * @wpcf7_mail_sent
 * @frank_handle_form_submission
 */
add_action( 'wpcf7_mail_sent', 'frank_handle_form_submission' );

function frank_handle_form_submission( $contact_form ) {

    $submission = WPCF7_Submission::get_instance();

    if ( $submission ) :

        $data = $submission->get_posted_data();

        $post_data = [
            'post_type'     => 'reviews',
            'post_title'    => $data['your-name'],
            'post_content'  => $data['your-review'],
            'post_status'   => 'draft',
            'post_author'   => 1,
        ];

        $post_id = wp_insert_post( $post_data );

        /**
         * Add Files
         */
        $files = $submission->uploaded_files();

        if( $files ) :

            $filename = $files['your-file'][0];

            $wp_upload_dir = wp_upload_dir();
            copy($filename, $wp_upload_dir['path'] . '/' . basename( $filename ));
            $filename = $wp_upload_dir['path'] . '/' . basename( $filename );
            $filetype = wp_check_filetype( basename( $filename ), null );
            $attachment = [
                'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ),
                'post_mime_type' => $filetype['type'],
                'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                'post_content'   => '',
                'post_status'    => 'inherit'
            ];

            $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
            set_post_thumbnail($post_id, $attach_id);
            require_once( ABSPATH . 'wp-admin/includes/image.php' );

            $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
            wp_update_attachment_metadata( $attach_id, $attach_data );

        endif;

    endif;
}