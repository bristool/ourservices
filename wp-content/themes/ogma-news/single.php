<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
<div class="single-post page-content-wrapper">

	<div class="ogma-news-container">

		<?php get_sidebar( 'left' ); ?>
		
		<main id="primary" class="site-main">

			<?php
				/**
				 * hook - ogma_news_before_single_post_loop_content
				 *
				 * @since 1.0.0
				 */
				do_action( 'ogma_news_before_single_post_loop_content' );

				while ( have_posts() ) :
					the_post();

					$ogma_news_single_posts_layout = ogma_news_get_customizer_option_value( 'ogma_news_single_posts_layout' );
					$get_layout = explode( '--', $ogma_news_single_posts_layout );

					get_template_part( 'template-parts/single/layout', $get_layout[1] );

					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'ogma-news' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'ogma-news' ) . '</span> <span class="nav-title">%title</span>',
						)
					);

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.

				/**
				 * hook - ogma_news_after_single_post_loop_content
				 *
				 * @hooked - ogma_news_post_author_box -10
				 * @hooked - ogma_news_single_post_related_posts_section - 20
				 * 
				 * @since 1.0.0
				 */
				do_action( 'ogma_news_after_single_post_loop_content' );
			?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

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