<?php
/**
 * Add Top Fullwidth section and it's fields inside Frontpage Settings panel.
 * 
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_news_register_top_fullwidth_options' );

if ( ! function_exists( 'ogma_news_register_top_fullwidth_options' ) ) :

    /**
     * Register theme options for Top Fullwidth section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_news_register_top_fullwidth_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Top Fullwidth Section
         * 
         * Frontpage Settings > Top Fullwidth
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new ogma_news_Customize_Section (
            $wp_customize, 'ogma_news_section_top_fullwidth',
                array(
                    'priority'  => 10,
                    'panel'     => 'ogma_news_panel_frontpage',
                    'title'     => __( 'Top Fullwidth', 'ogma-news' ),
                )
            )
        );

        /**
         * Block Repeater field for Top Fullwidth
         *
         * Frontpage Settings > Top Fullwidth
         * 
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_front_top_fullwidth_blocks',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_front_top_fullwidth_blocks' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Blocks_Repeater(
            $wp_customize, 'ogma_news_front_top_fullwidth_blocks',
                array(
                    'label'       => esc_html__( 'Full Width Section Blocks', 'ogma-news' ),
                    'section'     => 'ogma_news_section_top_fullwidth',
                    'settings'    => 'ogma_news_front_top_fullwidth_blocks',
                    'priority'      => 10
                )
            )
        );
        

    }

endif;