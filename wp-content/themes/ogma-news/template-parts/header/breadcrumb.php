<?php
/**
 * Template part for breadcrumb.
 *
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_news_site_breadcrumb_enable = ogma_news_get_customizer_option_value( 'ogma_news_site_breadcrumb_enable' );

if ( false === $ogma_news_site_breadcrumb_enable ) {
    return;
}

$ogma_news_site_breadcrumb_types = ogma_news_get_customizer_option_value( 'ogma_news_site_breadcrumb_types' );

if ( ! function_exists( 'ogma_news_breadcrumb_trail' ) ) :

    /**
     *  function to manage the breadcrumb trail
     * 
     * @since 1.0.0
     */
    function ogma_news_breadcrumb_trail() {

        $ogma_news_body_classes = get_body_class();
        if ( in_array( 'woocommerce', $ogma_news_body_classes ) ) {
            woocommerce_breadcrumb();
            return;
        }

        if ( ! function_exists( 'breadcrumb_trail' ) ) {
            // load class file
            require_once get_template_directory() . '/inc/ogma-news-class-breadcrumb.php';
        }

        $ogma_news_breadcrumb_args = array(
            'container'   => 'div',
            'show_browse' => false,
        );

        breadcrumb_trail( $ogma_news_breadcrumb_args );
    }
    
endif;

?>
<div class="ogma-news-breadcrumb-wrapper">
    <div class="ogma-news-container">
        <?php
            switch ( $ogma_news_site_breadcrumb_types ) {
                case 'navxt':
                    if ( function_exists( 'bcn_display' ) ) {
                        echo '<nav id="breadcrumb" class="ogma-news-breadcrumb">';
                            bcn_display();
                        echo '</nav>';
                    }
                    break;

                case 'yoast':
                    if ( function_exists( 'yoast_breadcrumb' ) && true === WPSEO_Options::get( 'breadcrumbs-enable', false ) ) {
                        yoast_breadcrumb( '<nav id="breadcrumb" class="ogma-news-breadcrumb">', '</nav>' );
                    }
                    break;

                case 'rankmath':
                    if ( function_exists( 'rank_math_the_breadcrumbs' ) && RankMath\Helper::get_settings( 'general.breadcrumbs' ) ) {
                        rank_math_the_breadcrumbs();
                    }
                    break;
                
                default:
                    ogma_news_breadcrumb_trail();
                    break;
            }
        ?>
    </div><!-- .ogma-news-container -->
</div><!-- .ogma-news-breadcrumb-wrapper -->