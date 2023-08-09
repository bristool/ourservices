<?php
/**
 * Partial template to display top header date.
 *
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_news_header_top_date_enable = ogma_news_get_customizer_option_value( 'ogma_news_header_top_date_enable' );

if ( false === $ogma_news_header_top_date_enable ) {
    return;
}

$ogma_news_header_top_date_format = ogma_news_get_customizer_option_value( 'ogma_news_header_top_date_format' );

switch ( $ogma_news_header_top_date_format ) {
    case 'date_format_2':
        $date_format    = 'd F, Y'; //01 January, 2023
        break;
    
    default:
        $date_format    = 'd M, Y'; //01 Jan, 2023
        break;
}

$datetime       = date_i18n( $date_format, current_datetime( 'timestamp' ) );
?>

<div class="top-header-date-wrap">
    <span class="date"><?php echo esc_html( $datetime ); ?></span>
    <span class="time"></span>
</div><!-- .top-header-date-wrap -->