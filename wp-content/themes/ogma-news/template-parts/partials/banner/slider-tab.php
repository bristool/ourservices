<?php
/**
 * Partial template for main banner tabbed.
 * 
 * @package Ogma News
 */

$ogma_news_banner_tab_label_latest   = ogma_news_get_customizer_option_value( 'ogma_news_banner_tab_label_latest' );
$ogma_news_banner_tab_label_popular  = ogma_news_get_customizer_option_value( 'ogma_news_banner_tab_label_popular' );
$ogma_news_banner_tab_label_trending  = ogma_news_get_customizer_option_value( 'ogma_news_banner_tab_label_trending' );
            
?>

<div id="banner-tabbed" class="banner-tabbed-wrapper">
    <ul class="banner-tabs">
        <li><a href="#tab-latest"><i class='bx bx-time' ></i><?php echo esc_html( $ogma_news_banner_tab_label_latest ); ?></a></li>
        <li><a href="#tab-popular"><i class='bx bxs-hot' ></i><?php echo esc_html( $ogma_news_banner_tab_label_popular ); ?></a></li>
        <li><a href="#tab-trendng"><i class='bx bxs-bolt' ></i><?php echo esc_html( $ogma_news_banner_tab_label_trending ); ?></a></li>
    </ul><!-- .banner-tab -->
    <div class="tabbed-content-wrapper">
        <div id="tab-latest" class="tab-content-wrap">
            <?php ogma_news_render_tab_posts( 'latest' ); ?>
        </div><!-- .tab-content-wrap -->
        <div id="tab-popular" class="tab-content-wrap" role="presentation">
            <?php ogma_news_render_tab_posts( 'popular' ); ?>
        </div><!-- .tab-content-wrap -->
        <div id="tab-trendng" class="tab-content-wrap">
            <?php ogma_news_render_tab_posts( 'trending' ); ?>
        </div><!-- .tab-content-wrap -->
    </div><!-- .tabbed-content-wrapper -->
</div><!-- .banner-tabbed-wrapper -->