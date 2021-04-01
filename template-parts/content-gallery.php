<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frank
 */

?>
<?= get_template_part('template-parts/partials/_partial', 'pagehead', [ 'title' => __( 'Gallery', 'frank' ) ]); ?>

<!-- section -->
<section class="gallery_page">

    <!-- container -->
    <div class="container-fluid">

        <!-- row -->
        <div class="row">

            <!-- col -->
            <div class="col-xs-12">

                <?php
                if ( have_posts() ) :
                    ?>

                    <!-- Slider -->
                    <ul class="gallery_page__list row">

                        <?php while ( have_posts() ) : the_post(); ?>
                            <li>
                                <!-- Item -->
                                <a href="<?= get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?>" data-fancybox="item-<?= get_the_ID() ?>" class="gallery_page__list-item">

                                    <?= kama_thumb_img( 'w=360 &h=270' ) ?>

                                </a>
                                <!-- End Item -->
                            </li>
                        <?php endwhile; ?>

                    </ul>
                    <!-- End Slider -->

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

</section>
<!-- end section -->
