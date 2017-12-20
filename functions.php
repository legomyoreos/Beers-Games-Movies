<?php

/**
 * Functions Library
 */
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

function register_theme_menus() {

    register_nav_menus(
        array(
            'primary' => __( 'Primary Navigation' )
            )
        );
}
add_action( 'init', 'register_theme_menus' );

/**
 * The proper way to add stylesheets or javascript files to a WordPress theme is via the enqueue system
 * Learn more: http://code.tutsplus.com/articles/how-to-include-javascript-and-css-in-your-wordpress-themes-and-plugins--wp-24321
 */
function web3_enqueues() {

    /**
     * I'm registereing and enqueuing my custom stylesheet
     * get_stylesheet_directory_uri() points to the theme folder
     */
    wp_enqueue_style('normalize_css', get_template_directory_uri() . '/css/normalize.css');

    wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');

    wp_enqueue_style('Roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,700');
}

add_action('wp_enqueue_scripts', 'web3_enqueues', 20);



