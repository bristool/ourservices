<?php
/**
 * Partial template to display header custom button.
 *
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_news_header_custom_button_label = ogma_news_get_customizer_option_value( 'ogma_news_header_custom_button_label' );

if ( empty( $ogma_news_header_custom_button_label ) ) {
    return;
}

$ogma_news_header_custom_button_link = ogma_news_get_customizer_option_value( 'ogma_news_header_custom_button_link' );

?>
<div class="custom-button-wrap ogma-news-icon-elements">
    <a href="<?php echo esc_url( $ogma_news_header_custom_button_link ); ?>" target="_blank">
        <span class="custom-button-bell-icon"> <i class="bx bx-bell"></i></span><?php echo esc_html( $ogma_news_header_custom_button_label ); ?>
    </a>
</div><!-- .cusotm-button-wrap -->