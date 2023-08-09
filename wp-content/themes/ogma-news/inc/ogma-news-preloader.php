<?php
/**
 * File to define functions and hooks related to preloader
 * 
 * @package Ogma News
 */

if ( ! function_exists( 'ogma_news_preloader_items' ) ) :

	/**
	 * function to manage the requested preloader items
	 * 
	 * @since 1.0.0
	 */
	function ogma_news_preloader_items() {
		$ogma_news_preloader_enable = ogma_news_get_customizer_option_value( 'ogma_news_preloader_enable' );

		if ( false === $ogma_news_preloader_enable ) {
			return;
		}

		$ogma_news_preloader_style = ogma_news_get_customizer_option_value( 'ogma_news_preloader_style' );

?>
		<div id="ogma-news-preloader" class="preloader-background">
			<div class="preloader-wrapper">
				<?php
					switch ( $ogma_news_preloader_style ) {
						case 'three_bounce':
				?>
							<div class="ogma-news-three-bounce">
	                            <div class="og-child og-bounce1"></div>
	                            <div class="og-child og-bounce2"></div>
	                            <div class="og-child og-bounce3"></div>
	                        </div>
				<?php
							break;

						case 'wave':
				?>
							<div class="ogma-news-wave">
	                            <div class="og-rect og-rect1"></div>
	                            <div class="og-rect og-rect2"></div>
	                            <div class="og-rect og-rect3"></div>
	                            <div class="og-rect og-rect4"></div>
	                            <div class="og-rect og-rect5"></div>
	                        </div>
				<?php
							break;

						case 'folding_cube':
				?>
							<div class="ogma-news-folding-cube">
	                            <div class="og-cube1 og-cube"></div>
	                            <div class="og-cube2 og-cube"></div>
	                            <div class="og-cube4 og-cube"></div>
	                            <div class="og-cube3 og-cube"></div>
	                        </div>
				<?php
							break;
						
						default:
				?>
							<div class="ogma-news-three-bounce">
	                            <div class="og-child og-bounce1"></div>
	                            <div class="og-child og-bounce2"></div>
	                            <div class="og-child og-bounce3"></div>
	                        </div>
				<?php
							break;
					}
				?>
			</div><!-- .preloader-wrapper -->
		</div><!-- #ogma-news-preloader -->
<?php
	}

endif;

add_action( 'ogma_news_before_page', 'ogma_news_preloader_items', 5 );