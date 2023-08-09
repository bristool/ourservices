<?php
/**
 * Template part for displaying archive posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ogma News
 */

$custom_post_class = '';
if ( ! has_post_thumbnail() ) {
	$custom_post_class = 'no-thumbnail';
}

$ogma_news_archive_page_style = ogma_news_get_customizer_option_value( 'ogma_news_archive_page_style' );

if ( 'archive-style--classic' === $ogma_news_archive_page_style ) {
	$thumb_size = 'full';
} else {
	$thumb_size = 'ogma-news-block-medium';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $custom_post_class ); ?>>

	<div class="post-thumbnail-wrap">
        <?php
        	ogma_news_post_thumbnail( $thumb_size );
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

			$ogma_news_archive_post_readmore_enable = ogma_news_get_customizer_option_value( 'ogma_news_archive_post_readmore_enable' );

			if ( false !== $ogma_news_archive_post_readmore_enable ) {
				get_template_part( 'template-parts/partials/post/read-more' );
			}
			
		?>
	</div> <!-- post-content-wrapper -->

</article><!-- #post-<?php the_ID(); ?> -->
