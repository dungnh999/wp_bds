<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dungnh
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0e5a54" />
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->


</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a href="#" class="cd-top"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"></path><path d="M12 8l-6 6 1.41 1.41L12 10.83l4.59 4.58L18 14z"></path></svg></a>
    <script>

        jQuery(document).ready(function() {
            var offset = 100
                , offset_opacity = 200
                , scroll_top_duration = 700
                , $back_to_top = jQuery('.cd-top');
            jQuery(window).scroll(function() {
                (jQuery(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
                if (jQuery(this).scrollTop() > offset_opacity) {
                    $back_to_top.addClass('cd-fade-out')
                }
            });
            $back_to_top.on('click', function(event) {
                event.preventDefault();
                jQuery('body,html').animate({
                    scrollTop: 0,
                }, scroll_top_duration)
            });
        });
    
    </script>
    
    <header class="page-header" role="banner">
        <!-- NO INDEX -->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- NO INDEX -->
                    <div class="row">
                        <div class="navbar-brand col-md-2">
                            <?php the_custom_logo(); ?>
                        </div>

                        


                        <div class="nav-group-right col-md-10">
                            <div class="hamburger-menu">
                                <div class="menu__btn" for="menu__toggle">
                                    <span></span>
                                </div>
                            </div>
                            <?php wp_nav_menu(
                                    array(
                                        'theme_location' => 'menu-1',
                                        'menu_id'        => 'primary-menu',
                                        'container_class'      => 'wrap-main-menu',
                                        'menu_class'           => 'menu menu-main',
                                    )
                                );
                            ?>
                        </div>
                    </div>

                    <div class="header-right d-flex">
                        <div class="header-search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="21" viewBox="0 0 24 21" fill="none">
                            <path d="M10.875 16.2908C15.2242 16.2908 18.75 13.2454 18.75 9.48866C18.75 5.73194 15.2242 2.68652 10.875 2.68652C6.52576 2.68652 3 5.73194 3 9.48866C3 13.2454 6.52576 16.2908 10.875 16.2908Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.4453 14.2988L21.0016 18.2344" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div class="form-search-header">
                                <form class="search" action="<?php echo home_url( '/' ); ?>">
                                    <input type="search" name="s" placeholder="<?php echo __('Enter keywork, ...', 'dungnh');?>">
                                    <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg></button>
                                </form>
                            </div>
                        </div>
                        <?php 
                        $hotline_header = get_field('hotline_header', 'options');
                        ?>
                        <div class="header-phone">
                            <a href="tel:<?php echo (!empty($hotline_header)) ? $hotline_header : '' ;?>"><span class="icon-phone"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="23" viewBox="0 0 27 23" fill="none">
                            <path d="M7.7432 0C5.67589 0 4 1.67589 4 3.7432V6.73776C4 15.4205 11.0387 22.4592 19.7214 22.4592H22.716C24.7833 22.4592 26.4592 20.7833 26.4592 18.716V16.6468C26.4592 15.7961 25.9786 15.0184 25.2177 14.638L21.6004 12.8293C20.3779 12.2181 18.8975 12.8313 18.4653 14.1279L18.0194 15.4654C17.85 15.9736 17.3287 16.2762 16.8035 16.1711C13.5156 15.5135 10.9457 12.9436 10.2881 9.65574C10.183 9.13046 10.4856 8.60915 10.9938 8.43975L12.6537 7.88644C13.767 7.51532 14.407 6.34959 14.1223 5.21106L13.2449 1.7012C12.9949 0.701395 12.0966 0 11.066 0H7.7432Z" fill="#C3912C"/>
                            </svg></span><?php echo (!empty($hotline_header)) ? $hotline_header : '' ;?></a>
                        </div>
                    </div>
                </div>
                <!-- NO INDEX -->


            </div>
        </nav>
        <div class="overlay-menu"></div>
    </header>



    <main id="main-page">

    <?php 
    if(!is_front_page(  )) {
        if(is_single() || is_page_template('templates/page-search-property.php') || is_page_template('templates/page-search-can-ho.php')) {
            ?>
            <div class="heading-page">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php dimox_breadcrumbs(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }else{
            if(!is_archive( 'can-ho' )) {
                $banner_image_default = get_field('banner_image_default', 'options');
                ?>
                <div class="heading-page-banner" style="background-image: url(<?php echo $banner_image_default['url']; ?>);">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page_title f50 fw800 uppercase"><?php 
                                if(is_home()) {
                                    echo 'Tin tức';
                                }else{
                                    echo get_the_title(); 
                                }
                                
                                ?></div>
                                <?php dimox_breadcrumbs(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }else{
                ?>
                <div class="heading-page">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <?php dimox_breadcrumbs(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
    
    ?>
