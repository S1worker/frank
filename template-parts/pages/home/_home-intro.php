<?php 
/*
 * Home: Intro
 */
defined( 'ABSPATH' ) || exit;

$id_home = get_option('page_on_front');
?>

<?php if( ! get_field( 'intro_hide', $id_home ) ) : ?>

    <!-- section -->
    <section class="intro">

        <!-- container -->
        <div class="container-fluid">

            <!-- row -->
            <div class="row">

                <!-- col -->
                <div class="col-xs-12">

                    <!-- Row -->
                    <div class="intro__row">

                        <!-- Text -->
                        <div class="intro__text">

                            <?= get_field( 'intro_text', $id_home ) ?>

                        </div>
                        <!-- End Text -->

                        <?php if( have_rows( 'intro_slider', $id_home ) ) : ?>

                            <!-- Slider -->
                            <div class="intro__slider">

                                <!-- container -->
                                <div class="swiper-container">

                                    <!-- wrapper -->
                                    <div class="swiper-wrapper">

                                        <?php while ( have_rows( 'intro_slider', $id_home ) ) : the_row(); ?>
                                            <!-- Slides -->
                                            <div class="swiper-slide">
                                                <img src="<?= get_sub_field('image') ?>" alt="" title="">
                                            </div>
                                            <!-- End Slides -->
                                        <?php endwhile; ?>

                                    </div>
                                    <!-- end wrapper -->

                                    <!-- pagination -->
                                    <div class="swiper-pagination"></div>
                                    <!-- end pagination -->

                                </div>
                                <!-- end container -->

                            </div>
                            <!-- End Slider -->

                        <?php endif; ?>

                    </div>
                    <!-- End Row -->

                </div>
                <!-- end col -->

            </div>
            <!-- end row -->

        </div>
        <!-- end container -->

    </section>
    <!-- end section -->

<?php endif; ?>