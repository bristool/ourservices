<?php
/**
 * Add Middle Content section and it's fields inside Frontpage Settings panel.
 * 
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_news_register_middle_content_options' );

if ( ! function_exists( 'ogma_news_register_middle_content_options' ) ) :

    /**
     * Register theme options for Middle Content section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_news_register_middle_content_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Middle Content Section
         * 
         * Frontpage Settings > Middle Content
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new ogma_news_Customize_Section (
            $wp_customize, 'ogma_news_section_middle_content',
                array(
                    'priority'  => 15,
                    'panel'     => 'ogma_news_panel_frontpage',
                    'title'     => __( 'Middle Content', 'ogma-news' ),
                )
            )
        );

        /**
         * Redirect field for Middle Right Sidebar.
         *
         * Frontpage Settings > Middle Content
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'middle_content_right_sidebar_redirect',
            array(
                'sanitize_callback' => 'ogma_news_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Redirect(
            $wp_customize, 'middle_content_right_sidebar_redirect',
                array(
                    'priority'      => 5,
                    'section'       => 'ogma_news_section_middle_content',
                    'settings'      => 'middle_content_right_sidebar_redirect',
                    'choices'       => array(
                        'front-middle-right-sidebar' => array(
                            'type'          => 'section',
                            'type_id'       => 'sidebar-widgets-front-middle-right-sidebar',
                            'type_label'    => __( 'Manage right sidebar', 'ogma-news' )
                        )
                    )
                )
            )
        );

        /**
         * Block Repeater field for Middle Content
         *
         * Frontpage Settings > Middle Content
         * 
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_news_front_middle_content_blocks',
            array(
                'default'           => ogma_news_get_customizer_default( 'ogma_news_front_middle_content_blocks' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_News_Control_Blocks_Repeater(
            $wp_customize, 'ogma_news_front_middle_content_blocks',
                array(
                    'label'       => esc_html__( 'Middle Content Section Blocks', 'ogma-news' ),
                    'section'     => 'ogma_news_section_middle_content',
                    'settings'    => 'ogma_news_front_middle_content_blocks',
                    'priority'      => 10
                )
            )
        );

    }

endif;