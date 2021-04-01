<?php
/*
 * Partial: Banners
 */
defined( 'ABSPATH' ) || exit;
?>

<!-- section -->
<section class="pagehead">

    <!-- container -->
    <div class="container-fluid">

        <!-- row -->
        <div class="row">

            <!-- col -->
            <div class="col-xs-12">

                <?= get_template_part('template-parts/partials/_partial', 'breadcrumbs'); ?>

                <!-- Title -->
                <div class="pagehead__title">
                    <?php
                    $title = ($args['title']) ? $args['title'] : get_the_title();
                    ?>
                    <h1><?= $title ?></h1>
                </div>
                <!-- End Title -->

            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

    </div>
    <!-- end container -->

</section>
<!-- end section -->
