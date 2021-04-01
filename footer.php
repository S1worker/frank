<?php
defined( 'ABSPATH' ) || exit;
/**
 * The footer for our theme
 * @package frank
 */
?>
        </main>
        <!-- END CONTENT-->

        <?php
        /**
         * footer_parts hook
         *
         * @hooked frank_footer_TagFooterForm - 10
         * @hooked frank_footer_TagFooterOpen - 20
         * @hooked frank_footer_TagFooterInner - 30
         * @hooked frank_footer_TagFooterClose - 100
         *
         */
        do_action('footer_parts');
        ?>

    </div>
    <!-- end container -->

    <?php wp_footer(); ?>

</body>
</html>