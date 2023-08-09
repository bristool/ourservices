<?php
/**
 * File to handle widget area and related hooks and functions.
 * 
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'widgets_init', 'ogma_news_widgets_init' );

if ( ! function_exists( 'ogma_news_widgets_init' ) ) :

	 /**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function ogma_news_widgets_init() {

		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'ogma-news' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'ogma-news' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Left Sidebar', 'ogma-news' ),
				'id'            => 'left-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'ogma-news' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Frontpage - Middle Right Sidebar', 'ogma-news' ),
				'id'            => 'front-middle-right-sidebar',
				'description' 	=> esc_html__( 'Add "OGMA NEWS: ABC" widget for frontpage middle right sidebar section.', 'ogma-news' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		if ( true === ogma_news_get_customizer_option_value( 'ogma_news_header_sticky_sidebar_toggle_enable' ) ) {

			/**
			 * Register header sticky sidebar
			 *
			 * @since 1.0.0
			 */
			register_sidebar( array(
				'name'          => esc_html__( 'Header Sticky Sidebar', 'ogma-news' ),
				'id'            => 'header-sticky-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'ogma-news' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );

		}

		/**
		 * Register 4 different footer widget area 
		 *
		 * @since 1.0.0
		 */
		register_sidebars( 4 , array(
			'name'          => esc_html__( 'Footer Column %d', 'ogma-news' ),
			'id'            => 'footer-sidebar',
			'description'   => esc_html__( 'Added widgets are display at Footer Widget Area.', 'ogma-news' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		// register widget OGMA NEWS: Trending Posts
    	register_widget( 'Ogma_News_Trending_Posts' );

    	// register widget OGMA NEWS: Latest Posts
    	register_widget( 'Ogma_News_Latest_Posts' );

    	// register widget OGMA NEWS: Author Profile
    	register_widget( 'Ogma_News_Author_Profile' );

	}

endif;

require get_template_directory().'/inc/widgets/ogma-news-widgets-helper.php';
require get_template_directory().'/inc/widgets/trending-posts.php';
require get_template_directory().'/inc/widgets/latest-posts.php';
require get_template_directory().'/inc/widgets/author-profile.php';