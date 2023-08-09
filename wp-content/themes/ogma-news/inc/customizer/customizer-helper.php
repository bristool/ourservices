<?php
/**
 * Customizer helper where define functions related to customizer panel, sections and settings.
 * 
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}



/*---------------------------------- General Panel Choices ---------------------------------- --*/

    if ( ! function_exists( 'ogma_news_site_container_layout_choices' ) ) :

        /**
         * function to return choices of site container layout.
         *
         * @since 1.0.0
         */
        function ogma_news_site_container_layout_choices() {

            $site_container_layout = apply_filters( 'ogma_news_site_container_layout_choices',
                array(
                    'full-width'    => array(
                        'title'     => __( 'Full Width', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/full-width.png'
                    ),
                    'boxed'         => array(
                        'title'     => __( 'Boxed', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/boxed.png'
                    ),
                    'separate'         => array(
                        'title'     => __( 'Separate', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/seperate.png'
                    )
                )
            );

            return $site_container_layout;

        }

    endif;

    if ( ! function_exists( 'ogma_news_preloader_style_choices' ) ) :

        /**
         * function to return choices for preloader styles.
         *
         * @since 1.0.0
         */
        function ogma_news_preloader_style_choices() {

            $site_container_layout = apply_filters( 'ogma_news_preloader_style_choices',
                array(
                    'three_bounce'    => array(
                        'title'     => __( 'Style 1', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/three-bounce-preloader.gif'
                    ),
                    'wave'         => array(
                        'title'     => __( 'Style 2', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/wave-preloader.gif'
                    ),
                    'folding_cube'         => array(
                        'title'     => __( 'Style 3', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/folding-cube-preloader.gif'
                    )
                )
            );

            return $site_container_layout;

        }

    endif;

    if ( ! function_exists( 'ogma_news_sidebar_layout_choices' ) ) :

        /**
         * function to return choices for archive sidebar layouts.
         *
         * @since 1.0.0
         */
        function ogma_news_sidebar_layout_choices() {

            $sidebar_layouts = apply_filters( 'ogma_news_sidebar_layout_choices',
                array(
                    'right-sidebar'    => array(
                        'title'     => __( 'Right Sidebar', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/right-sidebar.png'
                    ),
                    'left-sidebar'  => array(
                        'title'     => __( 'Left Sidebar', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/left-sidebar.png'
                    ),
                    'both-sidebar'  => array(
                        'title'     => __( 'Both Sidebar', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/both-sidebar.png'
                    ),
                    'no-sidebar'  => array(
                        'title'     => __( 'No Sidebar', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/no-sidebar.png'
                    ),
                    'no-sidebar-center'  => array(
                        'title'     => __( 'No Sidebar Center', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/no-sidebar-center.png'
                    )
                )
            );

            return $sidebar_layouts;

        }

    endif;

    

    if ( ! function_exists( 'ogma_news_scroll_top_arrow_choices' ) ) :

        /**
         * function to return choices of scroll top arrow.
         *
         * @since 1.0.0
         */
        function ogma_news_scroll_top_arrow_choices() {

            $scroll_top_arrow = apply_filters( 'ogma_news_scroll_top_arrow_choices',
                array(
                    'bx-up-arrow-alt'  => array(
                        'title' => __( 'Arrow 1', 'ogma-news' ),
                        'icon'  => 'bx bx-up-arrow-alt'
                    ),
                    'bx-chevron-up'  => array(
                        'title' => __( 'Arrow 2', 'ogma-news' ),
                        'icon'  => 'bx bx-chevron-up'
                    ),
                    'bx-chevrons-up'  => array(
                        'title' => __( 'Arrow 3', 'ogma-news' ),
                        'icon'  => 'bx bx-chevrons-up'
                    ),
                )
            );

            return $scroll_top_arrow;

        }

    endif;

    if ( ! function_exists( 'ogma_news_site_mode_choices' ) ) :

        /**
         * function to return choices for site mode.
         *
         * @since 1.0.0
         */
        function ogma_news_site_mode_choices() {

            $site_mode_choices = apply_filters( 'ogma_news_site_mode_choices',
                array(
                    'light-mode'    => __( 'Light', 'ogma-news' ),
                    'dark-mode'     => __( 'Dark', 'ogma-news' ),
                )
            );

            return $site_mode_choices;

        }

    endif;

    if ( ! function_exists( 'ogma_news_posts_date_style_choices' ) ) :

        /**
         * function to return choices for posts date style
         *
         * @since 1.0.0
         */
        function ogma_news_posts_date_style_choices() {

            $posts_date_style_choices = apply_filters( 'ogma_news_posts_date_style_choices',
                array(
                    'publish'   => __( 'Published date', 'ogma-news' ),
                    'modify'    => __( 'Updated date', 'ogma-news' )
                )
            );

            return $posts_date_style_choices;

        }

    endif;

    if ( ! function_exists( 'ogma_news_posts_date_format_choices' ) ) :

        /**
         * function to return choices for posts date format
         *
         * @since 1.0.0
         */
        function ogma_news_posts_date_format_choices() {

            $posts_date_format_choices = apply_filters( 'ogma_news_posts_date_format_choices',
                array(
                    'default'       => __( 'Default by WordPress', 'ogma-news' ),
                    'format_one'    => __( 'Theme Format One', 'ogma-news' )
                )
            );

            return $posts_date_format_choices;

        }

    endif;

    if ( ! function_exists( 'ogma_news_posts_thumbnail_hover_effect_choices' ) ) :

        /**
         * function to return choices for posts thumbnail hover effect
         *
         * @since 1.0.0
         */
        function ogma_news_posts_thumbnail_hover_effect_choices() {

            $posts_thumb_effect_choices = apply_filters( 'ogma_news_posts_thumbnail_hover_effect_choices',
                array(
                    'none'              => __( 'None', 'ogma-news' ),
                    'hover-effect--one' => __( 'Hover Effect One', 'ogma-news' ),
                )
            );

            return $posts_thumb_effect_choices;

        }

    endif;

    if ( ! function_exists( 'ogma_news_site_breadcrumb_types_choices' ) ) :

        /**
         * function to return choices for site breadcrumb types
         *
         * @since 1.0.0
         */
        function ogma_news_site_breadcrumb_types_choices() {

            $breadcrumb_types_choices = apply_filters( 'ogma_news_site_breadcrumb_types_choices',
                array(
                    'default'   => __( 'Default', 'ogma-news' ),
                    'navxt'     => __( 'NavXT', 'ogma-news' ),
                    'yoast'     => __( 'Yoast SEO', 'ogma-news' ),
                    'rankmath'  => __( 'Rank Math', 'ogma-news' )
                )
            );

            return $breadcrumb_types_choices;

        }

    endif;
    

    

/*---------------------------------- Header Panel Choices --------------------------------------*/

    if ( ! function_exists( 'ogma_news_header_top_area_tabs_choices' ) ) :

        /**
         * function to return choices for header top area tab fields.
         *
         * @since 1.0.0
         */
        function ogma_news_header_top_area_tabs_choices() {

            $header_top_tab_fields = apply_filters( 'ogma_news_header_top_area_tabs_choices',
                array(
                    'general'   => array(
                        'title'     => __( 'General', 'ogma-news' ),
                        'fields'    => array(
                            'ogma_news_header_top_enable',
                            'ogma_news_header_top_date_enable',
                            'ogma_news_header_top_date_format',
                            'ogma_news_header_top_menu_enable',
                            'ogma_news_header_social_enable',
                            'ogma_news_header_social_redirect'
                        )
                    ),
                    'design'    => array(
                        'title' => __( 'Design', 'ogma-news' ),
                        'fields'    => array(
                            'ogma_news_header_top_bg_color',
                        )
                    )
                )
            );

            return $header_top_tab_fields;

        }

    endif;

    if ( ! function_exists( 'ogma_news_header_top_date_format_choices' ) ) :

        /**
         * function to return choices for header top date format.
         *
         * @since 1.0.0
         */
        function ogma_news_header_top_date_format_choices() {

            $header_top_tab_fields = apply_filters( 'ogma_news_header_top_date_format_choices',
                array(
                    'date_format_1' => __( '01 Jan, 2023', 'ogma-news' ),
                    'date_format_2' => __( '01 January, 2023', 'ogma-news' ),
                )
            );

            return $header_top_tab_fields;

        }

    endif;

    if ( ! function_exists( 'ogma_news_header_main_area_tabs_choices' ) ) :

        /**
         * function to return choices for header main area tab fields.
         *
         * @since 1.0.0
         */
        function ogma_news_header_main_area_tabs_choices() {

            $header_main_tab_fields = apply_filters( 'ogma_news_header_main_area_tabs_choices',
                array(
                    'general'   => array(
                        'title'     => __( 'General', 'ogma-news' ),
                        'fields'    => array(
                            'ogma_news_header_sticky_enable',
                            'ogma_news_divider_main_area_one',
                            'ogma_news_header_search_enable',
                            'ogma_news_header_site_mode_switch_enable',
                            'ogma_news_header_sticky_sidebar_toggle_enable',
                            'ogma_news_header_sticky_sidebar_redirect',
                            'ogma_news_header_custom_button_heading',
                            'ogma_news_header_custom_button_label',
                            'ogma_news_header_custom_button_link',
                        )
                    ),
                    'design'    => array(
                        'title' => __( 'Design', 'ogma-news' ),
                        'fields'    => array(
                            'ogma_news_header_main_area_layout',
                            'ogma_news_header_main_bg_type',
                            'ogma_news_header_main_bg_color',
                            'ogma_news_header_main_bg_image'
                        )
                    )
                )
            );

            return $header_main_tab_fields;

        }

    endif;

    if ( ! function_exists( 'ogma_news_header_main_area_layout_choices' ) ) :

        /**
         * function to return choices for header main area layouts.
         *
         * @since 1.0.0
         */
        function ogma_news_header_main_area_layout_choices() {

            $header_main_layout = apply_filters( 'ogma_news_header_main_area_layout_choices',
                array(
                    'header-main-layout--one'   => array(
                        'title'     => __( 'Layout 1', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/header-layout-one.png'
                    ),
                    'header-main-layout--two'   => array(
                        'title'     => __( 'Layout 2', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/header-layout-two.png'
                    )
                )
            );

            return $header_main_layout;

        }

    endif;

    if ( ! function_exists( 'ogma_news_bg_type_choices' ) ) :

        /**
         * function to return choices for background type.
         *
         * @since 1.0.0
         */
        function ogma_news_bg_type_choices() {

            $bg_types = apply_filters( 'ogma_news_bg_type_choices',
                array(
                    'bg-none'   => __( 'None', 'ogma-news' ),
                    'bg-color'  => __( 'Color', 'ogma-news' ),
                    'bg-image'  => __( 'Image', 'ogma-news' ),
                )
            );

            return $bg_types;

        }

    endif;

    

/*---------------------------------- Frontpage Panel Choices -----------------------------------*/

    if ( ! function_exists( 'ogma_news_frontpage_banner_tabs_choices' ) ) :

        /**
         * function to return choices for frontpage banner tab fields.
         *
         * @since 1.0.0
         */
        function ogma_news_frontpage_banner_tabs_choices() {

            $frontpage_banner_tab_fields = apply_filters( 'ogma_news_frontpage_banner_tabs_choices',
                array(
                    'general'   => array(
                        'title'     => __( 'General', 'ogma-news' ),
                        'fields'    => array(
                            'ogma_news_frontpage_banner_layout',
                            'ogma_news_banner_slider_heading',
                            'ogma_news_banner_slider_category',
                            'ogma_news_banner_slider_order_by',
                            'ogma_news_banner_slider_date_filter',
                            'ogma_news_banner_block_heading',
                            'ogma_news_banner_timeline_heading',
                            'ogma_news_banner_timeline_title',
                            'ogma_news_banner_block_category',
                            'ogma_news_banner_block_order_by',
                            'ogma_news_banner_tab_heading',
                            'ogma_news_banner_tab_label_latest',
                            'ogma_news_banner_tab_label_popular',
                            'ogma_news_banner_tab_label_trending',
                            'ogma_news_banner_tab_trending_category',
                            'ogma_news_banner_reorder_heading',
                            'ogma_news_banner_one_column_reorder',
                            'ogma_news_banner_two_column_reorder',
                        )
                    ),
                    'design'    => array(
                        'title' => __( 'Design', 'ogma-news' ),
                        'fields'    => array(
                            'ogma_news_banner_bg_type',
                            'ogma_news_banner_bg_color',
                            'ogma_news_banner_bg_image'
                        )
                    )
                )
            );

            return $frontpage_banner_tab_fields;

        }

    endif;

    if ( ! function_exists( 'ogma_news_frontpage_banner_layout_choices' ) ) :

        /**
         * function to return choices of frontpage banner layout.
         *
         * @since 1.0.0
         */
        function ogma_news_frontpage_banner_layout_choices() {

            $frontpage_banner_layout = apply_filters( 'ogma_news_frontpage_banner_layout_choices',
                array(
                    'frontpage-banner-layout--one'  => array(
                        'title'     => __( 'Layout 1', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/banner-layout-one.png'
                    ),
                    'frontpage-banner-layout--two'  => array(
                        'title'     => __( 'Layout 2', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/banner-layout-two.png'
                    )
                )
            );

            return $frontpage_banner_layout;

        }

    endif;

    if ( ! function_exists( 'ogma_news_posts_order_by_choices' ) ) :

        /**
         * function to return choices of posts order by.
         *
         * @since 1.0.0
         */
        function ogma_news_posts_order_by_choices() {

            $posts_order_by = apply_filters( 'ogma_news_posts_order_by_choices',
                array(
                    'date-desc'     => __( 'Newest - Oldest', 'ogma-news' ),
                    'date-asc'      => __( 'Oldest - Newest', 'ogma-news' ),
                    'title-asc'     => __( 'A - Z', 'ogma-news' ),
                    'title-desc'    => __( 'Z - A', 'ogma-news' ),
                    'rand-desc'     => __( 'Random', 'ogma-news' ),
                )
            );

            return $posts_order_by;

        }

    endif;

    if ( ! function_exists( 'ogma_news_posts_date_filter_choices' ) ) :

        /**
         * function to return choices of posts date filter.
         *
         * @since 1.0.0
         */
        function ogma_news_posts_date_filter_choices() {

            $posts_date_filter = apply_filters( 'ogma_news_posts_date_filter_choices',
                array(
                    'all'           => __( 'All', 'ogma-news' ),
                    'today'         => __( 'Today', 'ogma-news' ),
                    'this-week'     => __( 'This Week', 'ogma-news' ),
                    'last-week'     => __( 'Last Week', 'ogma-news' ),
                    'this-month'    => __( 'This Month', 'ogma-news' ),
                    'last-month'    => __( 'Last Month', 'ogma-news' )
                )
            );

            return $posts_date_filter;

        }

    endif;

    if ( ! function_exists( 'ogma_news_banner_one_column_reorder_choices' ) ) :

        /**
         * function to return choices of banner one column re-order.
         *
         * @since 1.0.0
         */
        function ogma_news_banner_one_column_reorder_choices() {

            $column_reorder_one = apply_filters( 'ogma_news_banner_one_column_reorder_choices',
                array(
                    'block'     => __( 'Block', 'ogma-news' ),
                    'slider'    => __( 'Slider', 'ogma-news' ),
                    'timeline'  => __( 'Timeline', 'ogma-news' )
                )
            );

            return $column_reorder_one;

        }

    endif;

    if ( ! function_exists( 'ogma_news_banner_two_column_reorder_choices' ) ) :

        /**
         * function to return choices of banner two column re-order.
         *
         * @since 1.0.0
         */
        function ogma_news_banner_two_column_reorder_choices() {

            $column_reorder_two = apply_filters( 'ogma_news_banner_two_column_reorder_choices',
                array(
                    'slider'    => __( 'Slider', 'ogma-news' ),
                    'tab'       => __( 'Tab', 'ogma-news' )
                )
            );

            return $column_reorder_two;

        }

    endif;

    if ( ! function_exists( 'ogma_news_section_bg_type_choices' ) ) :

        /**
         * function to return choices of section background type.
         *
         * @since 1.0.0
         */
        function ogma_news_section_bg_type_choices() {

            $section_bg_type = apply_filters( 'ogma_news_section_bg_type_choices',
                array(
                    'color'   => __( 'Background Color', 'ogma-news' ),
                    'image'   => __( 'Background Image', 'ogma-news' )
                )
            );

            return $section_bg_type;

        }

    endif;

/*---------------------------------- Innerpage Panel Choices -----------------------------------*/

    if ( ! function_exists( 'ogma_news_archive_page_style_choices' ) ) :

        /**
         * function to return choices for archive page style.
         *
         * @since 1.0.0
         */
        function ogma_news_archive_page_style_choices() {

            $ogma_news_archive_page_style = apply_filters( 'ogma_news_archive_page_style_choices',
                array(
                    'archive-style--classic'  => __( 'Classic', 'ogma-news' ),
                    'archive-style--grid'     => __( 'Grid', 'ogma-news' ),
                    'archive-style--list'     => __( 'List', 'ogma-news' )
                )
            );

            return $ogma_news_archive_page_style;

        }

    endif;

    if ( ! function_exists( 'ogma_news_single_posts_layout_choices' ) ) :

        /**
         * function to return choices of single posts layout.
         *
         * @since 1.0.0
         */
        function ogma_news_single_posts_layout_choices() {

            $posts_layout = apply_filters( 'ogma_news_single_posts_layout_choices',
                array(
                    'posts-layout--one'  => array(
                        'title'     => __( 'Layout 1', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/single-layout-one.png'
                    ),
                    'posts-layout--two'  => array(
                        'title'     => __( 'Layout 2', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/single-layout-two.png'
                    )
                )
            );

            return $posts_layout;

        }

    endif;

/*---------------------------------- Footer Panel Choices -----------------------------------*/

    if ( ! function_exists( 'ogma_news_footer_widget_area_layout_choices' ) ) :

        /**
         * function to return choices of footer widget layout.
         *
         * @since 1.0.0
         */
        function ogma_news_footer_widget_area_layout_choices() {

            $posts_layout = apply_filters( 'ogma_news_footer_widget_area_layout_choices',
                array(
                    'column-one'  => array(
                        'title'     => __( 'Layout 1', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/footer-1.png'
                    ),
                    'column-two'  => array(
                        'title'     => __( 'Layout 2', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/footer-2.png'
                    ),
                    'column-three'  => array(
                        'title'     => __( 'Layout 2', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/footer-3.png'
                    ),
                    'column-four'  => array(
                        'title'     => __( 'Layout 2', 'ogma-news' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/footer-4.png'
                    )
                )
            );

            return $posts_layout;

        }

    endif;

    

    

/*---------------------------------- Upgrade Control Choices -----------------------------------*/
    
    if ( ! function_exists( 'ogma_news_upgrade_choices' ) ) :

        /**
         * function to return choices for upgrade to pro.
         *
         * @since 1.0.0
         */
        function ogma_news_upgrade_choices( $setting_id ) {

            $upgrade_info_lists = array(
                'preloader'     => array( __( '15+ Styles', 'ogma-news' ), __( 'Color options', 'ogma-news' ), __( 'Device visibility', 'ogma-news' ) ),
                'social_icon'   => array( __( 'Add unlimited social icons field.', 'ogma-news' ), __( 'More icons with official color.', 'ogma-news' ), __( 'Device visibility', 'ogma-news' ) ),
                'typography'    => array( __( '950+ Google Fonts', 'ogma-news' ), __( 'Adjustable font size', 'ogma-news' ), __( 'Font Color Option', 'ogma-news' ) ),
                'breadcrumb'    => array( __( 'Device visibility', 'ogma-news' ), __( 'Typography Option', 'ogma-news' ), __( 'Color Option', 'ogma-news' ) ),
                'scroll_top'    => array( __( '10+ Arrow Icons', 'ogma-news' ), __( 'Alignment Options', 'ogma-news' ), __( 'Device visibility', 'ogma-news' ), __( 'Color Option', 'ogma-news' ) ),
                'header_main'    => array( __( '2 more layouts', 'ogma-news' ), __( 'Extra option for Custom Buttom', 'ogma-news' ) ),
                'primary_menu'    => array( __( 'Hover Effects', 'ogma-news' ), __( 'Typography Options', 'ogma-news' ), __( 'Color Options', 'ogma-news' ) ),
                'ticker'    => array( __( '3 More Ticker Icons', 'ogma-news' ), __( 'Multiple Categories Option', 'ogma-news' ), __( '2 More Layouts', 'ogma-news' ), __( 'Color Options', 'ogma-news' ) ),
                'main_banner'    => array( __( '4 More Layouts', 'ogma-news' ), __( 'Multiple Categories Option', 'ogma-news' ), __( 'Extra option for slider control.', 'ogma-news' ) ),
                'archive' => array( __( '3 More Post Layouts', 'ogma-news' ), __( 'Different Pagination Types', 'ogma-news' ), __( 'Post Element/Meta Re-Order.', 'ogma-news' ) ),
                'single_post' => array( __( '5 More Post Layouts', 'ogma-news' ), __( 'Post Element/Meta Re-Order.', 'ogma-news' ),  __( '2 More author box layout', 'ogma-news' ),  __( 'Extra options for post navigation', 'ogma-news' ), __( '3 More Layout for related posts', 'ogma-news' ), __( 'Extra options for related posts section', 'ogma-news' ) ),
                'error_page' => array( __( '3 More Page Layouts', 'ogma-news' ), __( 'Blank Page Option', 'ogma-news' ),  __( 'Button Color', 'ogma-news' ) ),

            );

           // $get_setting_upgrade_choices = upgrade_info_for_setting_id( $setting_id );

            $setting_id = explode( 'ogma_news_', $setting_id );
            $setting_id = $setting_id[1];

            return $upgrade_info_lists[$setting_id];

        }

    endif;

    

    