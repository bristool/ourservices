<?php
/**
 * Partial template to display the post read more button
 *
 * @package Ogma News
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


$ogma_news_read_more_tag = sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_the_permalink() ), esc_html__( 'Read More', 'ogma-news' ) );

?>

<div class="ogma-news-button read-more-button">
	<?php echo $ogma_news_read_more_tag ; ?>
</div><!-- .ogma-news-button -->