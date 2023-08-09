<?php
/**
 * News List layout two
 * 
 * @package Ogma News
 */

extract( $args );

if ( isset( $post_options->blocklayout ) && ! empty( $post_options->blocklayout ) ) {
    $block_custom_classes[] = 'block-layout--'. esc_attr( $post_options->blocklayout );
}

?>

<section class="frontpage-block news-list-block">
    <div class="block-wrapper <?php echo esc_attr( implode( ' ', $block_custom_classes ) ); ?>">
        <?php
            if ( isset( $post_options->blockTitle ) && ! empty( $post_options->blockTitle ) ) {
                echo '<h2 class="block-title">'. esc_html( $post_options->blockTitle ) .'</h2>';
            }
        ?>

        <div class="block-posts-wrapper">
            <?php
                $list_query = new WP_Query( $post_args );
                if ( $list_query->have_posts() ) :
                    
                    while ( $list_query->have_posts() ) :
                        $list_query->the_post();
                        if ( has_post_thumbnail() ) {
                            $post_img      = 'has-image';
                        } else {
                            $post_img      = 'no-image';
                        }
            ?>
                        <article class="block-post-wrap <?php echo esc_attr( $post_img ); ?>">
                            
                            <div class="post-thumbnail-wrap">
                                <?php
                                    ogma_news_post_thumbnail( 'ogma-news-block-medium' );
                                    ogma_news_the_estimated_reading_time();
                                ?>
                            </div>
                            
                            <div class="post-content-wrap">

                                <?php if ( isset( $post_options->postCats ) && $post_options->postCats ) { ?>
                                    <div class="post-cats-wrap">
                                        <?php ogma_news_the_post_categories_list( get_the_ID(), 2 ); ?>
                                    </div><!-- .post-cats-wrap -->
                                <?php } ?>

                                <div class="post-title-wrap">
                                    <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                </div><!-- .post-title-wrap -->

                                <div class="post-meta-wrap">
                                    <?php
                                        if ( isset( $post_options->postDate ) && $post_options->postDate ) {
                                            ogma_news_posted_on();
                                        }

                                        if ( isset( $post_options->postAuthor ) && $post_options->postAuthor ) {
                                            ogma_news_posted_by();
                                        }

                                        if ( isset( $post_options->postComment ) && $post_options->postComment ) {
                                            ogma_news_post_comment();
                                        }
                                    ?>
                                </div><!-- .post-meta-wrap -->

                                <?php
                                    if ( isset( $post_options->postExcerpt ) && $post_options->postExcerpt ) {
                                        $excerpt_length  = apply_filters( 'ogma_news_front_block_excerpt_length', 60 );
                                ?>
                                        <div class="post-excerpt">
                                            <?php echo esc_html( wp_trim_words( wp_strip_all_tags( get_the_excerpt() ), $excerpt_length ) ); ?>
                                        </div><!-- .post-excerpt -->
                                <?php
                                    }

                                    if ( isset( $post_options->postMore ) && $post_options->postMore ) {
                                        get_template_part( 'template-parts/partials/post/read-more' );
                                    }
                                ?>

                            </div><!-- .post-content-wrap -->

                        </article><!-- .block-post-wrap -->
            <?php
                    endwhile;

                endif;
            ?>
        </div><!-- .block-posts-wrapper -->
    </div><!-- .block-wrapper -->
</section><!-- .news-list-block -->