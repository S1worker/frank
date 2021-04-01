<?php
defined( 'ABSPATH' ) || exit;
/**
 * @frank_footer_TagFooterOpen
*/
add_action( 'footer_parts', 'frank_footer_TagFooterOpen', 20 );
function frank_footer_TagFooterOpen() {
	?>
  	<!-- FOOTER -->
  	<footer class="footer">
	<?php
};
/**
 * @frank_footer_TagFooterInner
*/
add_action( 'footer_parts', 'frank_footer_TagFooterInner', 30 );
function frank_footer_TagFooterInner() {
	?>

    <!-- container -->
    <div class="container-fluid">

        <!-- row -->
        <div class="row">

            <!-- col -->
            <div class="col-xs-12 col-sm-4 col-md-2">

                <!-- Logo -->
                <div class="footer__logo">

                    <a href="<?= home_url() ?>">
                        <img
                                src="<?= get_theme_mod( 'logo' ) ?>"
                                alt="<?= get_bloginfo('name') ?>"
                                title="<?= get_bloginfo('name') ?>"
                        >
                    </a>

                </div>
                <!-- End Logo -->

            </div>
            <!-- end col -->

            <!-- col -->
            <div class="col-xs-12 col-sm-8 col-md-10">

                <!-- Contacts -->
                <div class="footer__contacts">

                    <?php if( have_rows( 'option_telephone', 'theme_settings' ) ) : ?>

                        <span><?= _e( 'For free estimates call', 'frank' ) ?></span>
                        <span><?= _e( 'Frank', 'frank' ) ?></span>

                        <!-- Phone Group -->
                        <div class="footer__contacts-phone">
                            <?php while ( have_rows( 'option_telephone', 'theme_settings' ) ) : the_row(); ?>
                                <a href="tel:<?= get_sub_field('tel') ?>"><?= get_sub_field('tel') ?></a>
                            <?php endwhile; ?>
                        </div>
                        <!-- End Phone Group -->

                    <?php endif; ?>

                    <?php if( !empty( get_field( 'sms_link', 'theme_settings' ) ) ) : ?>

                        <span><?= _e( 'or', 'frank' ) ?></span>

                        <!-- SMS -->
                        <a href="<?= get_field( 'sms_link', 'theme_settings' ) ?>" class="footer__contacts-sms">
                            <img src="<?= get_template_directory_uri() ?>/assets/images/ic_sms.svg" alt="">
                            <strong><?= _e( 'Text', 'frank' ) ?></strong>
                        </a>
                        <!-- End SMS -->

                    <?php endif; ?>

                </div>
                <!-- End Contacts -->

            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

    </div>
    <!-- end container -->

	<?php
};
/**
 * @frank_footer_TagFooterClose
*/
add_action( 'footer_parts', 'frank_footer_TagFooterClose', 100 );
function frank_footer_TagFooterClose() {
	?>
  	</footer>
  	<!-- END FOOTER -->
	<?php
};