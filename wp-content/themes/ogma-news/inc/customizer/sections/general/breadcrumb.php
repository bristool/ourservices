<?php
/**
 * Add Breadcrumb section and it's fields inside General Settings panel.
 * 
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_news_register_breadcrumb_options' );

if ( ! function_exists( 'ogma_news_register_breadcrumb_options' ) ) :

    /**
     * Register theme options for Breadcrumb section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_news_register_breadcrumb_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Breadcrumb Section
         * 
         * General Settings > Breadcrumb
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new ogma_news_Customize_Section (
            $wp_customize, 'ogma_news_section_breadcrumb',
                array(
                    'priority'  => 35,
                    'panel'     => 'ogma_news_panel_general',
                    'title'     => __( 'Breadcrumb', 'ogma-news' ),
                )
            )
        );

        /**
         * Toggle option for breadcrumb content
         *
         * General Settings > Breadcrumb
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_site_breadcrumb_enable',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_site_breadcrumb_enable' ),
                'sanitize_callback' => 'ogma_news_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Toggle(
            $wp_customize, 'ogma_news_site_breadcrumb_enable',
                array(
                    'priority'      => 10,
                    'section'       => 'ogma_news_section_breadcrumb',
                    'settings'      => 'ogma_news_site_breadcrumb_enable',
                    'label'         => __( 'Enable Breadcrumb Trial', 'ogma-news' )
                )
            )
        );

        /**
         * Select field for breadcrumb types
         */
        $wp_customize->add_setting( 'ogma_news_site_breadcrumb_types',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_site_breadcrumb_types' ),
                'sanitize_callback' => 'ogma_news_sanitize_select'
            )
        );
        $wp_customize->add_control( 'ogma_news_site_breadcrumb_types',
            array(
                'priority'          => 15,
                'section'           => 'ogma_news_section_breadcrumb',
                'settings'          => 'ogma_news_site_breadcrumb_types',
                'label'             => __( 'Breadcrumb Types', 'ogma-news' ),
                'type'              => 'select',
                'choices'           => ogma_news_site_breadcrumb_types_choices(),
                'active_callback'   => 'ogma_news_has_enable_site_breadcrumb_callback',
            )
        );

        /**
         * Upgrade field for breadcrumb
         * 
         * General Settings > Breadcrumb
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'upgrade_breadcrumb',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Upgrade(
            $wp_customize, 'upgrade_breadcrumb',
                array(
                    'priority'      => 70,
                    'section'       => 'ogma_news_section_breadcrumb',
                    'settings'      => 'upgrade_breadcrumb',
                    'label'         => __( 'More Features with Ogma Pro', 'ogma-news' ),
                    'choices'       => ogma_news_upgrade_choices( 'ogma_news_breadcrumb' )
                )
            )
        );

    }

endif;