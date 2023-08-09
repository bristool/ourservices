<?php
/**
 * Add Preloader section and it's fields inside General Settings panel.
 * 
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_news_register_preloader_options' );

if ( ! function_exists( 'ogma_news_register_preloader_options' ) ) :

    /**
     * Register theme options for Preloader section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_news_register_preloader_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Site Style Section
         * 
         * General Settings > Preloader
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new ogma_news_Customize_Section (
            $wp_customize, 'ogma_news_section_preloader',
                array(
                    'priority'              => 20,
                    'panel'                 => 'ogma_news_panel_general',
                    'title'                 => __( 'Preloader', 'ogma-news' ),
                )
            )
        );

        /**
         * Toggle option for preloader.
         *
         * General Settings > Preloader
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_preloader_enable',
            array(
                'default'           => ogma_news_get_customizer_default ( 'ogma_news_preloader_enable' ),
                'sanitize_callback' => 'ogma_news_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Toggle(
            $wp_customize, 'ogma_news_preloader_enable',
                array(
                    'priority'      => 10,
                    'section'       => 'ogma_news_section_preloader',
                    'settings'      => 'ogma_news_preloader_enable',
                    'label'         => __( 'Enable Preloader', 'ogma-news' )
                )
            )
        );

        /**
         * Radio image field for preloader styles
         *
         * General Settings > Preloader
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_preloader_style',
            array(
                'default'           => ogma_news_get_customizer_default ( 'ogma_news_preloader_style' ),
                'sanitize_callback' => 'ogma_news_sanitize_select',
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Radio_Image(
            $wp_customize, 'ogma_news_preloader_style',
                array(
                    'priority'          => 20,
                    'section'           => 'ogma_news_section_preloader',
                    'settings'          => 'ogma_news_preloader_style',
                    'label'             => __( 'Preloader Layout', 'ogma-news' ),
                    'choices'           => ogma_news_preloader_style_choices(),
                    'input_attrs'       => array(
                        'column'    => 4,
                    ),
                    'active_callback'   => 'ogma_news_cb_has_enable_preloader'
                )
            )
        );

        /**
         * Upgrade field for preloader section
         * 
         * General Settings > Preloader
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'upgrade_preloader',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Upgrade(
            $wp_customize, 'upgrade_preloader',
                array(
                    'priority'      => 70,
                    'section'       => 'ogma_news_section_preloader',
                    'settings'      => 'upgrade_preloader',
                    'label'         => __( 'More features with Ogma Pro', 'ogma-news' ),
                    'choices'       => ogma_news_upgrade_choices( 'ogma_news_preloader' )
                )
            )
        );

    }

endif;