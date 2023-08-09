<?php
/**
 * file to handle the main banner.
 * 
 * @package Ogma News
 */

$ogma_news_banner_layout = ogma_news_get_customizer_option_value( 'ogma_news_frontpage_banner_layout' );

$ogma_news_layout = explode( '--', $ogma_news_banner_layout );
$ogma_news_layout = $ogma_news_layout[1];

if ( 'two' === $ogma_news_layout ) {
    $ogma_news_banner_reorder = ogma_news_get_customizer_option_value( 'ogma_news_banner_two_column_reorder' );
} else {
    $ogma_news_banner_reorder = ogma_news_get_customizer_option_value( 'ogma_news_banner_one_column_reorder' );
}

$ogma_news_banner_slider_order_by = ogma_news_get_customizer_option_value( 'ogma_news_banner_slider_order_by' );
$order_by = explode( '-', $ogma_news_banner_slider_order_by );

$ogma_news_banner_args['slider_args'] = array(
    'orderby'               => esc_attr( $order_by[0] ),
    'order'                 => esc_attr( $order_by[1] ),
    'posts_per_page'        => apply_filters( 'ogma_news_banner_slider_post_count', 5 ),
    'ignore_sticky_posts'   => true
);

$ogma_news_banner_slider_category = ogma_news_get_customizer_option_value( 'ogma_news_banner_slider_category' );

if ( 'all' !== $ogma_news_banner_slider_category ) {
    $ogma_news_banner_args['slider_args']['category_name'] = $ogma_news_banner_slider_category;
}

$ogma_news_banner_slider_date_filter = ogma_news_get_customizer_option_value( 'ogma_news_banner_slider_date_filter' );
if ( 'all' !== $ogma_news_banner_slider_date_filter ) {
    $banner_slider_date_args = ogma_news_get_date_format_args( $ogma_news_banner_slider_date_filter );
    $ogma_news_banner_args['slider_args']['date_query'] = $banner_slider_date_args;
}

$ogma_news_banner_block_order_by = ogma_news_get_customizer_option_value( 'ogma_news_banner_block_order_by' );
$order_by = explode( '-', $ogma_news_banner_block_order_by );

$ogma_news_banner_args['block_args'] = array(
    'orderby'               => esc_attr( $order_by[0] ),
    'order'                 => esc_attr( $order_by[1] ),
    'posts_per_page'        => apply_filters( 'ogma_news_banner_block_post_count', 2 ),
    'ignore_sticky_posts'   => true
);

$ogma_news_banner_block_category = ogma_news_get_customizer_option_value( 'ogma_news_banner_block_category' );

if ( 'all' !== $ogma_news_banner_block_category ) {
    $ogma_news_banner_args['block_args']['category_name'] = esc_attr( $ogma_news_banner_block_category );
}

$ogma_news_banner_args['timeline_args'] = array(
    'posts_per_page'        => apply_filters( 'ogma_news_banner_timeline_post_count', 5 ),
    'ignore_sticky_posts'   => true
);

$ogma_news_banner_custom_classes[] = $ogma_news_banner_layout;

$ogma_news_banner_bg_type = ogma_news_get_customizer_option_value( 'ogma_news_banner_bg_type' );

$ogma_news_banner_custom_classes[] = 'has-banner-'.esc_attr( $ogma_news_banner_bg_type );

if ( 'two' === $ogma_news_layout ) {
    $ogma_news_banner_reorder = ogma_news_get_customizer_option_value( 'ogma_news_banner_two_column_reorder' );
    if ( empty( $ogma_news_banner_reorder ) ) {
        return;
    }
    if ( ! in_array( 'tab', $ogma_news_banner_reorder ) ) {
        $ogma_news_banner_custom_classes[] = 'fullwidth-slider';
    }
    $ogma_news_banner_custom_classes[] = 'banner-placed--'.esc_attr( implode( '-', $ogma_news_banner_reorder ) );
    echo '<div class="ogma-news-banner-wrapper '. esc_attr( implode( ' ' , $ogma_news_banner_custom_classes ) ) .'">';
    echo '<div class="ogma-news-container">';
    foreach ( $ogma_news_banner_reorder as $key => $value ) {
        if ( 'slider' === $value ) {
            get_template_part( 'template-parts/partials/banner/slider/layout', 'two', $ogma_news_banner_args );
        } elseif ( 'tab' === $value ) {
            get_template_part( 'template-parts/partials/banner/slider', 'tab' );
        }
    }
    echo '</div><!-- .ogma-news-container -->';
    echo '</div><!-- .ogma-news-banner-wrapper -->';
} else {
    $ogma_news_banner_reorder = ogma_news_get_customizer_option_value( 'ogma_news_banner_one_column_reorder' );
    if ( empty( $ogma_news_banner_reorder ) ) {
        return;
    }
    if ( ! in_array( 'block', $ogma_news_banner_reorder ) && ! in_array( 'timeline', $ogma_news_banner_reorder ) ) {
        $ogma_news_banner_custom_classes[] = 'fullwidth-slider';
    }
    $ogma_news_banner_custom_classes[] = 'banner-placed--'.esc_attr( implode( '-', $ogma_news_banner_reorder ) );
    echo '<div class="ogma-news-banner-wrapper '. esc_attr( implode( ' ' , $ogma_news_banner_custom_classes ) ) .'">';
    echo '<div class="ogma-news-container">';
    foreach ( $ogma_news_banner_reorder as $key => $value ) {
        if ( 'block' === $value ) {
            get_template_part( 'template-parts/partials/banner/slider', 'block', $ogma_news_banner_args );
        } elseif ( 'slider' === $value ) {
            get_template_part( 'template-parts/partials/banner/slider/layout', 'main', $ogma_news_banner_args );
        } elseif ( 'timeline' === $value ) {
            get_template_part( 'template-parts/partials/banner/slider', 'timeline', $ogma_news_banner_args );
        }
    }
    echo '</div><!-- .ogma-news-container -->';
    echo '</div><!-- .ogma-news-banner-wrapper -->';
}