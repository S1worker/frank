<?php
defined( 'ABSPATH' ) || exit;
/**
 * The header for our theme
 * @package frank
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- End Google Font -->

    <?php wp_head(); ?>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body <?= body_class() ?> >

    <!-- container -->
    <div id="container">
        <?php
        /**
         * header_parts hook
         *
         * @hooked frank_header_TagHeaderOpen - 10
         * @hooked frank_header_TagHeaderInner - 20
         * @hooked frank_header_TagHeaderClose - 30
         *
         */
        do_action('header_parts');
        ?>
        <!-- CONTENT -->
        <main>