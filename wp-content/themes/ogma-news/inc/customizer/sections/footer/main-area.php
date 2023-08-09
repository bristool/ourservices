<?php
/**
 * Footer main area fields in Footer Settings panel.
 * 
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_news_register_footer_main_options' );

if ( ! function_exists( 'ogma_news_register_footer_main_options' ) ) :

    /**
     * Register theme options for Main Area section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_news_register_footer_main_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Main Area Section
         * 
         * Footer Settings > Main Area
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new ogma_news_Customize_Section (
            $wp_customize, 'ogma_news_section_footer_main',
                array(
                    'priority'  => 10,
                    'panel'     => 'ogma_news_panel_footer',
                    'title'     => __( 'Main Area', 'ogma-news' ),
                )
            )
        );

        /**
         * Toggle option for footer main area
         *
         * Footer Settings > Main Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_footer_main_enable',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_footer_main_enable' ),
                'sanitize_callback' => 'ogma_news_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Toggle(
            $wp_customize, 'ogma_news_footer_main_enable',
                array(
                    'priority'          => 15,
                    'section'           => 'ogma_news_section_footer_main',
                    'settings'          => 'ogma_news_footer_main_enable',
                    'label'             => __( 'Enable footer main area.', 'ogma-news' )
                )
            )
        );

        /**
         * Radio image field for footer widget area layout
         *
         * Footer Settings > Main Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_footer_widget_area_layout',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_footer_widget_area_layout' ),
                'sanitize_callback' => 'ogma_news_sanitize_select',
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Radio_Image(
            $wp_customize, 'ogma_news_footer_widget_area_layout',
                array(
                    'priority'          => 20,
                    'section'           => 'ogma_news_section_footer_main',
                    'settings'          => 'ogma_news_footer_widget_area_layout',
                    'label'             => __( 'Widget Area Layout', 'ogma-news' ),
                    'choices'           => ogma_news_footer_widget_area_layout_choices(),
                    'active_callback'   => 'ogma_news_cb_has_enable_footer_main'
                )
            )
        );

    }

endif;