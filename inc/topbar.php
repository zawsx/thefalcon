<?php

    namespace yt1300;

class topbar {

    function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'script_style') );
    }

    /**
     * Scripts and styles for the non-mobile topbar.
     *
     * @package yt1300
     * @since 0.1
     * @author Josh Pollock
     */
    function script_style() {
        wp_enqueue_script( 'yt1300-topbar', get_stylesheet_directory_uri().'/js/yt1300.topbar.min.js', array('jquery'), false, true );
        wp_enqueue_style( 'yt300-topbar', get_stylesheet_directory_uri().'/css/yt1300.topbar.css' );
    }

    /**
     * The non-mobile topbar
     *
     * @package yt1300
     * @since 0.1
     * @author Josh Pollock
     */
    static function header() { ?>
        <header id="masthead" class="site-header" role="banner">
            <div id="big-top">
                <div class="header-main">
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                </div>
                   <?php echo self::social(); ?>
            </div>

            <nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
                <a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container_class' => 'topbar-menu', ) ); ?>
                <div class="search-toggle">
                    <a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'twentyfourteen' ); ?></a>
                </div>
                <div id="search-container" class="search-box-wrapper hide">
                    <div class="search-box">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </nav>

        </header><!-- #masthead -->
    <?php
    }

    /*
    * Social Icons for topbar
    * @package yt1300
    * @since 0.1
    * @author Josh Pollock
    */
    function social() {
        //get all theme mods at once in $mods
        $mods = get_theme_mods('yt1300');
        //build output
        $out = '<div id="top-social">';
        if ( $mods['twitter'] != '' ) {
            $out .= '<a href="';
            $out .= esc_url( $mods['twitter']);
            $out .='"><span class="genericon genericon-twitter"></span></a>';
        }
        if ( $mods['googleplus'] !='' ) {
            $out .= '<a href="';
            $out .= esc_url( $mods['googleplus']);
            $out .='"><span class="genericon genericon-googleplus"></span></a>';
        }
        if ( $mods['linkedin'] !='' ) {
            $out .= '<a href="';
            $out .= esc_url( $mods['linkedin']);
            $out .='"><span class="genericon genericon-linkedin"</span></a>';
        }
        if ( $mods['facebook'] !='' ) {
            $out .= '<a href="';
            $out .= esc_url( $mods['facebook']);
            $out .='"><span class="genericon genericon-facebook"></span></a>';
        }
        $out .= '</div>';
        //return social
        return $out;
    }

}

new topbar();
