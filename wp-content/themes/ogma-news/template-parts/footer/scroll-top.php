<?php
/**
 * Template part for displaying a scroll top in footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_news_scroll_top_enable = ogma_news_get_customizer_option_value( 'ogma_news_scroll_top_enable' );

if ( false === $ogma_news_scroll_top_enable ) {
    return;
}

/**
 * hook - ogma_news_before_scroll_top
 * 
 * @since 1.0.0
 */
do_action( 'ogma_news_before_scroll_top' );

$ogma_news_scroll_top_arrow = ogma_news_get_customizer_option_value( 'ogma_news_scroll_top_arrow' );
?>
    <div id="ogma-news-scrollup">
        <i class="bx <?php echo esc_attr( $ogma_news_scroll_top_arrow ); ?>"></i>
    </div><!-- #ogma-news-scrollup -->
<?php
/**
 * hook - ogma_news_after_scroll_top
 * 
 * @since 1.0.0
 */
do_action( 'ogma_news_after_scroll_top' );