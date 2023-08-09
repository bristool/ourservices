<?php
/**
 * Partial template to display the post content
 *
 * @package Ogma News
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$post_content_type  = apply_filters( 'ogma_news_archive_post_content_type', 'excerpt' );
?>

<div class="entry-content">
    <?php
        if ( ! is_singular() ) {

            if ( 'excerpt' === $post_content_type ) {
                the_excerpt();
            } else {
                the_content(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ogma-news' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post( get_the_title() )
                    )
                );
            }

        } else {

            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ogma-news' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );

        }

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ogma-news' ),
                'after'  => '</div>',
            )
        );
    ?>
</div><!-- .entry-content -->
