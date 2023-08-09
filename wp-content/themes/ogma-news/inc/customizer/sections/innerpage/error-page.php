<?php
/**
 * 404 Error and it's fields inside Innerpage Settings panel.
 * 
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_news_register_page_error_options' );

if ( ! function_exists( 'ogma_news_register_page_error_options' ) ) :

    /**
     * Register theme options for 404 Error section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_news_register_page_error_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * 404 Error Section
         * 
         * Innerpage Settings > 404 Error
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new ogma_news_Customize_Section (
            $wp_customize, 'ogma_news_section_page_error',
                array(
                    'priority'  => 35,
                    'panel'     => 'ogma_news_panel_innerpage',
                    'title'     => __( '404 Error', 'ogma-news' ),
                )
            )
        );

        /**
         * Toggle option for search form in 404 error page.
         *
         * Innerpage Settings > 404 Error
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_error_page_search_enable',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_error_page_search_enable' ),
                'sanitize_callback' => 'ogma_news_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Toggle(
            $wp_customize, 'ogma_news_error_page_search_enable',
                array(
                    'priority'          => 10,
                    'section'           => 'ogma_news_section_page_error',
                    'settings'          => 'ogma_news_error_page_search_enable',
                    'label'             => __( 'Enable Search box', 'ogma-news' )
                )
            )
        );

        /**
         * Toggle option for homepage button.
         *
         * Innerpage Settings > 404 Error
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_error_page_button_enable',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_error_page_button_enable' ),
                'sanitize_callback' => 'ogma_news_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Toggle(
            $wp_customize, 'ogma_news_error_page_button_enable',
                array(
                    'priority'          => 20,
                    'section'           => 'ogma_news_section_page_error',
                    'settings'          => 'ogma_news_error_page_button_enable',
                    'label'             => __( 'Enable homepage button', 'ogma-news' )
                )
            )
        );

        /**
         * Text field for homepage button label
         *
         * Innerpage Settings > 404 Error
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_error_page_button_label',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_error_page_button_label' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( 'ogma_news_error_page_button_label',
            array(
                'priority'          => 25,
                'section'           => 'ogma_news_section_page_error',
                'settings'          => 'ogma_news_error_page_button_label',
                'label'             => __( 'Button Label', 'ogma-news' ),
                'type'              => 'text',
                'active_callback'   => 'ogma_news_cb_has_enable_error_page_button'
            )
        );

        /**
         * Upgrade field for error page
         * 
         * Innerpage Settings > 404 Error
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'upgrade_error_page',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Upgrade(
            $wp_customize, 'upgrade_error_page',
                array(
                    'priority'      => 100,
                    'section'       => 'ogma_news_section_page_error',
                    'settings'      => 'upgrade_error_page',
                    'label'         => __( 'More Features with Ogma Pro', 'ogma-news' ),
                    'choices'       => ogma_news_upgrade_choices( 'ogma_news_error_page' )
                )
            )
        );

    }

endif;