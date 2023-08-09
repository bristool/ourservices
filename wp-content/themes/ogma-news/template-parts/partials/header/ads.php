<?php
/**
 * Partial template to display header ads.
 *
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_news_header_ads_image = ogma_news_get_customizer_option_value( 'ogma_news_header_ads_image' );

if ( empty( $ogma_news_header_ads_image ) || 0 == $ogma_news_header_ads_image ) {
    return;
}

$ogma_news_header_ads_image_link = ogma_news_get_customizer_option_value( 'ogma_news_header_ads_image_link' );
$ads_image_src = wp_get_attachment_image( $ogma_news_header_ads_image, 'full' );
?>

<div class="ogma-news-header-ads-wrap">
    <a href="<?php echo esc_url( $ogma_news_header_ads_image_link ); ?>">
        <?php echo wp_kses_post( $ads_image_src ); ?>
    </a>
</div><!-- .ogma-news-header-ads-wrap -->