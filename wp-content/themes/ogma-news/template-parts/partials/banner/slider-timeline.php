<?php
/**
 * Partial template for main banner timeline.
 * 
 * @package Ogma News
 */


$timeline_args = $args['timeline_args'];

$ogma_news_banner_timeline_title = ogma_news_get_customizer_option_value( 'ogma_news_banner_timeline_title' );

?>
<div class="timeline-wrapper">
    <?php
        if ( ! empty( $ogma_news_banner_timeline_title ) ) {
            echo '<h2 class="timeline-title">'. wp_kses_post( $ogma_news_banner_timeline_title ) .'</h2>';
        }
        $timeline_query = new WP_Query( $timeline_args );
        if ( $timeline_query->have_posts() ) {
            while ( $timeline_query->have_posts() ) {
                $timeline_query->the_post();
                $current_post = $timeline_query->current_post;
    ?>
                <div class="single-post-wrapper">

                     <div class="post-thumbnail-wrap">
                        <?php ogma_news_post_thumbnail( 'ogma-news-banner' ); ?>
                        <span class="post-count"><?php echo absint( $current_post+1 ); ?></span>
                    </div>
                    <div class="post-title-wrap">
                        <div class="post-cats-wrap">
                            <?php ogma_news_the_post_categories_list( get_the_ID(), 1 ); ?>
                        </div><!-- .cat-wrap -->
                        <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div><!-- .post-title-wrap -->
                </div><!-- .single-post-wrapper -->
    <?php
            }
        }
    ?>
</div><!-- .timeline-wrapper-->