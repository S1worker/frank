<?php 
/*
 * Home: Blog
 */
defined( 'ABSPATH' ) || exit;

$id_home = get_option('page_on_front');
?>

<?php if( ! get_field( 'blog_hide', $id_home ) ) : ?>

    <!-- section -->
    <section class="blogs">

        <!-- container -->
        <div class="container-fluid">

            <!-- row -->
            <div class="row">

                <!-- col -->
                <div class="col-xs-12">

                    <!-- Headpanel -->
                    <div class="blogs__headpanel">

                        <!-- Title -->
                        <h2 class="blogs__headpanel-title">
                            <?= get_field( 'blog_title', $id_home ) ?>
                        </h2>
                        <!-- End Title -->

                        <a href="<?= home_url( 'blog' ) ?>">
                            <span><?= _e( 'All Articles', 'frank' ) ?></span>
                        </a>

                    </div>
                    <!-- End Headpanel -->

                    <?php
                    $blogs = new WP_Query(
                        [
                            'posts_per_page'    => 3,
                            'post_type'         => 'post',
                            'post_status'       => 'publish',
                        ]
                    );
                    if( $blogs->have_posts() ) :
                    ?>

                        <!-- Slider -->
                        <ul class="blogs__list row">

                            <?php while ( $blogs->have_posts() ) : $blogs->the_post(); ?>
                                <li>
                                    <!-- Item -->
                                    <a href="<?= get_the_permalink() ?>" class="blogs__list-item">

                                        <!-- Image -->
                                        <div class="blogs__list-item--image">
                                            <?= kama_thumb_img( 'w=360 &h=270' ) ?>
                                        </div>
                                        <!-- End Image -->

                                        <!-- Title -->
                                        <span class="blogs__list-item--title">
                                            <span><?= get_the_title() ?></span>
                                        </span>
                                        <!-- End Title -->

                                        <!-- Footer -->
                                        <div class="blogs__list-item--footer">
                                            <?php
                                            $cat = get_the_category();
                                            if( $cat ) :
                                                echo '<span>' . $cat[0]->name . '</span>';
                                            endif;
                                            ?>
                                            <span><?= get_the_date('d.m.Y') ?></span>
                                        </div>
                                        <!-- End Footer -->

                                    </a>
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