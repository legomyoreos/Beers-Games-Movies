<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <title>Beers, Games, Movies</title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
	<nav>

        <div id="logo">
            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="http://www.beersgamesmovies.com/wp-content/uploads/2017/05/logo-v2.png"></a>
        </div>

        <?php

            $defaults = array(
                'container' => false,
                'theme_location' => 'primary',
                'menu_class' => 'main-navigation'
                );

            wp_nav_menu( $defaults );
        ?>

    </nav>
</header>
