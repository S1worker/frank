<?php 
/*
 * Home: Gallery
 */
defined( 'ABSPATH' ) || exit;

$id_home = get_option('page_on_front');
?>

<?php if( ! get_field( 'gallery_hide', $id_home ) ) : ?>

    <!-- section -->
    <section class="gallery">

        <!-- container -->
        <div class="container-fluid">

            <!-- row -->
            <div class="row">

                <!-- col -->
                <div class="col-xs-12">

                    <!-- Headpanel -->
                    <div class="gallery__headpanel">

                        <!-- Title -->
                        <h2 class="gallery__headpanel-title">
                            <?= get_field( 'gallery_title', $id_home ) ?>
                        </h2>
                        <!-- End Title -->

                        <a href="<?= home_url( 'gallery' ) ?>">
                            <span><?= _e( 'Gallery', 'frank' ) ?></span>
                        </a>

                    </div>
                    <!-- End Headpanel -->

                    <?php
                    $galleries = new WP_Query(
                        [
                            'posts_per_page'    => get_field( 'gallery_count', $id_home ),
                            'post_type'         => 'gallery',
                            'post_status'       => 'publish',
                        ]
                    );
                    if( $galleries->have_posts() ) :
                    ?>

                        <!-- Slider -->
                        <div class="gallery__slider">

                            <!-- container -->
                            <div class="swiper-container">

                                <!-- wrapper -->
                                <div class="swiper-wrapper">

                                    <?php while ( $galleries->have_posts() ) : $galleries->the_post(); ?>
                                    
                                        <!-- Slides -->
                                        <div class="swiper-slide">
                                            <a
                                                    href="<?= get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?>"
                                                    data-src="<?= get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?>"
                                                    data-fancybox="gallery"
                                            >
                                               <?= kama_thumb_img( 'w=230 &h=270' ) ?>
                                            </a>
                                        </div>
                                        <!-- End Slides -->
                                    
                                    <?php endwhile; wp_reset_postdata(); ?>

                                </div>
                                <!-- end wrapper -->

                            </div>
                            <!-- end container -->

                            <!-- buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                            <!-- end buttons -->

                        </div>
                        <!-- End Slider -->

                    <?php endif; ?>

                </div>
                <!-- end col -->

            </div>
            <!-- end row -->

        </div>
        <!-- end container -->

    </section>
    <!-- end section -->

<?php endif; ?>