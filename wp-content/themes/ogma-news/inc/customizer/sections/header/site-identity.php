<?php
/**
 * Add fields for site identity section inside Header Settings panel.
 * 
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_news_register_site_identity_options' );

if ( ! function_exists( 'ogma_news_register_site_identity_options' ) ) :

    /**
     * Register theme options for Site Identity section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_news_register_site_identity_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Tabs field for site style section
         *
         * Header Settings > Site Identity
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'site_identity_tabs',
            array(
                'default'           => ogma_news_get_customizer_default( 'site_identity_tabs' ),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Tabs(
            $wp_customize, 'site_identity_tabs',
                array(
                    'priority'      => 5,
                    'section'       => 'title_tagline',
                    'settings'      => 'site_identity_tabs',
                    'choices'       => array(
                        'general'   => array(
                            'title'     => __( 'General', 'ogma-news' ),
                            'fields'    => array(
                                'custom_logo',
                                'blogname',
                                'blogdescription',
                                'display_header_text',
                                'site_icon',

                            )
                        ),
                        'design'    => array(
                            'title' => __( 'Design', 'ogma-news' ),
                            'fields'    => array(
                                'header_textcolor'
                            )
                        )
                    )
                )
            )
        );

        

    }

endif;
