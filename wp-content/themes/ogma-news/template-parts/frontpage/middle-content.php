<?php
/**
 * file to handle the middle content section.
 * 
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_news_front_middle_content_blocks = ogma_news_get_customizer_option_value( 'ogma_news_front_middle_content_blocks' );

if ( empty ( $ogma_news_front_middle_content_blocks ) ) {
    return;
}

$ogma_news_front_middle_content_blocks = json_decode( $ogma_news_front_middle_content_blocks );
if ( ! in_array( true, array_column( $ogma_news_front_middle_content_blocks , 'option' ) ) ) {
    return;
}

?>

<div id="frontpage-middle-content" class="frontpage-section ogma-news-clearfix">
    <div class="ogma-news-container">
        <div class="primary-content-wrapper">
            <?php
                foreach ( $ogma_news_front_middle_content_blocks as $block ) :
                    if ( $block->option ) {
                        $block_type = $block->type;

                        $blocklayout        = $block->blocklayout;
                        $post_orderby       = $block->postOrderby;
                        $order_by           = explode( '-', $post_orderby );
                        $block_category     = $block->category;
                        $block_posts_count  = $block->postCount;
                        $post_date_filter   = $block->postDatefilter;
                        
                        $block_args = array(
                            'post_args' => array(
                                'orderby'               => esc_attr( $order_by[0] ),
                                'order'                 => esc_attr( $order_by[1] ),
                                'posts_per_page'        => absint( $block_posts_count ),
                                'ignore_sticky_posts'   => true
                            ),
                            'post_options' => $block
                        );
                        if ( 'all' !== $block_category ) {
                            $block_args['post_args']['category_name'] = esc_attr( $block_category );
                        }
                        if ( 'all' !== $post_date_filter ) {
                            $post_date_args = ogma_news_get_date_format_args( $post_date_filter );
                            $block_args['post_args']['date_query'] = $post_date_args;
                        }
                        switch ( $block_type ) {
                            case 'news-block':

                                get_template_part( 'template-parts/frontpage/'. esc_attr( $block_type ) . '/layout', esc_attr( $blocklayout ), $block_args );
                                break;

                            case 'news-list':

                                get_template_part( 'template-parts/frontpage/'. esc_attr( $block_type ) . '/layout', esc_attr( $blocklayout ), $block_args );
                                break;
                            
                            default:
                                // code...
                                break;
                        }
                    }
                endforeach;
            ?>
        </div><!-- .primary-content-wrapper -->

        <div class="secondary-content-wrapper">
            <?php dynamic_sidebar( 'front-middle-right-sidebar' ); ?>
        </div><!-- .secondary-content-wrapper -->
        
    </div> <!-- .ogma-news-container -->
</div><!-- #frontpage-middle-content -->