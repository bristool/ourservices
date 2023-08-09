<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ogma News
 */

$custom_post_class = '';
if ( ! has_post_thumbnail() ) {
	$custom_post_class = 'no-thumbnail';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $custom_post_class ); ?>>

	<div class="post-thumbnail-wrap">
        <?php
        	ogma_news_post_thumbnail( 'ogma-news-block-medium' );
        	ogma_news_the_estimated_reading_time();
        ?>
    </div>

	<div class="ogma-news-post-content-wrap"> 
	    <div class="post-cats-wrap">
	        <?php ogma_news_the_post_categories_list( get_the_ID(), 1 ); ?>
	    </div><!-- .post-cats-wrap -->

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
			?>
				<div class="entry-meta">
					<?php
						ogma_news_posted_on();
						ogma_news_posted_by();
						ogma_news_post_comment();
					 	ogma_news_entry_footer();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php
			get_template_part( 'template-parts/partials/post/content' );

			get_template_part( 'template-parts/partials/post/read-more' );
		?>
	</div> <!-- post-content-wrapper -->

</article><!-- #post-<?php the_ID(); ?> -->
