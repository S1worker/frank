<?php 
/*
 * Home: Services
 */
defined( 'ABSPATH' ) || exit;

$id_home = get_option('page_on_front');
?>

<?php if( ! get_field( 'services_hide', $id_home ) ) : ?>

    <!-- section -->
    <section class="services">

        <!-- container -->
        <div class="container-fluid">

            <!-- row -->
            <div class="row">

                <!-- col -->
                <div class="col-xs-12">

                    <!-- Headpanel -->
                    <div class="services__headpanel">

                        <!-- Title -->
                        <h2 class="services__headpanel-title">
                            <?= get_field( 'services_title', $id_home ) ?>
                        </h2>
                        <!-- End Title -->

                    </div>
                    <!-- End Headpanel -->

                    <?php
                    $group = get_field( 'services_list', $id_home );
                    ?>

                    <?php if( $group['icons_list'] ) : ?>

                        <!-- Icon List -->
                        <ul class="services__icon_list row">

                            <?php foreach ( $group['icons_list'] as $item ) : ?>
                                <li>
                                    <!-- Item -->
                                    <div class="services__icon_list-item">

                                        <!-- Icon -->
                                        <div class="services__icon_list-item--icon">
                                            <img
                                                    src="<?= $item['image'] ?>"
                                                    alt="<?= $item['title'] ?>"
                                                    title="<?= $item['title'] ?>"
                                            >
                                        </div>
                                        <!-- End Icon -->

                                        <!-- Title -->
                                        <span>
                                            <?= $item['title'] ?>
                                        </span>
                                        <!-- End Title -->

                                    </div>
                                    <!-- End Item -->
                                </li>
                            <?php endforeach; ?>

                        </ul>
                        <!-- End Icon List -->

                    <?php endif; ?>

                    <?php if( $group['text_list'] ) : ?>

                        <!-- Icon List -->
                        <ul class="services__text_list row">

                            <?php foreach ( $group['text_list'] as $item ) : ?>
                                <li>
                                    <!-- Item -->
                                    <div class="services__text_list-item">

                                        <?= $item['title'] ?>

                                    </div>
                                    <!-- End Item -->
                                </li>
                            <?php endforeach; ?>

                        </ul>
                        <!-- End Icon List -->

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