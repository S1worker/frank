<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package frank
 */

get_header();

?>

<?= get_template_part('template-parts/partials/_partial', 'pagehead'); ?>

    <!-- section -->
    <section class="post">

        <!-- container -->
        <div class="container-fluid">

            <!-- row -->
            <div class="row">

                <!-- col -->
                <div class="col-xs-12">

                    <!-- Text -->
                    <div class="post__text text__style">
                        <?= the_content() ?>
                    </div>
                    <!-- End Text -->

                </div>
                <!-- end col -->

            </div>
            <!-- end row -->

        </div>
        <!-- end container -->
    </section>
    <!-- end section -->

<?php
get_footer();
