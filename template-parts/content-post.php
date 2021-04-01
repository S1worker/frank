<?php
/*
 * Page: Blog
 */
defined( 'ABSPATH' ) || exit;
?>

<?php

$title_page = ( is_category() ) ? get_queried_object()->name : get_the_title();

?>

<?= get_template_part('template-parts/partials/_partial', 'pagehead', [ 'title' => $title_page ]); ?>

<!-- section -->
<section class="blog">

    <!-- container -->
    <div class="container-fluid">

        <!-- row -->
        <div class="row">

            <!-- col -->
            <div class="col-xs-12">

                <?php
                $custom_query_args = [
                    'post_type'   => 'post'
                ];

                if( is_category() ) :
                    $custom_query_args['cat'] = get_queried_object()->term_id;
                endif;

                $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

                $custom_query = new WP_Query( $custom_query_args );

                $temp_query = $wp_query;
                $wp_query   = NULL;
                $wp_query   = $custom_query;

                if ( $custom_query->have_posts() ) : ?>

                    <!-- Slider -->
                    <ul class="blogs__list row">

                        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
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

                <?php else: ?>

                    <?= _e( 'Not Found', 'frank' ) ?>

                <?php endif; wp_reset_postdata(); $wp_query = NULL; $wp_query = $temp_query; ?>

            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

    </div>
    <!-- end container -->

</section>
<!-- end section -->