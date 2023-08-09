<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Ogma News
 */

get_header();

/**
 * hook - ogma_news_before_page_post_content
 *
 * @since 1.0.0
 */
do_action( 'ogma_news_before_page_post_content' );

?>

<div class="404-error page-content-wrapper">
	<div class="ogma-news-container">
		<main id="primary" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ogma-news' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'The page you are looking for doesn’t exist. It may have been moved or removed. Please try searching for some other page.', 'ogma-news' ); ?></p>

						<?php
							$ogma_news_error_page_search_enable = ogma_news_get_customizer_option_value( 'ogma_news_error_page_search_enable' );
							if ( true === $ogma_news_error_page_search_enable ) {
						?>
								<div class="page-search-wrapper">
									<?php get_search_form(); ?>
								</div><!-- .page-search-wrapper -->
						<?php
							}

							$ogma_news_error_page_button_enable = ogma_news_get_customizer_option_value( 'ogma_news_error_page_button_enable' );
							$ogma_news_error_page_button_label  = ogma_news_get_customizer_option_value( 'ogma_news_error_page_button_label' );
							if ( true === $ogma_news_error_page_button_enable && !empty( $ogma_news_error_page_button_label ) ) {
						?>
								<div class="error-button-wrap">
									<a href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html( $ogma_news_error_page_button_label ); ?></a>
								</div><!-- .error-button-wrap -->
						<?php
							}
						?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div> <!-- .ogma-news-container -->
</div><!-- .page-content-wrapper -->

<?php
	/**
	 * hook - ogma_news_after_page_post_content
	 *
	 * @since 1.0.0
	 */
	do_action( 'ogma_news_after_page_post_content' );

	get_footer();
