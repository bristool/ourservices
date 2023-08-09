<?php
/**
 * Template part for displaying a content located in top header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_news_header_top_enable = ogma_news_get_customizer_option_value( 'ogma_news_header_top_enable' );

if ( false === $ogma_news_header_top_enable ) {
	return;
}

$ogma_news_header_top_placement = apply_filters( 'ogma_news_ogma_news_header_top_placement', ogma_news_get_customizer_option_value( 'ogma_news_header_top_placement' ) );

/**
 * hook - ogma_news_before_top_header
 *
 * @since 1.0.0
 */
do_action( 'ogma_news_before_top_header' );
?>
<div id="top-header" class="top-header-wrapper">
	<div class="ogma-news-container ogma-news-flex">
		<?php
			switch ( $ogma_news_header_top_placement ) {
				case 'placement_one':
					// Top Menu / Date / Social Icon

					// top menu
					get_template_part( 'template-parts/partials/header/top', 'menu' );

					// date
					get_template_part( 'template-parts/partials/header/date' );

					// social icon
					if ( true === ogma_news_get_customizer_option_value( 'ogma_news_header_social_enable' ) ) {
						get_template_part( 'template-parts/partials/header/social', 'icons' );
					}
					

					break;
				
				default:
					break;
			}
		?>
	</div><!-- .ogma-news-container -->
</div><!-- .top-header-wrapper -->
<?php
/**
 * hook - ogma_news_after_top_header
 *
 * @since 1.0.0
 */
do_action( 'ogma_news_after_top_header' );