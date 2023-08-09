<?php
/**
 * Add Advertisement section and it's fields inside Header Settings panel.
 * 
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_news_register_header_ads_options' );

if ( ! function_exists( 'ogma_news_register_header_ads_options' ) ) :

    /**
     * Register theme options for Advertisement section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_news_register_header_ads_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Advertisement Section
         * 
         * Header Settings > Advertisement
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new ogma_news_Customize_Section (
            $wp_customize, 'ogma_news_section_header_ads',
                array(
                    'priority'  => 30,
                    'panel'     => 'ogma_news_panel_header',
                    'title'     => __( 'Advertisement', 'ogma-news' ),
                )
            )
        );

        /**
         * Image field for header ads
         *
         * Header Settings > Advertisement
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_header_ads_image',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_header_ads_image' ),
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control( new WP_Customize_Cropped_Image_Control(
            $wp_customize, 'ogma_news_header_ads_image',
                array(
                    'priority'          => 10,
                    'section'           => 'ogma_news_section_header_ads',
                    'settings'          => 'ogma_news_header_ads_image',
                    'label'             => __( 'Advertisement Image', 'ogma-news' ),
                    'height'			=> 90,
                    'width'				=> 728,
                    'flex_width'		=>true,
					'flex_height'		=>true,
                )
            )
        );

        /**
         * Url field for header ads link
         *
         * Header Settings > Advertisement
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_header_ads_image_link',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_header_ads_image_link' ),
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_control( 'ogma_news_header_ads_image_link',
            array(
                'priority'          => 20,
                'section'           => 'ogma_news_section_header_ads',
                'settings'          => 'ogma_news_header_ads_image_link',
                'label'             => __( 'Image Url', 'ogma-news' ),
                'type'              => 'url',
            )
        );

    }

endif;