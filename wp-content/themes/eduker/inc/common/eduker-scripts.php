<?php

/**
 * eduker_scripts description
 * @return [type] [description]
 */
function eduker_scripts() {

    /**
     * all css files
    */

    wp_enqueue_style( 'eduker-fonts', eduker_fonts_url(), array(), time() );
    if( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', EDUKER_THEME_CSS_DIR.'bootstrap.rtl.min.css', array() );
    }else{
        wp_enqueue_style( 'bootstrap', EDUKER_THEME_CSS_DIR.'bootstrap.css', array() );
    }
    wp_enqueue_style( 'meanmenu', EDUKER_THEME_CSS_DIR . 'meanmenu.css', [] );
    wp_enqueue_style( 'animate', EDUKER_THEME_CSS_DIR . 'animate.css', [] );
    wp_enqueue_style( 'owl-carousel', EDUKER_THEME_CSS_DIR . 'owl-carousel.css', [] );
    wp_enqueue_style( 'swiper-bundle', EDUKER_THEME_CSS_DIR . 'swiper-bundle.css', [] );
    wp_enqueue_style( 'magnific-popup', EDUKER_THEME_CSS_DIR . 'magnific-popup.css', [] );
    wp_enqueue_style( 'nice-select', EDUKER_THEME_CSS_DIR . 'nice-select.css', [] );
    wp_enqueue_style( 'font-awesome-pro-eduker', EDUKER_THEME_CSS_DIR . 'font-awesome-pro-eduker.css', [] );
    wp_enqueue_style( 'jquery-fancybox', EDUKER_THEME_CSS_DIR . 'spacing.css', [] );
    wp_enqueue_style( 'eduker-core', EDUKER_THEME_CSS_DIR . 'eduker-core.css', [], );
    wp_enqueue_style( 'eduker-unit', EDUKER_THEME_CSS_DIR . 'eduker-unit.css', [], );
    wp_enqueue_style( 'eduker-custom', EDUKER_THEME_CSS_DIR . 'eduker-custom.css', [] );
    wp_enqueue_style( 'eduker-style', get_stylesheet_uri() );

    // all js
    wp_enqueue_script( 'bootstrap-bundle', EDUKER_THEME_JS_DIR . 'bootstrap-bundle.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'waypoints', EDUKER_THEME_JS_DIR . 'waypoints.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'meanmenu', EDUKER_THEME_JS_DIR . 'meanmenu.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'counterup', EDUKER_THEME_JS_DIR . 'counterup.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'swiper-bundle', EDUKER_THEME_JS_DIR . 'swiper-bundle.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'owl-carousel', EDUKER_THEME_JS_DIR . 'owl-carousel.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'magnific-popup', EDUKER_THEME_JS_DIR . 'magnific-popup.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'parallax', EDUKER_THEME_JS_DIR . 'parallax.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'jquery-nice-select', EDUKER_THEME_JS_DIR . 'nice-select.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'wow', EDUKER_THEME_JS_DIR . 'wow.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'isotope-pkgd', EDUKER_THEME_JS_DIR . 'isotope-pkgd.js', [ 'imagesloaded' ], false, true );
    wp_enqueue_script( 'eduker-main', EDUKER_THEME_JS_DIR . 'main.js', [ 'jquery' ], false, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'eduker_scripts' );

/*
Register Fonts
 */
function eduker_fonts_url() {
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'eduker' ) ) {
        $font_url = 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap';
    }
    return $font_url;
}