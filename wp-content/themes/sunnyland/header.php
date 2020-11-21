<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sunnyland
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" sizes="32x32"/>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/pinterest_profile_image.png" sizes="192x192"/>
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/pinterest_profile_image.png"/>
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/pinterest_profile_image.png"/>

<?php wp_head(); ?>
</head>

<body>
<div class="wrapper">
    <header>
        <div class="main-header">
            <div class="container">
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/logo2.png"
                                alt="Mẫu website Bất động sản đẹp chuẩn seo"></a>
                    <h1>Mẫu website Bất động sản đẹp chuẩn seo</h1>
                </div>
                <div class="top-menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'menu-top',
                        )
                    );
                    ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </header>