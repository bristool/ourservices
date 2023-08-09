<?php
/**
 * Template part for displaying single post layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ogma News
 */

if ( has_post_thumbnail() ) {
    $custom_post_class = 'has-thumbnail';
} else {
    $custom_post_class = 'no-thumbnail';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $custom_post_class ); ?>>

	<div class="post-thumbnail-wrap">
        <?php
        	ogma_news_post_thumbnail();
        	ogma_news_the_estimated_reading_time();
        ?>
        <div class="ogma-news-post-title-wrap">
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
        </div> <!-- ogma-news-post-title-wrap -->
    </div> <!-- post-thumbnail-wrap -->
	<div class="ogma-news-post-content-wrap">
		<?php get_template_part( 'template-parts/partials/post/content' ); ?>
	</div> <!-- post-content-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->
