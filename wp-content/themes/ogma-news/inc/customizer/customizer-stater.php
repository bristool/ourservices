<?php
/**
 * Includes theme customizer defaults and starter functions.
 * 
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'ogma_news_get_customizer_option_value' ) ) :

    /**
     * Get the customizer value `get_theme_mod()`
     * 
     * @since 1.0.0
     */
    function ogma_news_get_customizer_option_value( $setting_id ) {

        return get_theme_mod( $setting_id, ogma_news_get_customizer_default( $setting_id ) );

    }

endif;

if ( ! function_exists( 'ogma_news_get_customizer_default' ) ) :

    /**
     * Returns an array of the desired default Ogma Options
     *
     * @return array
     */
    function ogma_news_get_customizer_default( $setting_id ) {

        $default_values = apply_filters( 'ogma_news_get_customizer_defaults',
            array(
                //container
                'ogma_news_site_container_layout'                 => 'separate',
                'ogma_news_main_container_width'                  => 1320,
                'ogma_news_boxed_container_width'                 => 1290,
                'ogma_news_site_mode'                             => 'light-mode',
                //preloader
                'ogma_news_preloader_enable'                      => true,
                'ogma_news_preloader_style'                       => 'wave',
                //social icons
                'ogma_news_social_icon_link_target'               => false,
                'ogma_news_social_icons'                          => json_encode( array( array( 'social_icon' => 'bx bxl-twitter', 'social_url'   => '', 'item_visible'   => 'show' ) ) ),
                //colors
                'ogma_news_primary_theme_color'                   => '#E53935',
                'ogma_news_text_color'                            => '#3b3b3b',
                'ogma_news_link_color'                            => '#E53935',
                'ogma_news_link_hover_color'                      => '#005ca8',
                //breadcrumb
                'ogma_news_site_breadcrumb_enable'                => true,
                'ogma_news_site_breadcrumb_types'                 => 'default',
                //sidebar layout
                'ogma_news_sidebar_sticky_enable'                 => true,
                'ogma_news_archive_sidebar_layout'                => 'right-sidebar',
                'ogma_news_posts_sidebar_layout'                  => 'right-sidebar',
                'ogma_news_pages_sidebar_layout'                  => 'right-sidebar',
                //scroll top
                'ogma_news_scroll_top_enable'                     => true,
                'ogma_news_scroll_top_arrow'                      => 'bx-up-arrow-alt',
                //site identity
                'site_identity_tabs'                    => 'general',
                //typography
                'ogma_news_body_font_family'                      => 'Roboto',
                'ogma_news_body_font_weight'                      => '400',
                'ogma_news_body_font_style'                       => 'normal',
                'ogma_news_body_font_transform'                   => 'inherit',
                'ogma_news_body_font_decoration'                  => 'inherit',
                'ogma_news_heading_font_family'                   => 'Nunito',
                'ogma_news_heading_font_weight'                   => '700',
                'ogma_news_heading_font_style'                    => 'normal',
                'ogma_news_heading_font_transform'                => 'inherit',
                'ogma_news_heading_font_decoration'               => 'inherit',
                //performance
                'ogma_news_site_schema_enable'                    => true,
                'ogma_news_posts_date_style'                      => 'publish',
                'ogma_news_posts_date_format'                     => 'default',
                'ogma_news_posts_thumbnail_hover_effect'          => 'hover-effect--one',
                'ogma_news_posts_reading_time_enable'             => true,
                //top header
                'ogma_news_header_top_area_tabs'                  => 'general',
                'ogma_news_header_top_enable'                     => true,
                'ogma_news_header_top_bg_color'                   => '#111111',
                'ogma_news_header_top_date_enable'                => true,
                'ogma_news_header_top_date_format'                => 'date_format_1',
                'ogma_news_header_top_menu_enable'                => true,
                'ogma_news_header_social_enable'                  => true,
                'ogma_news_header_top_placement'                  => 'placement_one',
                //header main area
                'ogma_news_header_main_area_tabs'                 => 'general',
                'ogma_news_header_sticky_enable'                  => true,
                'ogma_news_header_main_area_layout'               => 'header-main-layout--one',
                'ogma_news_header_site_mode_switch_enable'        => true,
                'ogma_news_header_search_enable'                  => true,
                'ogma_news_header_sticky_sidebar_toggle_enable'   => true,
                'ogma_news_header_custom_button_label'            => __( 'Subscribe', 'ogma-news' ),
                'ogma_news_header_custom_button_link'             => '',
                'ogma_news_header_main_bg_type'                   => 'bg-none',
                'ogma_news_header_main_bg_color'                  => '#E53935',
                'ogma_news_header_main_bg_image'                  => '',
                //primary menu
                'ogma_news_primary_menu_description_enable'       => true,
                //header ads
                'ogma_news_header_ads_image'                      => '',
                'ogma_news_header_ads_image_link'                 => '',
                //header ticker
                'ogma_news_header_ticker_enable'                  => true,
                'ogma_news_header_ticker_label'                   => __( 'Breaking News', 'ogma-news' ),
                'ogma_news_ticker_posts_date_filter'              => 'all',
                //frontpage banner
                'ogma_news_frontpage_banner_tabs'                 => 'general',
                'ogma_news_frontpage_banner_layout'               => 'frontpage-banner-layout--one',
                'ogma_news_banner_slider_order_by'                => 'date-desc',
                'ogma_news_banner_slider_category'                => 'all',
                'ogma_news_banner_slider_date_filter'             => 'all',
                'ogma_news_banner_block_category'                 => 'all',
                'ogma_news_banner_block_order_by'                 => 'date-desc',
                'ogma_news_banner_tab_label_latest'               => __( 'Latest', 'ogma-news' ),
                'ogma_news_banner_tab_label_popular'              => __( 'Popular', 'ogma-news' ),
                'ogma_news_banner_tab_label_trending'             => __( 'Trending', 'ogma-news' ),
                'ogma_news_banner_tab_trending_category'          => 'all',
                'ogma_news_banner_timeline_title'                 => __( 'Most Read', 'ogma-news' ),
                'ogma_news_banner_one_column_reorder'             => array( 'block', 'slider', 'timeline' ),
                'ogma_news_banner_two_column_reorder'             => array( 'slider', 'tab' ),
                'ogma_news_banner_bg_type'                        => 'bg-none',
                'ogma_news_banner_bg_color'                       => '#F7F8F9',
                'ogma_news_banner_bg_image'                       => '',
                //homepage
                'ogma_news_frontpage_blocks_enable'               => true,
                //front top fullwidth
                'ogma_news_front_top_fullwidth_blocks'            => json_encode(
                    array(
                        array(
                            'type'              => 'news-featured',
                            'option'            => true,
                            'blockTitle'        => __( 'Highlight News', 'ogma-news' ),
                            'category'          => 'all',
                            'postOrderby'       => 'date-desc',
                            'postDatefilter'    => 'all',
                            'postCount'         => 3,
                            'blocklayout'       => 'one',
                            'postCats'          => true,
                            'postAuthor'        => true,
                            'postDate'          => true,
                            'postComment'       => true,
                            'postMore'          => true,

                        ),
                        array(
                            'type'          => 'ad-block',
                            'option'        => true,
                            'imgSrc'        => '',
                            'imgUrl'        => '',
                            'newTab'        => true,
                        ),
                    )
                ),
                // front middle content
                'ogma_news_front_middle_content_blocks'   => json_encode(
                    array(
                        array(
                            'type'              => 'news-block',
                            'option'            => true,
                            'blockTitle'        => __( 'World News', 'ogma-news' ),
                            'category'          => 'all',
                            'postOrderby'       => 'date-desc',
                            'postDatefilter'    => 'all',
                            'postCount'         => 5,
                            'blocklayout'       => 'one',
                            'postCats'          => true,
                            'postAuthor'        => true,
                            'postDate'          => true,
                            'postComment'       => true,
                            'postMore'          => true,
                        ),
                        array(
                            'type'              => 'news-list',
                            'option'            => true,
                            'blockTitle'        => __( 'Latest News', 'ogma-news' ),
                            'category'          => 'all',
                            'postOrderby'       => 'date-desc',
                            'postDatefilter'    => 'all',
                            'postCount'         => 3,
                            'blocklayout'       => 'one',
                            'postCats'          => true,
                            'postAuthor'        => true,
                            'postDate'          => true,
                            'postComment'       => true,
                            'postExcerpt'       => true,
                            'postMore'          => true,

                        ),
                    )
                ),
                //front bottom fullwidth
                'ogma_news_front_bottom_fullwidth_blocks' => json_encode(
                    array(
                        array(
                            'type'              => 'news-carousel',
                            'option'            => true,
                            'blockTitle'        => __( 'Editor Picks', 'ogma-news' ),
                            'category'          => 'all',
                            'postOrderby'       => 'date-desc',
                            'postDatefilter'    => 'all',
                            'postCount'         => 6,
                            'blocklayout'       => 'one',
                            'postCats'          => true,
                            'postAuthor'        => true,
                            'postDate'          => true,
                            'postComment'       => true,

                        ),
                        array(
                            'type'              => 'news-grid',
                            'option'            => true,
                            'blockTitle'        => __( 'Features and Events', 'ogma-news' ),
                            'category'          => 'all',
                            'postOrderby'       => 'date-desc',
                            'postDatefilter'    => 'all',
                            'postCount'         => 5,
                            'blocklayout'       => 'one',
                            'postCats'          => true,
                            'postAuthor'        => true,
                            'postDate'          => true,
                            'postComment'       => true,
                            'postExcerpt'       => true,
                            'postMore'          => true,
                        ),
                    )
                ),
                //archive page
                'ogma_news_archive_page_style'                => 'archive-style--classic',
                'ogma_news_archive_title_prefix_enable'       => false,
                'ogma_news_archive_post_readmore_enable'      => true,
                //single posts
                'ogma_news_single_posts_layout'               => 'posts-layout--one',
                'ogma_news_single_posts_author_enable'        => true,
                'ogma_news_single_posts_related_enable'       => true,
                'ogma_news_single_posts_related_label'        => __( 'Related Posts', 'ogma-news' ),
                //404 error
                'ogma_news_error_page_search_enable'          => true,
                'ogma_news_error_page_button_enable'          => true,
                'ogma_news_error_page_button_label'           => __( 'Back To Home', 'ogma-news' ),
                //footer main area
                'ogma_news_footer_main_enable'                => true,
                'ogma_news_footer_widget_area_layout'         => 'column-three',
                //footer bottom area
                'ogma_news_footer_bottom_enable'              => true,
                'ogma_news_footer_copyright_info'             => esc_html__( 'Copyright &copy; ogma {year}', 'ogma-news' )
            )
        );

        return  $default_values[$setting_id];

    }

endif;