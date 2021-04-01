<?php
/*
 * Modal: Auth
 */
defined( 'ABSPATH' ) || exit;
?>

<!-- Popup -->
<div class="popup popup__auth" id="auth">

    <!-- Close Button -->
    <button
            data-fancybox-close
            class="fancybox-button fancybox-button--close popup__close"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 10.6L6.6 5.2 5.2 6.6l5.4 5.4-5.4 5.4 1.4 1.4 5.4-5.4 5.4 5.4 1.4-1.4-5.4-5.4 5.4-5.4-1.4-1.4-5.4 5.4z"/></svg>
    </button>
    <!-- End Close Button -->

    <!-- Popup > Header -->
    <div class="popup__header">

        <!-- Title -->
        <h3 class="popup__header-title">
            <?= _e( 'Авторизация', 'frank' ) ?>
        </h3>
        <!-- End Title -->

    </div>
    <!-- End Popup > Header -->

    <!-- Popup > Content -->
    <div class="popup__content">

        <p>
            <?= _e( 'Что-бы проголосовать, Вам необходимо авторизироваться.', 'frank' ) ?>
        </p>

        <!-- Auth -->
        <div>
            <a href="<?= url_google_auth() ?>" class="btn popup__auth-btn" onclick="window.open(this.href, '_self'); return false;">
                <img
                        src="<?= get_template_directory_uri() ?>/assets/images/icon-google.svg"
                        alt=""
                        title=""
                        class="svg"
                >
                <span><?= _e( 'Авторизация', 'frank' ) ?></span>
            </a>
        </div>
        <!-- End Auth -->

    </div>
    <!-- End Popup > Content -->

</div>
<!-- End Popup -->