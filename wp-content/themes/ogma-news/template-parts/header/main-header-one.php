<?php
/**
 * Template part for displaying a content located in main header layout one.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * hook - ogma_news_before_main_header
 * 
 * @since 1.0.0
 */
do_action( 'ogma_news_before_main_header' );

$ogma_news_header_main_bg_type = ogma_news_get_customizer_option_value( 'ogma_news_header_main_bg_type' );

?>

<header id="masthead" class="site-header header--<?php echo esc_attr( $ogma_news_header_main_bg_type ); ?>" <?php ogma_news_schema_markup( 'header' ); ?>>

    <div class="logo-ads-wrapper">
        <div class="ogma-news-container ogma-news-flex">
            
            <?php
                // site logo
                get_template_part( 'template-parts/partials/header/site', 'logo' );

                // header ads
                get_template_part( 'template-parts/partials/header/ads' );
            ?>
            
        </div><!-- .ogma-news-container -->
    </div><!-- .logo-ads-wrapper -->

    <div class="primary-menu-wrapper">
        <div class="ogma-news-container ogma-news-flex">
            <?php
                // primary menu
                get_template_part( 'template-parts/partials/header/primary', 'menu' );
            ?>
            <div class="ogma-news-icon-elements-wrap">
                <?php
                    // site mode switcher
                    ogma_news_site_mode_switcher();

                    // search icon
                    get_template_part( 'template-parts/partials/header/search' );

                    // sticky sidebar toggle icon
                    ogma_news_sticky_sidebar_toggle();

                    // custom button
                    get_template_part( 'template-parts/partials/header/custom', 'button' );
                ?>
            </div><!-- .icon-elements-wrap -->
        </div><!-- .ogma-news-container -->
    </div><!-- .primary-menu-wrapper -->
    
</header><!-- #masthead -->