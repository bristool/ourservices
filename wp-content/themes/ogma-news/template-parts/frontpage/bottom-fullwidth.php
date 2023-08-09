<?php
/**
 * file to handle the bottom fullwidth section.
 * 
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_news_front_bottom_fullwidth_blocks = ogma_news_get_customizer_option_value( 'ogma_news_front_bottom_fullwidth_blocks' );

if ( empty ( $ogma_news_front_bottom_fullwidth_blocks ) ) {
    return;
}

$ogma_news_front_bottom_fullwidth_blocks = json_decode( $ogma_news_front_bottom_fullwidth_blocks );
if ( ! in_array( true, array_column( $ogma_news_front_bottom_fullwidth_blocks , 'option' ) ) ) {
    return;
}

?>

<div id="frontpage-bottom-fullwidth" class="frontpage-section ogma-news-clearfix">
    <?php
        foreach ( $ogma_news_front_bottom_fullwidth_blocks as $block ) :
            if ( $block->option ) {
                $block_type         = $block->type;
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
                    case 'news-carousel':

                        get_template_part( 'template-parts/frontpage/'. esc_attr( $block_type ) . '/layout', esc_attr( $blocklayout ), $block_args );

                        break;

                    case 'news-grid':

                        get_template_part( 'template-parts/frontpage/'. esc_attr( $block_type ) . '/layout', esc_attr( $blocklayout ), $block_args );

                        break;
                    
                    default:
                        // code...
                        break;
                }
            }
        endforeach;
    ?>
</div><!-- #frontpage-bottom-fullwidth -->