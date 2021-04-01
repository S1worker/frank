<?php 
/*
 * Home: Reviews
 */
defined( 'ABSPATH' ) || exit;

$id_home = get_option('page_on_front');
?>

<?php if( ! get_field( 'reviews_hide', $id_home ) ) : ?>

    <!-- section -->
    <section class="reviews">

        <!-- container -->
        <div class="container-fluid">

            <!-- row -->
            <div class="row">

                <!-- col -->
                <div class="col-xs-12">

                    <!-- Headpanel -->
                    <div class="reviews__headpanel">

                        <!-- Title -->
                        <h2 class="reviews__headpanel-title">
                            <?= get_field( 'reviews_title', $id_home ) ?>
                        </h2>
                        <!-- End Title -->

                        <a href="<?= home_url( 'reviews' ) ?>">
                            <span><?= _e( 'All Reviews', 'frank' ) ?></span>
                        </a>

                    </div>
                    <!-- End Headpanel -->

                    <?php
                    $reviews = new WP_Query(
                        [
                            'posts_per_page'    => 3,
                            'post_type'         => 'reviews',
                            'post_status'       => 'publish',
                        ]
                    );
                    if( $reviews->have_posts() ) :
                    ?>

                        <!-- Slider -->
                        <ul class="reviews__list row">

                            <?php while ( $reviews->have_posts() ) : $reviews->the_post(); ?>
                                <li>
                                    <!-- Item -->
                                    <div class="reviews__list-item">

                                        <!-- Title -->
                                        <strong class="reviews__list-item--title">
                                            <?= get_the_title() ?>
                                        </strong>
                                        <!-- End Title -->

                                        <!-- Date -->
                                        <span class="reviews__list-item--date">
                                            <?= get_the_date('d.m.Y') ?>
                                        </span>
                                        <!-- End Date -->

                                        <!-- Text -->
                                        <div class="reviews__list-item--text">
                                            <p><?= get_the_content() ?></p>
                                        </div>
                                        <!-- End Text -->

                                        <?php if( has_post_thumbnail() ) : ?>
                                            <!-- Image -->
                                            <div class="reviews__list-item--image">
                                                <a
                                                        href="<?= get_the_post_thumbnail_url(get_the_ID(), 'full') ?>"
                                                        data-src="<?= get_the_post_thumbnail_url(get_the_ID(), 'full') ?>"
                                                        data-fancybox
                                                >
                                                    <?= kama_thumb_img( 'w=65 &h=65' ) ?>
                                                </a>
                                            </div>
                                            <!-- End Image -->
                                        <?php endif; ?>

                                    </div>
                                    <!-- End Item -->
                                </li>
                            <?php endwhile; wp_reset_postdata(); ?>

                        </ul>
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