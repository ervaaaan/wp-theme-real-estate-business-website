<?php

if ( ! defined( 'WP_DEBUG' ) ) {
    die( 'Direct access forbidden.' );
}

add_action( 'wp_enqueue_scripts', function () {

    // Core Styles
    wp_enqueue_style( 'parent-theme-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'main-theme-style', get_stylesheet_directory_uri() . '/style.css', [ 'parent-theme-style' ], filemtime( get_stylesheet_directory() . '/style.css' ) );

    // Section Styles
    $home_banner_css = get_stylesheet_directory() . '/assets/css/home-banner.css';
    if ( file_exists( $home_banner_css ) ) {
        wp_enqueue_style( 'home-banner-style', get_stylesheet_directory_uri() . '/assets/css/home-banner.css', [ 'main-theme-style' ], filemtime( $home_banner_css ) );
    }

    $feature_cards_css = get_stylesheet_directory() . '/assets/css/feature-cards.css';
    if ( file_exists( $feature_cards_css ) ) {
        wp_enqueue_style( 'feature-cards-style', get_stylesheet_directory_uri() . '/assets/css/feature-cards.css', [ 'home-banner-style' ], filemtime( $feature_cards_css ) );
    }

    // Custom Script
    $custom_js = get_stylesheet_directory() . '/assets/js/custom.js';
    if ( file_exists( $custom_js ) ) {
        wp_enqueue_script( 'main-theme-script', get_stylesheet_directory_uri() . '/assets/js/custom.js', [ 'jquery' ], filemtime( $custom_js ), true );
    }

});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], null);
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
    wp_enqueue_script('featured-properties-js', get_stylesheet_directory_uri() . '/assets/js/featured-properties.js', ['swiper'], filemtime(get_stylesheet_directory() . '/assets/js/featured-properties.js'), true);
    wp_enqueue_style('featured-properties-css', get_stylesheet_directory_uri() . '/assets/css/featured-properties.css', [], filemtime(get_stylesheet_directory() . '/assets/css/featured-properties.css'));
});
