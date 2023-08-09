<?php
/**
 * Add Banner section and it's fields inside Frontpage Settings panel.
 * 
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_news_register_frontpage_banner_options' );

if ( ! function_exists( 'ogma_news_register_frontpage_banner_options' ) ) :

    /**
     * Register theme options for Banner section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_news_register_frontpage_banner_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Banner Section
         * 
         * Frontpage Settings > Banner
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new ogma_news_Customize_Section (
            $wp_customize, 'ogma_news_section_frontpage_banner',
                array(
                    'priority'  => 5,
                    'panel'     => 'ogma_news_panel_frontpage',
                    'title'     => __( 'Main Banner', 'ogma-news' ),
                )
            )
        );

        /**
         * Tabs field for Banner section
         *
         * Frontpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_frontpage_banner_tabs',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_frontpage_banner_tabs' ),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Tabs(
            $wp_customize, 'ogma_news_frontpage_banner_tabs',
                array(
                    'priority'      => 5,
                    'section'       => 'ogma_news_section_frontpage_banner',
                    'settings'      => 'ogma_news_frontpage_banner_tabs',
                    'choices'       => ogma_news_frontpage_banner_tabs_choices()
                )
            )
        );

        /**
         * Radio image field for banner layout
         *
         * Frontpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_frontpage_banner_layout',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_frontpage_banner_layout' ),
                'sanitize_callback' => 'ogma_news_sanitize_select',
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Radio_Image(
            $wp_customize, 'ogma_news_frontpage_banner_layout',
                array(
                    'priority'          => 15,
                    'section'           => 'ogma_news_section_frontpage_banner',
                    'settings'          => 'ogma_news_frontpage_banner_layout',
                    'label'             => __( 'Banner Layout', 'ogma-news' ),
                    'choices'           => ogma_news_frontpage_banner_layout_choices(),
                )
            )
        );

        /**
         * Heading field for banner slider settings
         *
         * Frontpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_slider_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Heading(
            $wp_customize, 'ogma_news_banner_slider_heading',
                array(
                    'priority'          => 20,
                    'section'           => 'ogma_news_section_frontpage_banner',
                    'settings'          => 'ogma_news_banner_slider_heading',
                    'label'             => __( 'Slider Settings', 'ogma-news' ),
                )
            )
        );

        /**
         * Select option of category for slider posts
         *
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_slider_category',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_banner_slider_category' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Dropdown_Categories(
            $wp_customize, 'ogma_news_banner_slider_category',
                array(
                    'priority'          => 25,
                    'section'           => 'ogma_news_section_frontpage_banner',
                    'settings'          => 'ogma_news_banner_slider_category',
                    'label'             => __( 'Slider Category', 'ogma-news' ),
                )
            )
        );

        /**
         * Select option for slider posts order by
         *
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_slider_order_by',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_banner_slider_order_by' ),
                'sanitize_callback' => 'ogma_news_sanitize_select'
            )
        );
        $wp_customize->add_control( 'ogma_news_banner_slider_order_by',
            array(
                'priority'          => 30,
                'section'           => 'ogma_news_section_frontpage_banner',
                'settings'          => 'ogma_news_banner_slider_order_by',
                'label'             => __( 'Posts Order By', 'ogma-news' ),
                'type'              => 'select',
                'choices'           => ogma_news_posts_order_by_choices(),
            )
        );

        /**
         * Select option for slider posts date filter
         *
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_slider_date_filter',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_banner_slider_date_filter' ),
                'sanitize_callback' => 'ogma_news_sanitize_select'
            )
        );
        $wp_customize->add_control( 'ogma_news_banner_slider_date_filter',
            array(
                'priority'          => 35,
                'section'           => 'ogma_news_section_frontpage_banner',
                'settings'          => 'ogma_news_banner_slider_date_filter',
                'label'             => __( 'Posts Date Filter', 'ogma-news' ),
                'type'              => 'select',
                'choices'           => ogma_news_posts_date_filter_choices(),
            )
        );

        /**
         * Heading field for banner block settings
         *
         * Frontpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_block_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Heading(
            $wp_customize, 'ogma_news_banner_block_heading',
                array(
                    'priority'          => 40,
                    'section'           => 'ogma_news_section_frontpage_banner',
                    'settings'          => 'ogma_news_banner_block_heading',
                    'label'             => __( 'Block Settings', 'ogma-news' ),
                    'active_callback'   => 'ogma_news_cb_has_banner_layout_one'
                )
            )
        );

        /**
         * Select option of category for block posts
         *
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_block_category',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_banner_block_category' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Dropdown_Categories(
            $wp_customize, 'ogma_news_banner_block_category',
                array(
                    'priority'          => 50,
                    'section'           => 'ogma_news_section_frontpage_banner',
                    'settings'          => 'ogma_news_banner_block_category',
                    'label'             => __( 'Block Category', 'ogma-news' ),
                    'active_callback'   => 'ogma_news_cb_has_banner_layout_one'
                )
            )
        );

        /**
         * Select option for block posts order by
         *
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_block_order_by',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_banner_block_order_by' ),
                'sanitize_callback' => 'ogma_news_sanitize_select'
            )
        );
        $wp_customize->add_control( 'ogma_news_banner_block_order_by',
            array(
                'priority'          => 55,
                'section'           => 'ogma_news_section_frontpage_banner',
                'settings'          => 'ogma_news_banner_block_order_by',
                'label'             => __( 'Posts Order By', 'ogma-news' ),
                'type'              => 'select',
                'choices'           => ogma_news_posts_order_by_choices(),
                'active_callback'   => 'ogma_news_cb_has_banner_layout_one'
            )
        );

        /**
         * Heading field for banner tab settings
         *
         * Frontpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_tab_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Heading(
            $wp_customize, 'ogma_news_banner_tab_heading',
                array(
                    'priority'          => 60,
                    'section'           => 'ogma_news_section_frontpage_banner',
                    'settings'          => 'ogma_news_banner_tab_heading',
                    'label'             => __( 'Tab Settings', 'ogma-news' ),
                    'active_callback'   => 'ogma_news_cb_has_banner_layout_two'
                )
            )
        );

        /**
         * Text field for latest tab label
         *
         * Frontpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_tab_label_latest',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_banner_tab_label_latest' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( 'ogma_news_banner_tab_label_latest',
            array(
                'priority'          => 70,
                'section'           => 'ogma_news_section_frontpage_banner',
                'settings'          => 'ogma_news_banner_tab_label_latest',
                'label'             => __( 'Latest Tab', 'ogma-news' ),
                'type'              => 'text',
                'active_callback'   => 'ogma_news_cb_has_banner_layout_two'
            )
        );

        /**
         * Text field for popular tab label
         *
         * Frontpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_tab_label_popular',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_banner_tab_label_popular' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( 'ogma_news_banner_tab_label_popular',
            array(
                'priority'          => 75,
                'section'           => 'ogma_news_section_frontpage_banner',
                'settings'          => 'ogma_news_banner_tab_label_popular',
                'label'             => __( 'Popular Tab', 'ogma-news' ),
                'description'       => __( 'Popular posts will be listed by comment count.', 'ogma-news' ),
                'type'              => 'text',
                'active_callback'   => 'ogma_news_cb_has_banner_layout_two'
            )
        );

        /**
         * Text field for trending tab label
         *
         * Frontpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_tab_label_trending',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_banner_tab_label_trending' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( 'ogma_news_banner_tab_label_trending',
            array(
                'priority'          => 80,
                'section'           => 'ogma_news_section_frontpage_banner',
                'settings'          => 'ogma_news_banner_tab_label_trending',
                'label'             => __( 'Trending Tab', 'ogma-news' ),
                'type'              => 'text',
                'active_callback'   => 'ogma_news_cb_has_banner_layout_two'
            )
        );

        /**
         * Select option of category for trending tab
         *
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_tab_trending_category',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_banner_tab_trending_category' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Dropdown_Categories(
            $wp_customize, 'ogma_news_banner_tab_trending_category',
                array(
                    'priority'          => 85,
                    'section'           => 'ogma_news_section_frontpage_banner',
                    'settings'          => 'ogma_news_banner_tab_trending_category',
                    'label'             => __( 'Trending Category', 'ogma-news' ),
                    'active_callback'   => 'ogma_news_cb_has_banner_layout_two'
                )
            )
        );

        /**
         * Heading field for banner timeline settings
         *
         * Frontpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_timeline_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Heading(
            $wp_customize, 'ogma_news_banner_timeline_heading',
                array(
                    'priority'          => 90,
                    'section'           => 'ogma_news_section_frontpage_banner',
                    'settings'          => 'ogma_news_banner_timeline_heading',
                    'label'             => __( 'Timeline Settings', 'ogma-news' ),
                    'active_callback'   => 'ogma_news_cb_has_banner_layout_one'
                )
            )
        );

        /**
         * Text field for banner timeline
         *
         * Frontpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_timeline_title',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_banner_timeline_title' ),
                'sanitize_callback' => 'ogma_news_sanitize_title'
            )
        );
        $wp_customize->add_control( 'ogma_news_banner_timeline_title',
            array(
                'priority'          => 95,
                'section'           => 'ogma_news_section_frontpage_banner',
                'settings'          => 'ogma_news_banner_timeline_title',
                'label'             => __( 'Section Title', 'ogma-news' ),
                'type'              => 'text',
                'active_callback'   => 'ogma_news_cb_has_banner_layout_one'
            )
        );

        /**
         * Heading field for column reorder settings
         *
         * Frontpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_reorder_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Heading(
            $wp_customize, 'ogma_news_banner_reorder_heading',
                array(
                    'priority'          => 100,
                    'section'           => 'ogma_news_section_frontpage_banner',
                    'settings'          => 'ogma_news_banner_reorder_heading',
                    'label'             => __( 'Column Reorder', 'ogma-news' ),
                )
            )
        );

        /**
         * Sortable field for banner column re-order
         *
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_one_column_reorder',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_banner_one_column_reorder' ),
                'sanitize_callback' => 'ogma_news_sanitize_sortable'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Sortable(
            $wp_customize, 'ogma_news_banner_one_column_reorder',
                array(
                    'priority'          => 105,
                    'section'           => 'ogma_news_section_frontpage_banner',
                    'settings'          => 'ogma_news_banner_one_column_reorder',
                    'label'             => __( 'Banner Column Re-order', 'ogma-news' ),
                    'choices'           => ogma_news_banner_one_column_reorder_choices(),
                    'active_callback'   => 'ogma_news_cb_has_banner_layout_one'
                )
            )
        );

        /**
         * Sortable field for banner column re-order
         *
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_two_column_reorder',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_banner_two_column_reorder' ),
                'sanitize_callback' => 'ogma_news_sanitize_sortable'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Sortable(
            $wp_customize, 'ogma_news_banner_two_column_reorder',
                array(
                    'priority'          => 110,
                    'section'           => 'ogma_news_section_frontpage_banner',
                    'settings'          => 'ogma_news_banner_two_column_reorder',
                    'label'             => __( 'Banner Column Re-order', 'ogma-news' ),
                    'choices'           => ogma_news_banner_two_column_reorder_choices(),
                    'active_callback'   => 'ogma_news_cb_has_banner_layout_two'
                )
            )
        );

        /**
         * Select option for banner background option
         *
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_bg_type',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_banner_bg_type' ),
                'sanitize_callback' => 'ogma_news_sanitize_select'
            )
        );
        $wp_customize->add_control( 'ogma_news_banner_bg_type',
            array(
                'priority'          => 150,
                'section'           => 'ogma_news_section_frontpage_banner',
                'settings'          => 'ogma_news_banner_bg_type',
                'label'             => __( 'Banner Background Type', 'ogma-news' ),
                'type'              => 'select',
                'choices'           => ogma_news_bg_type_choices(),
            )
        );

        /**
         * Color Picker field for banner background color
         * 
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_bg_color',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_banner_bg_color' ),
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize, 'ogma_news_banner_bg_color',
                array(
                    'priority'          => 155,
                    'section'           => 'ogma_news_section_frontpage_banner',
                    'settings'          => 'ogma_news_banner_bg_color',
                    'label'             => __( 'Background Color', 'ogma-news' ),
                    'active_callback'   => 'ogma_news_cb_has_banner_bg_type_color'
                )
            )
        );

        /**
         * Image field for background image in banner section
         *
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_banner_bg_image',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_banner_bg_image' ),
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control( new WP_Customize_Cropped_Image_Control(
            $wp_customize, 'ogma_news_banner_bg_image',
                array(
                    'priority'          => 160,
                    'section'           => 'ogma_news_section_frontpage_banner',
                    'settings'          => 'ogma_news_banner_bg_image',
                    'label'             => __( 'Background Image', 'ogma-news' ),
                    'height'            => 600,
                    'width'             => 1920,
                    'flex_width'        =>true,
                    'active_callback'   => 'ogma_news_cb_has_banner_bg_type_image'
                )
            )
        );

        /**
         * Upgrade field for main banner
         * 
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'upgrade_main_banner',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Upgrade(
            $wp_customize, 'upgrade_main_banner',
                array(
                    'priority'      => 200,
                    'section'       => 'ogma_news_section_frontpage_banner',
                    'settings'      => 'upgrade_main_banner',
                    'label'         => __( 'More Features with Ogma Pro', 'ogma-news' ),
                    'choices'       => ogma_news_upgrade_choices( 'ogma_news_main_banner' )
                )
            )
        );


    }

endif;