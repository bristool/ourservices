<?php
/**
 * Add Sidebar Layout section and it's fields inside General Settings panel.
 * 
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_news_register_sidebar_layout_options' );

if ( ! function_exists( 'ogma_news_register_sidebar_layout_options' ) ) :

    /**
     * Register theme options for Sidebar Layout section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_news_register_sidebar_layout_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Sidebar Layout Section
         * 
         * General Settings > Sidebar Layout
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new ogma_news_Customize_Section (
            $wp_customize, 'ogma_news_section_sidebar_layout',
                array(
                    'priority'  => 40,
                    'panel'     => 'ogma_news_panel_general',
                    'title'     => __( 'Sidebar Layout', 'ogma-news' ),
                )
            )
        );

        /**
         * Toggle option for sidebar sticky
         *
         * General Settings > Sidebar Layout
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_sidebar_sticky_enable',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_sidebar_sticky_enable' ),
                'sanitize_callback' => 'ogma_news_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Toggle(
            $wp_customize, 'ogma_news_sidebar_sticky_enable',
                array(
                    'priority'      => 5,
                    'section'       => 'ogma_news_section_sidebar_layout',
                    'settings'      => 'ogma_news_sidebar_sticky_enable',
                    'label'         => __( 'Enable Sidebar Sticky', 'ogma-news' )
                )
            )
        );

        /**
         * Heading field for Archive / Blog Sidebar Layout
         *
         * General Settings > Sidebar Layout
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'sidebar_archive_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Heading(
            $wp_customize, 'sidebar_archive_heading',
                array(
                    'priority'      => 10,
                    'section'       => 'ogma_news_section_sidebar_layout',
                    'settings'      => 'sidebar_archive_heading',
                    'label'         => __( 'Archive/Blog Sidebar Layout', 'ogma-news' ),
                )
            )
        );

        /**
         * Radio image field for archive/blog sidebar
         *
         * General Settings > Sidebar Layout
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_archive_sidebar_layout',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_archive_sidebar_layout' ),
                'sanitize_callback' => 'ogma_news_sanitize_select',
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Radio_Image(
            $wp_customize, 'ogma_news_archive_sidebar_layout',
                array(
                    'priority'      => 15,
                    'section'       => 'ogma_news_section_sidebar_layout',
                    'settings'      => 'ogma_news_archive_sidebar_layout',
                    'choices'       => ogma_news_sidebar_layout_choices(),
                )
            )
        );

        /**
         * Heading field for Posts Sidebar Layout
         *
         * General Settings > Sidebar Layout
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'sidebar_posts_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Heading(
            $wp_customize, 'sidebar_posts_heading',
                array(
                    'priority'      => 20,
                    'section'       => 'ogma_news_section_sidebar_layout',
                    'settings'      => 'sidebar_posts_heading',
                    'label'         => __( 'Posts Sidebar Layout', 'ogma-news' ),
                )
            )
        );

        /**
         * Radio image field for posts sidebar
         *
         * General Settings > Sidebar Layout
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_posts_sidebar_layout',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_posts_sidebar_layout' ),
                'sanitize_callback' => 'ogma_news_sanitize_select',
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Radio_Image(
            $wp_customize, 'ogma_news_posts_sidebar_layout',
                array(
                    'priority'      => 25,
                    'section'       => 'ogma_news_section_sidebar_layout',
                    'settings'      => 'ogma_news_posts_sidebar_layout',
                    'choices'       => ogma_news_sidebar_layout_choices(),
                )
            )
        );

        /**
         * Heading field for Pages Sidebar Layout
         *
         * General Settings > Sidebar Layout
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'sidebar_pages_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Heading(
            $wp_customize, 'sidebar_pages_heading',
                array(
                    'priority'      => 30,
                    'section'       => 'ogma_news_section_sidebar_layout',
                    'settings'      => 'sidebar_pages_heading',
                    'label'         => __( 'Pages Sidebar Layout', 'ogma-news' ),
                )
            )
        );

        /**
         * Radio image field for posts sidebar
         *
         * General Settings > Sidebar Layout
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_pages_sidebar_layout',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_pages_sidebar_layout' ),
                'sanitize_callback' => 'ogma_news_sanitize_select',
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Radio_Image(
            $wp_customize, 'ogma_news_pages_sidebar_layout',
                array(
                    'priority'      => 35,
                    'section'       => 'ogma_news_section_sidebar_layout',
                    'settings'      => 'ogma_news_pages_sidebar_layout',
                    'choices'       => ogma_news_sidebar_layout_choices(),
                )
            )
        );



    }

endif;