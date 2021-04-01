<?php
defined( 'ABSPATH' ) || exit;
/**
 * @frank_header_TagHeaderOpen
*/
add_action( 'header_parts', 'frank_header_TagHeaderOpen', 10 );
function frank_header_TagHeaderOpen() {
	?>
  	<!-- HEADER -->
    <header class="header">
	<?php
};
/**
 * @frank_header_TagHeaderInner
*/
add_action( 'header_parts', 'frank_header_TagHeaderInner', 20 );
function frank_header_TagHeaderInner() {
	?>

    <!-- container -->
    <div class="container-fluid">

        <!-- row -->
        <div class="row">

            <!-- col -->
            <div class="col-xs-12">

                <!-- Row -->
                <div class="header__row">

                    <!-- Logo -->
                    <div class="header__logo">

                        <a href="<?= home_url() ?>">
                            <img
                                    src="<?= get_theme_mod( 'logo' ) ?>"
                                    alt="<?= get_bloginfo('name') ?>"
                                    title="<?= get_bloginfo('name') ?>"
                            >
                        </a>

                    </div>
                    <!-- End Logo -->

                    <!-- Contacts -->
                    <div class="header__contacts">

                        <?php if( have_rows( 'option_telephone', 'theme_settings' ) ) : ?>

                            <span><?= _e( 'For free estimates call', 'frank' ) ?></span>
                            <span><?= _e( 'Frank', 'frank' ) ?></span>

                            <!-- Phone Group -->
                            <div class="header__contacts-phone">
                                <?php while ( have_rows( 'option_telephone', 'theme_settings' ) ) : the_row(); ?>
                                    <a href="tel:<?= get_sub_field('tel') ?>"><?= get_sub_field('tel') ?></a>
                                <?php endwhile; ?>
                            </div>
                            <!-- End Phone Group -->

                        <?php endif; ?>

                        <?php if( !empty( get_field( 'sms_link', 'theme_settings' ) ) ) : ?>

                            <span><?= _e( 'or', 'frank' ) ?></span>

                            <!-- SMS -->
                            <a href="<?= get_field( 'sms_link', 'theme_settings' ) ?>" class="header__contacts-sms">
                                <img src="<?= get_template_directory_uri() ?>/assets/images/ic_sms.svg" alt="">
                                <strong><?= _e( 'Text', 'frank' ) ?></strong>
                            </a>
                            <!-- End SMS -->

                        <?php endif; ?>

                    </div>
                    <!-- End Contacts -->

                    <!-- Btn Menu -->
                    <button type="button" class="header__btnmenu">
                        <i></i>
                        <i></i>
                        <i></i>
                    </button>
                    <!-- End Btn Menu -->

                </div>
                <!-- End Row -->

            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

    </div>
    <!-- end container -->

	<?php
};
/**
 * @frank_header_TagHeaderClose
*/
add_action( 'header_parts', 'frank_header_TagHeaderClose', 30 );
function frank_header_TagHeaderClose() {
	?>
  	</header>
  	<!-- END HEADER -->
	<?php
};