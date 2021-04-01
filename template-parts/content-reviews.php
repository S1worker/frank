<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frank
 */

?>
<?= get_template_part('template-parts/partials/_partial', 'pagehead', [ 'title' => __( 'Reviews', 'frank' ) ]); ?>

<!-- section -->
<section class="reviews_page">

    <!-- container -->
    <div class="container-fluid">

        <!-- row -->
        <div class="row">

            <!-- col -->
            <div class="col-xs-12">

                <?php
                if ( have_posts() ) :
                    ?>

                    <!-- List -->
                    <ul class="reviews__list row">

                        <?php while ( have_posts() ) : the_post(); ?>
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
                                        <?= the_content() ?>
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
                        <?php endwhile; ?>

                    </ul>
                    <!-- End List -->

                    <!-- Pagination -->
                    <?php
                    $args = array(
                        'show_all'     => false,
                        'end_size'     => 1,
                        'mid_size'     => 1,
                        'prev_next'    => true,
                        'prev_text'    => __('« Previous'),
                        'next_text'    => __('Next »'),
                        'add_args'     => false,
                        'add_fragment' => '',
                        'screen_reader_text' => ' ',
                    );
                    the_posts_pagination( $args )
                    ?>
                    <!-- End Pagination -->

                <?php endif; ?>

            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

    </div>
    <!-- end container -->

    <!-- Form -->
    <div class="reviews_page__form">

        <!-- container -->
        <div class="container-fluid">

            <!-- row -->
            <div class="row">

                <!-- col -->
                <div class="col-xs-12">

                    <!-- Title -->
                    <h2 class="reviews_page__form-title">
                        <?= _e( 'Add a review', 'frank' ) ?>
                    </h2>
                    <!-- End Title -->

                    <!-- Form -->
                    <div class="reviews_page__form-form">
                        <?= do_shortcode( '[contact-form-7 id="82" title="Review" html_class="row form"]' ) ?>
                    </div>
                    <!-- End Form -->

                </div>
                <!-- end col -->

            </div>
            <!-- end row -->

        </div>
        <!-- end container -->

    </div>
    <!-- End Form -->

</section>
<!-- end section -->
