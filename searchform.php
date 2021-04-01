<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >

    <a href="#close" class="openSearch header__search-form--close">
        <span><?= _e( 'Close Search' ) ?></span>
    </a>

    <input
        type="text"
        value="<?php echo get_search_query() ?>"
        name="s"
        id="s"
        placeholder="<?= _e( 'Catalog by search' ) ?>"
    />

    <button type="submit" id="searchsubmit">
        <img
            src="<?= get_template_directory_uri() . '/assets/images/ic_search_black.svg' ?>"
            alt=""
            title=""
            class="svg"
        >
    </button>

</form>
