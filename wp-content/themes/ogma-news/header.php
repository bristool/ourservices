<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php ogma_news_schema_markup( 'html' ); ?>>
<?php
	wp_body_open();

	/**
	 * hook - ogma_news_before_page
	 *
	 * @since 1.0.0
	 */
	do_action( 'ogma_news_before_page' );
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ogma-news' ); ?></a>

	<?php
		/**
		 * hook - ogma_news_header_section
		 *
		 * @hooked - ogma_news_custom_header_html - 10
		 * @hooked - ogma_news_top_header - 20
		 * @hooked - ogma_news_main_header - 30
		 * @hooked - header_news_ticker_section - 40
		 *
		 * @since 1.0.0
		 */
		do_action( 'ogma_news_header_section' );
	?>

	<div id="content" class="site-content" <?php ogma_news_schema_markup( 'creative_work' ); ?>>

		<?php

			if ( is_home() && is_front_page() ) {

				$ogma_news_frontpage_blocks_enable = ogma_news_get_customizer_option_value( 'ogma_news_frontpage_blocks_enable' );

				if ( true !== $ogma_news_frontpage_blocks_enable ) {
					return;
				}

				/**
				 * hook - ogma_news_frontpage_section
				 *
				 * @hooked - ogma_news_frontpage_main_banner - 10
				 * @hooked - ogma_news_frontpage_top_fullwidth - 20
				 * @hooked - ogma_news_frontpage_middle_content - 30
				 * @hooked - ogma_news_frontpage_bottom_fullwidth - 40
				 *
				 * @since 1.0.0
				 */
				do_action( 'ogma_news_frontpage_section' );

			}

		?>
