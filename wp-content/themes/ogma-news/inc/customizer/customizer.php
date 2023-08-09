<?php
/**
 * Ogma News Theme Customizer
 *
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ogma_news_customize_register( $wp_customize ) {

	require get_template_directory(). '/inc/customizer/override-defaults.php';

	require get_template_directory(). '/inc/customizer/custom-controls/register-custom-controls.php';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'ogma_news_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'ogma_news_customize_partial_blogdescription',
			)
		);
	}

	/**
     * Register theme upsell sections.
     *
     * @since 1.0.0
     */
    $wp_customize->add_section( new ogma_news_Upsell_Section(
        $wp_customize, 'ogma_news_theme_upsell',
            array(
                'title'     	=> __( 'Ogma Pro', 'ogma-news' ),
                'button_text'  	=> __( 'Buy Now', 'ogma-news' ),
                'button_url'   	=> 'https://ogma.mysterythemes.com/ogma-news',
                'priority'  	=> 1,
            )
        )
    );

    /**
     * Toggle option for frontpage blocks
     *
     * Homepage Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting( 'ogma_news_frontpage_blocks_enable',
        array(
            'default'           => ogma_news_get_customizer_default( 'ogma_news_frontpage_blocks_enable' ),
            'sanitize_callback' => 'ogma_news_sanitize_checkbox'
        )
    );
    $wp_customize->add_control( new Ogma_News_Control_Toggle(
        $wp_customize, 'ogma_news_frontpage_blocks_enable',
            array(
                'priority'      => 50,
                'section'       => 'static_front_page',
                'settings'      => 'ogma_news_frontpage_blocks_enable',
                'label'         => __( 'Enable Frontpage Blocks', 'ogma-news' )
            )
        )
    );

    

	
}

add_action( 'customize_register', 'ogma_news_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ogma_news_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ogma_news_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/*----------------------------- enqueue customizer scripts ------------------------------------------------*/

	if ( ! function_exists( 'ogma_news_customize_preview_js' ) ) {
		
		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function ogma_news_customize_preview_js() {
			
			wp_enqueue_script( 'ogma-news-google-webfont', get_template_directory_uri() . '/inc/customizer/custom-controls/typography/webfontloader.js', array( 'jquery' ) );

			wp_enqueue_script( 'ogma-news-customizer', get_template_directory_uri() . '/inc/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), OGMA_NEWS_VERSION, true );
		}

	}

	add_action( 'customize_preview_init', 'ogma_news_customize_preview_js' );

	if ( ! function_exists( 'ogma_news_customize_backend_scripts' ) ) :

        /**
         * Enqueue required scripts/styles for customizer panel
         *
         * @since 1.0.0
         */
        function ogma_news_customize_backend_scripts() {

            wp_enqueue_style( 'select2', get_template_directory_uri() . '/assets/library/select2/css/select2.css', null );

            wp_enqueue_style( 'box-icons', get_template_directory_uri() . '/assets/library/box-icons/css/boxicons.css', null, '2.1.4' );

            wp_enqueue_style( 'ogma-news-extend-customizer', get_template_directory_uri() . '/inc/customizer/assets/css/extend-customizer.css', array(), OGMA_NEWS_VERSION );

            wp_enqueue_style( 'ogma-news-custom-control-styles', get_template_directory_uri() . '/inc/customizer/assets/css/custom-control-styles.css', array(), OGMA_NEWS_VERSION );

            if ( function_exists( 'wp_enqueue_media' ) ) {
		        wp_enqueue_media();
		    }

            wp_enqueue_script( 'select2', get_template_directory_uri() . '/assets/library/select2/js/select2.js', array( 'jquery' ), '4.0.13', true );

            wp_enqueue_script( 'ogma-news-extend-customizer', get_template_directory_uri(). '/inc/customizer/assets/js/extend-customizer.js', array('jquery'), OGMA_NEWS_VERSION, true );

		    wp_enqueue_script( 'ogma-news-custom-control-scripts', get_template_directory_uri() . '/inc/customizer/assets/js/custom-control-scripts.js', array( 'jquery', 'customize-controls', 'customize-base', 'select2' ), OGMA_NEWS_VERSION, true );
            
        }

    endif;

    add_action( 'customize_controls_enqueue_scripts', 'ogma_news_customize_backend_scripts', 10 );

/*----------------------------- load required files ------------------------------------------------*/
	
	require get_template_directory(). '/inc/customizer/extend-customizer/class-customize-panel.php';
	require get_template_directory(). '/inc/customizer/extend-customizer/class-customize-section.php';
	
	require get_template_directory(). '/inc/customizer/customizer-callback.php';
	require get_template_directory(). '/inc/customizer/customizer-selective-refresh.php';
	require get_template_directory(). '/inc/customizer/customizer-sanitize.php';
	require get_template_directory(). '/inc/customizer/customizer-helper.php';

	require get_template_directory(). '/inc/customizer/register-panels-sections.php';

$ogma_news_sections_array = array(
	'general'		=> array( 'site-style', 'colors', 'preloader', 'social-icon', 'typography', 'breadcrumb', 'posts', 'sidebar', 'scroll-top', 'performance' ),
	'header'		=> array( 'top-area', 'site-identity', 'main-area', 'menu', 'ads-area', 'ticker' ),
	'frontpage'		=> array( 'banner', 'top-fullwidth', 'middle-content', 'bottom-fullwidth' ),
	'innerpage'		=> array( 'archive', 'posts', 'error-page' ),
	'footer'		=> array( 'main-area', 'bottom-area' )
);

foreach ( $ogma_news_sections_array as $key => $value ) {
	foreach ( $value as $k => $v ) {
		require get_template_directory() . '/inc/customizer/sections/'. $key . '/' . $v .'.php';
	}
}