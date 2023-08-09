<?php
/**
 * Customizer Blocks Repeater Control
 * 
 * @package Ogma News
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Ogma_News_Control_Blocks_Repeater' ) ) :

     /**
     * Blocks Repeater control
     *
     * @since 1.0.0
     */
    class Ogma_News_Control_Blocks_Repeater extends WP_Customize_Control {
        
        /**
         * The control type.
         *
         * @access public
         * @var string
         * @since 1.0.0
         */
        public $type = 'ogma-news-block-repeater';

        /**
         * constructor
         * 
         */
        public function __construct( $manager, $id, $args ) {
            parent::__construct( $manager, $id, $args );
        }

        /**
         * Render content
         * 
         */
        public function render_content() {
            $defaults = json_decode( $this->setting->default ); // defaults
            $values = json_decode( $this->value() ); // values
    ?>
            <div class="blocks-repeater-control-wrap">
                <?php
                    $categories = get_categories();

                    foreach ( $values as $control_key => $control ) :
                        if ( false === $control->option ) {
                            $dash_icon = 'hidden';
                            $item_wrap_class = ' ogma-news-hide';
                        } else {
                            $dash_icon = 'visibility';
                            $item_wrap_class = '';
                        }
                        switch ( $control->type ) {
                            case 'ad-block' :

                ?>
                                <div class="ogma-news-block ad-block-wrap<?php echo esc_attr( $item_wrap_class ); ?>" block-name="ad-block">

                                    <div class="block-header content-trigger">
                                        <h2 class="block-header-title"><?php esc_html_e( 'Ad Block', 'ogma-news' ); ?></h2>
                                        <span class="block-settings dashicons dashicons-admin-generic"></span>
                                        <div class="block-header-toggle">
                                            <span class="block-option dashicons dashicons-<?php echo esc_attr( $dash_icon ); ?>"></span>
                                            <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                        </div><!-- .block-header-toggle -->
                                    </div><!-- .block-header -->

                                    <div class="block-content-wrap">
                                        <?php
                                            /**
                                             * upload field for ad block image
                                             */
                                            $ad_img_arg = array(
                                                'title'         => __( 'Ad Block Image', 'ogma-news' ),
                                                'name'          => 'imgSrc',
                                                'value'         => $control->imgSrc
                                            );
                                            self::render_field( 'upload', $ad_img_arg );

                                            /**
                                             * url field for ad image link
                                             */
                                            $img_link_arg = array(
                                                'title'         => __( 'Ad Block Image Link', 'ogma-news' ),
                                                'name'          => 'imgUrl',
                                                'value'         => $control->imgUrl
                                            );
                                            self::render_field( 'url', $img_link_arg );

                                            /**
                                             * toggle field for link open in new tab.
                                             */
                                            $new_tab_args = array(
                                                'title'     => __( 'Link open in new tab.', 'ogma-news' ),
                                                'name'      => 'newTab',
                                                'value'     => $control->newTab,
                                            );
                                            self::render_field( 'toggle', $new_tab_args );
                                        ?>

                                        <div class="action-buttons ad-block">
                                            <div class="close-block"><?php esc_html_e( 'Close', 'ogma-news' ); ?></div>
                                            <div class="red-button remove-block"><?php esc_html_e( 'Remove', 'ogma-news' ); ?></div>
                                        </div><!-- .action-buttons -->
                                        
                                    </div><!-- .block-content-wrap -->

                                </div><!-- .ad-block-wrap -->
                <?php
                                break;

                            case 'news-featured' :
                ?>
                                <div class="ogma-news-block news-featured-block-wrap" block-name="news-featured">
                                    
                                    <div class="block-header content-trigger">
                                        <h2 class="block-header-title"><?php esc_html_e( 'News Featured', 'ogma-news' ); ?></h2>
                                        <span class="block-settings dashicons dashicons-admin-generic"></span>
                                        <div class="block-header-toggle">
                                            <span class="block-option dashicons dashicons-<?php echo esc_attr( $dash_icon ); ?>"></span>
                                            <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                        </div><!-- .block-header-toggle -->
                                    </div><!-- .block-header -->

                                    <div class="block-content-wrap">
                                        <?php
                                            /**
                                             * text field for block title
                                             */
                                            $block_title_arg = array(
                                                'title'         => __( 'Block Title', 'ogma-news' ),
                                                'description'   => __( 'Leave blank to hide title.', 'ogma-news' ),
                                                'name'          => 'blockTitle',
                                                'value'         => $control->blockTitle
                                            );
                                            self::render_field( 'text', $block_title_arg );

                                            /**
                                             * block query group
                                             */
                                            $block_query_group_arg = array(
                                                'title'         => __( 'Block Query', 'ogma-news' ),
                                                'description'   => __( 'Click Icon to expand the fields.', 'ogma-news' )
                                            );
                                            self::render_field( 'group_title', $block_query_group_arg );

                                            /**
                                             * block query wrap start
                                             */
                                            self::render_field( 'field_group_start' );

                                            /**
                                             * category dropdown field for block category
                                             */
                                            $block_cat_args = array(
                                                'title' => __( 'Block Category', 'ogma-news' ),
                                                'name'  => 'category',
                                                'value' => $control->category
                                            );
                                            self::render_field( 'category_dropdown', $block_cat_args );

                                            /**
                                             * select field for posts orderby
                                             */
                                            $posts_orderby_args = array(
                                                'title'     => __( 'Posts Order by', 'ogma-news' ),
                                                'name'      => 'postOrderby',
                                                'value'     => $control->postOrderby,
                                                'options'   => array(
                                                    'date-desc'     => __( 'Newest - Oldest', 'ogma-news' ),
                                                    'date-asc'      => __( 'Oldest - Newest', 'ogma-news' ),
                                                    'title-asc'     => __( 'A - Z', 'ogma-news' ),
                                                    'title-desc'    => __( 'A - Z', 'ogma-news' ),
                                                    'rand-desc'     => __( 'Random', 'ogma-news' ),
                                                )
                                            );
                                            self::render_field( 'select', $posts_orderby_args );

                                            /**
                                             * select field for posts date filter
                                             */
                                            $posts_datefilter_args = array(
                                                'title'     => __( 'Posts date filter', 'ogma-news' ),
                                                'name'      => 'postDatefilter',
                                                'value'     => $control->postDatefilter,
                                                'options'   => array(
                                                    'all'     => __( 'All', 'ogma-news' ),
                                                    'today'      => __( 'Today', 'ogma-news' ),
                                                    'this-week'     => __( 'This Week', 'ogma-news' ),
                                                    'last-week'    => __( 'Last Week', 'ogma-news' ),
                                                    'this-month'     => __( 'This Month', 'ogma-news' ),
                                                    'last-month'     => __( 'Last Month', 'ogma-news' ),
                                                )
                                            );
                                            self::render_field( 'select', $posts_datefilter_args );

                                            /**
                                             * number field for post count
                                             */
                                            $block_postcount_args = array(
                                                'title'         => __( 'Number of posts', 'ogma-news' ),
                                                'name'          => 'postCount',
                                                'value'         => $control->postCount,
                                                'input_attrs'   => array(
                                                    'min'   => 1,
                                                    'max'   => 7,
                                                    'step'  => 1
                                                )
                                            );
                                            self::render_field( 'number', $block_postcount_args );

                                            /**
                                             * block query wrap end
                                             */
                                            self::render_field( 'field_group_end' );

                                            /**
                                             * radio image field for block layout
                                             */
                                            $block_layout_args = array(
                                                'title'         => __( 'Block Layouts', 'ogma-news' ),
                                                'description'   => __( 'Choose from available layouts.', 'ogma-news' ),
                                                'name'          => 'blocklayout',
                                                'value'         => $control->blocklayout,
                                                'choices'       => array(
                                                    'one'    => array(
                                                        'label' => esc_html( 'Layout One' ),
                                                        'img'   => get_template_directory_uri() . '/inc/customizer/assets/images/news-featured-layout-one.png'
                                                    ),
                                                    'two'    => array(
                                                        'label' => esc_html( 'Layout Two' ),
                                                        'img'   => get_template_directory_uri() . '/inc/customizer/assets/images/news-featured-layout-two.png'
                                                    )
                                                ),

                                            );
                                            self::render_field( 'selector', $block_layout_args );

                                            /**
                                             * toggle field for posts cats
                                             */
                                            $posts_cats_args = array(
                                                'title'     => __( 'Show posts categories lists', 'ogma-news' ),
                                                'name'      => 'postCats',
                                                'value'     => $control->postCats,
                                            );
                                            self::render_field( 'toggle', $posts_cats_args );

                                            /**
                                             * toggle field for posts author
                                             */
                                            $posts_author_args = array(
                                                'title'     => __( 'Show posts author', 'ogma-news' ),
                                                'name'      => 'postAuthor',
                                                'value'     => $control->postAuthor,
                                            );
                                            self::render_field( 'toggle', $posts_author_args );

                                            /**
                                             * toggle field for posts date
                                             */
                                            $posts_date_args = array(
                                                'title'     => __( 'Show posts date', 'ogma-news' ),
                                                'name'      => 'postDate',
                                                'value'     => $control->postDate,
                                            );
                                            self::render_field( 'toggle', $posts_date_args );

                                            /**
                                             * toggle field for posts comment
                                             */
                                            $posts_comment_args = array(
                                                'title'     => __( 'Show posts comment', 'ogma-news' ),
                                                'name'      => 'postComment',
                                                'value'     => $control->postComment,
                                            );
                                            self::render_field( 'toggle', $posts_comment_args );

                                            /**
                                             * toggle field for posts more
                                             */
                                            $posts_more_args = array(
                                                'title'     => __( 'Show posts more', 'ogma-news' ),
                                                'name'      => 'postMore',
                                                'value'     => $control->postMore,
                                            );
                                            self::render_field( 'toggle', $posts_more_args );
                                        ?>

                                        <div class="action-buttons news-featured">
                                            <div class="close-block"><?php esc_html_e( 'Close', 'ogma-news' ); ?></div>
                                            <div class="red-button remove-block"><?php esc_html_e( 'Remove', 'ogma-news' ); ?></div>
                                        </div><!-- .action-buttons -->

                                    </div><!-- .block-content-wrap -->

                                </div><!-- .news-featured-block-wrap -->
                        <?php
                                break;

                            case 'news-block' :
                        ?>
                                <div class="ogma-news-block news-block-block-wrap<?php echo esc_attr( $item_wrap_class ); ?>" block-name="news-block">

                                    <div class="block-header content-trigger">
                                        <h2 class="block-header-title"><?php esc_html_e( 'News Block', 'ogma-news' ); ?></h2>
                                        <span class="block-settings dashicons dashicons-admin-generic"></span>
                                        <div class="block-header-toggle">
                                            <span class="block-option dashicons dashicons-<?php echo esc_attr( $dash_icon ); ?>"></span>
                                            <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                        </div><!-- .block-header-toggle -->
                                    </div><!-- .block-header -->

                                    <div class="block-content-wrap">
                                        <?php
                                            /**
                                             * text field for block title
                                             */
                                            $block_title_arg = array(
                                                'title'         => __( 'Block Title', 'ogma-news' ),
                                                'description'   => __( 'Leave blank to hide title.', 'ogma-news' ),
                                                'name'          => 'blockTitle',
                                                'value'         => $control->blockTitle
                                            );
                                            self::render_field( 'text', $block_title_arg );

                                            /**
                                             * block query group
                                             */
                                            $block_query_group_arg = array(
                                                'title'         => __( 'Block Query', 'ogma-news' ),
                                                'description'   => __( 'Click Icon to expand the fields.', 'ogma-news' )
                                            );
                                            self::render_field( 'group_title', $block_query_group_arg );

                                            /**
                                             * block query wrap start
                                             */
                                            self::render_field( 'field_group_start' );

                                            /**
                                             * category dropdown field for block category
                                             */
                                            $block_cat_args = array(
                                                'title' => __( 'Block Category', 'ogma-news' ),
                                                'name'  => 'category',
                                                'value' => $control->category
                                            );
                                            self::render_field( 'category_dropdown', $block_cat_args );

                                            /**
                                             * select field for posts orderby
                                             */
                                            $posts_orderby_args = array(
                                                'title'     => __( 'Posts Order by', 'ogma-news' ),
                                                'name'      => 'postOrderby',
                                                'value'     => $control->postOrderby,
                                                'options'   => array(
                                                    'date-desc'     => __( 'Newest - Oldest', 'ogma-news' ),
                                                    'date-asc'      => __( 'Oldest - Newest', 'ogma-news' ),
                                                    'title-asc'     => __( 'A - Z', 'ogma-news' ),
                                                    'title-desc'    => __( 'A - Z', 'ogma-news' ),
                                                    'rand-desc'     => __( 'Random', 'ogma-news' ),
                                                )
                                            );
                                            self::render_field( 'select', $posts_orderby_args );

                                            /**
                                             * select field for posts date filter
                                             */
                                            $posts_datefilter_args = array(
                                                'title'     => __( 'Posts date filter', 'ogma-news' ),
                                                'name'      => 'postDatefilter',
                                                'value'     => $control->postDatefilter,
                                                'options'   => array(
                                                    'all'           => __( 'All', 'ogma-news' ),
                                                    'today'         => __( 'Today', 'ogma-news' ),
                                                    'this-week'     => __( 'This Week', 'ogma-news' ),
                                                    'last-week'     => __( 'Last Week', 'ogma-news' ),
                                                    'this-month'    => __( 'This Month', 'ogma-news' ),
                                                    'last-month'    => __( 'Last Month', 'ogma-news' ),
                                                )
                                            );
                                            self::render_field( 'select', $posts_datefilter_args );

                                            /**
                                             * number field for post count
                                             */
                                            $block_postcount_args = array(
                                                'title'         => __( 'Number of posts', 'ogma-news' ),
                                                'name'          => 'postCount',
                                                'value'         => $control->postCount,
                                                'input_attrs'   => array(
                                                    'min'   => 1,
                                                    'max'   => 7,
                                                    'step'  => 1
                                                )
                                            );
                                            self::render_field( 'number', $block_postcount_args );

                                            /**
                                             * block query wrap end
                                             */
                                            self::render_field( 'field_group_end' );

                                            /**
                                             * radio image field for block layout
                                             */
                                            $block_layout_args = array(
                                                'title'         => __( 'Block Layouts', 'ogma-news' ),
                                                'description'   => __( 'Choose from available layouts.', 'ogma-news' ),
                                                'name'          => 'blocklayout',
                                                'value'         => $control->blocklayout,
                                                'choices'       => array(
                                                    'one'    => array(
                                                        'label' => esc_html( 'Layout One' ),
                                                        'img'   => get_template_directory_uri() . '/inc/customizer/assets/images/news-block-one.png'
                                                    ),
                                                    'two'    => array(
                                                        'label' => esc_html( 'Layout Two' ),
                                                        'img'   => get_template_directory_uri() . '/inc/customizer/assets/images/news-block-two.png'
                                                    )
                                                ),

                                            );
                                            self::render_field( 'selector', $block_layout_args );

                                            /**
                                             * toggle field for posts cats
                                             */
                                            $posts_cats_args = array(
                                                'title'     => __( 'Show posts categories lists', 'ogma-news' ),
                                                'name'      => 'postCats',
                                                'value'     => $control->postCats,
                                            );
                                            self::render_field( 'toggle', $posts_cats_args );

                                            /**
                                             * toggle field for posts author
                                             */
                                            $posts_author_args = array(
                                                'title'     => __( 'Show posts author', 'ogma-news' ),
                                                'name'      => 'postAuthor',
                                                'value'     => $control->postAuthor,
                                            );
                                            self::render_field( 'toggle', $posts_author_args );

                                            /**
                                             * toggle field for posts date
                                             */
                                            $posts_date_args = array(
                                                'title'     => __( 'Show posts date', 'ogma-news' ),
                                                'name'      => 'postDate',
                                                'value'     => $control->postDate,
                                            );
                                            self::render_field( 'toggle', $posts_date_args );

                                            /**
                                             * toggle field for posts comment
                                             */
                                            $posts_comment_args = array(
                                                'title'     => __( 'Show posts comment', 'ogma-news' ),
                                                'name'      => 'postComment',
                                                'value'     => $control->postComment,
                                            );
                                            self::render_field( 'toggle', $posts_comment_args );

                                            /**
                                             * toggle field for posts more
                                             */
                                            $posts_more_args = array(
                                                'title'     => __( 'Show posts more', 'ogma-news' ),
                                                'name'      => 'postMore',
                                                'value'     => $control->postMore,
                                            );
                                            self::render_field( 'toggle', $posts_more_args );
                                        ?>

                                        <div class="action-buttons news-block">
                                            <div class="close-block"><?php esc_html_e( 'Close', 'ogma-news' ); ?></div>
                                            <div class="red-button remove-block"><?php esc_html_e( 'Remove', 'ogma-news' ); ?></div>
                                        </div><!-- .action-buttons -->
                                    </div><!-- .block-content-wrap -->

                                </div><!-- .news-block-block-wrap -->
                            <?php
                                break;

                            case 'news-grid' :
                        ?>
                                <div class="ogma-news-block news-grid-block-wrap<?php echo esc_attr( $item_wrap_class ); ?>" block-name="news-grid">

                                    <div class="block-header content-trigger">
                                        <h2 class="block-header-title"><?php esc_html_e( 'News Grid', 'ogma-news' ); ?></h2>
                                        <span class="block-settings dashicons dashicons-admin-generic"></span>
                                        <div class="block-header-toggle">
                                            <span class="block-option dashicons dashicons-<?php echo esc_attr( $dash_icon ); ?>"></span>
                                            <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                        </div><!-- .block-header-toggle -->
                                    </div><!-- .block-header -->

                                    <div class="block-content-wrap">
                                        <?php
                                            /**
                                             * text field for block title
                                             */
                                            $block_title_arg = array(
                                                'title'         => __( 'Block Title', 'ogma-news' ),
                                                'description'   => __( 'Leave blank to hide title.', 'ogma-news' ),
                                                'name'          => 'blockTitle',
                                                'value'         => $control->blockTitle
                                            );
                                            self::render_field( 'text', $block_title_arg );

                                            /**
                                             * block query group
                                             */
                                            $block_query_group_arg = array(
                                                'title'         => __( 'Block Query', 'ogma-news' ),
                                                'description'   => __( 'Click Icon to expand the fields.', 'ogma-news' )
                                            );
                                            self::render_field( 'group_title', $block_query_group_arg );

                                            /**
                                             * block query wrap start
                                             */
                                            self::render_field( 'field_group_start' );

                                            /**
                                             * category dropdown field for block category
                                             */
                                            $block_cat_args = array(
                                                'title' => __( 'Block Category', 'ogma-news' ),
                                                'name'  => 'category',
                                                'value' => $control->category
                                            );
                                            self::render_field( 'category_dropdown', $block_cat_args );

                                            /**
                                             * select field for posts orderby
                                             */
                                            $posts_orderby_args = array(
                                                'title'     => __( 'Posts Order by', 'ogma-news' ),
                                                'name'      => 'postOrderby',
                                                'value'     => $control->postOrderby,
                                                'options'   => array(
                                                    'date-desc'     => __( 'Newest - Oldest', 'ogma-news' ),
                                                    'date-asc'      => __( 'Oldest - Newest', 'ogma-news' ),
                                                    'title-asc'     => __( 'A - Z', 'ogma-news' ),
                                                    'title-desc'    => __( 'A - Z', 'ogma-news' ),
                                                    'rand-desc'     => __( 'Random', 'ogma-news' ),
                                                )
                                            );
                                            self::render_field( 'select', $posts_orderby_args );

                                            /**
                                             * select field for posts date filter
                                             */
                                            $posts_datefilter_args = array(
                                                'title'     => __( 'Posts date filter', 'ogma-news' ),
                                                'name'      => 'postDatefilter',
                                                'value'     => $control->postDatefilter,
                                                'options'   => array(
                                                    'all'           => __( 'All', 'ogma-news' ),
                                                    'today'         => __( 'Today', 'ogma-news' ),
                                                    'this-week'     => __( 'This Week', 'ogma-news' ),
                                                    'last-week'     => __( 'Last Week', 'ogma-news' ),
                                                    'this-month'    => __( 'This Month', 'ogma-news' ),
                                                    'last-month'    => __( 'Last Month', 'ogma-news' ),
                                                )
                                            );
                                            self::render_field( 'select', $posts_datefilter_args );

                                            /**
                                             * number field for post count
                                             */
                                            $block_postcount_args = array(
                                                'title'         => __( 'Number of posts', 'ogma-news' ),
                                                'name'          => 'postCount',
                                                'value'         => $control->postCount,
                                                'input_attrs'   => array(
                                                    'min'   => 1,
                                                    'max'   => 7,
                                                    'step'  => 1
                                                )
                                            );
                                            self::render_field( 'number', $block_postcount_args );

                                            /**
                                             * block query wrap end
                                             */
                                            self::render_field( 'field_group_end' );

                                            /**
                                             * radio image field for block layout
                                             */
                                            $block_layout_args = array(
                                                'title'         => __( 'Block Layouts', 'ogma-news' ),
                                                'description'   => __( 'Choose from available layouts.', 'ogma-news' ),
                                                'name'          => 'blocklayout',
                                                'value'         => $control->blocklayout,
                                                'choices'       => array(
                                                    'one'    => array(
                                                        'label' => esc_html( 'Layout One' ),
                                                        'img'   => get_template_directory_uri() . '/inc/customizer/assets/images/news-grid-one.png'
                                                    ),
                                                    'two'    => array(
                                                        'label' => esc_html( 'Layout Two' ),
                                                        'img'   => get_template_directory_uri() . '/inc/customizer/assets/images/news-grid-two.png'
                                                    )
                                                ),

                                            );
                                            self::render_field( 'selector', $block_layout_args );

                                            /**
                                             * toggle field for posts cats
                                             */
                                            $posts_cats_args = array(
                                                'title'     => __( 'Show posts categories lists', 'ogma-news' ),
                                                'name'      => 'postCats',
                                                'value'     => $control->postCats,
                                            );
                                            self::render_field( 'toggle', $posts_cats_args );

                                            /**
                                             * toggle field for posts author
                                             */
                                            $posts_author_args = array(
                                                'title'     => __( 'Show posts author', 'ogma-news' ),
                                                'name'      => 'postAuthor',
                                                'value'     => $control->postAuthor,
                                            );
                                            self::render_field( 'toggle', $posts_author_args );

                                            /**
                                             * toggle field for posts date
                                             */
                                            $posts_date_args = array(
                                                'title'     => __( 'Show posts date', 'ogma-news' ),
                                                'name'      => 'postDate',
                                                'value'     => $control->postDate,
                                            );
                                            self::render_field( 'toggle', $posts_date_args );

                                            /**
                                             * toggle field for posts comment
                                             */
                                            $posts_comment_args = array(
                                                'title'     => __( 'Show posts comment', 'ogma-news' ),
                                                'name'      => 'postComment',
                                                'value'     => $control->postComment,
                                            );
                                            self::render_field( 'toggle', $posts_comment_args );

                                            /**
                                             * toggle field for posts excerpt
                                             */
                                            $posts_excerpt_args = array(
                                                'title'     => __( 'Show posts excerpt', 'ogma-news' ),
                                                'name'      => 'postExcerpt',
                                                'value'     => $control->postExcerpt,
                                            );
                                            self::render_field( 'toggle', $posts_excerpt_args );

                                            /**
                                             * toggle field for posts more
                                             */
                                            $posts_more_args = array(
                                                'title'     => __( 'Show posts more', 'ogma-news' ),
                                                'name'      => 'postMore',
                                                'value'     => $control->postMore,
                                            );
                                            self::render_field( 'toggle', $posts_more_args );
                                        ?>

                                        <div class="action-buttons news-grid">
                                            <div class="close-block"><?php esc_html_e( 'Close', 'ogma-news' ); ?></div>
                                            <div class="red-button remove-block"><?php esc_html_e( 'Remove', 'ogma-news' ); ?></div>
                                        </div><!-- .action-buttons -->
                                    </div><!-- .block-content-wrap -->

                                </div><!-- .news-grid-block-wrap -->
                            <?php
                                break;

                            case 'news-carousel' :
                        ?>
                                <div class="ogma-news-block news-carousel-block-wrap<?php echo esc_attr( $item_wrap_class ); ?>" block-name="news-carousel">

                                    <div class="block-header content-trigger">
                                        <h2 class="block-header-title"><?php esc_html_e( 'News Carousel', 'ogma-news' ); ?></h2>
                                        <span class="block-settings dashicons dashicons-admin-generic"></span>
                                        <div class="block-header-toggle">
                                            <span class="block-option dashicons dashicons-<?php echo esc_attr( $dash_icon ); ?>"></span>
                                            <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                        </div><!-- .block-header-toggle -->
                                    </div><!-- .block-header -->

                                    <div class="block-content-wrap">
                                        <?php
                                            /**
                                             * text field for block title
                                             */
                                            $block_title_arg = array(
                                                'title'         => __( 'Block Title', 'ogma-news' ),
                                                'description'   => __( 'Leave blank to hide title.', 'ogma-news' ),
                                                'name'          => 'blockTitle',
                                                'value'         => $control->blockTitle
                                            );
                                            self::render_field( 'text', $block_title_arg );

                                            /**
                                             * block query group
                                             */
                                            $block_query_group_arg = array(
                                                'title'         => __( 'Block Query', 'ogma-news' ),
                                                'description'   => __( 'Click Icon to expand the fields.', 'ogma-news' )
                                            );
                                            self::render_field( 'group_title', $block_query_group_arg );

                                            /**
                                             * block query wrap start
                                             */
                                            self::render_field( 'field_group_start' );

                                            /**
                                             * category dropdown field for block category
                                             */
                                            $block_cat_args = array(
                                                'title' => __( 'Block Category', 'ogma-news' ),
                                                'name'  => 'category',
                                                'value' => $control->category
                                            );
                                            self::render_field( 'category_dropdown', $block_cat_args );

                                            /**
                                             * select field for posts orderby
                                             */
                                            $posts_orderby_args = array(
                                                'title'     => __( 'Posts Order by', 'ogma-news' ),
                                                'name'      => 'postOrderby',
                                                'value'     => $control->postOrderby,
                                                'options'   => array(
                                                    'date-desc'     => __( 'Newest - Oldest', 'ogma-news' ),
                                                    'date-asc'      => __( 'Oldest - Newest', 'ogma-news' ),
                                                    'title-asc'     => __( 'A - Z', 'ogma-news' ),
                                                    'title-desc'    => __( 'A - Z', 'ogma-news' ),
                                                    'rand-desc'     => __( 'Random', 'ogma-news' ),
                                                )
                                            );
                                            self::render_field( 'select', $posts_orderby_args );

                                            /**
                                             * select field for posts date filter
                                             */
                                            $posts_datefilter_args = array(
                                                'title'     => __( 'Posts date filter', 'ogma-news' ),
                                                'name'      => 'postDatefilter',
                                                'value'     => $control->postDatefilter,
                                                'options'   => array(
                                                    'all'           => __( 'All', 'ogma-news' ),
                                                    'today'         => __( 'Today', 'ogma-news' ),
                                                    'this-week'     => __( 'This Week', 'ogma-news' ),
                                                    'last-week'     => __( 'Last Week', 'ogma-news' ),
                                                    'this-month'    => __( 'This Month', 'ogma-news' ),
                                                    'last-month'    => __( 'Last Month', 'ogma-news' ),
                                                )
                                            );
                                            self::render_field( 'select', $posts_datefilter_args );

                                            /**
                                             * number field for post count
                                             */
                                            $block_postcount_args = array(
                                                'title'         => __( 'Number of posts', 'ogma-news' ),
                                                'name'          => 'postCount',
                                                'value'         => $control->postCount,
                                                'input_attrs'   => array(
                                                    'min'   => 1,
                                                    'max'   => 7,
                                                    'step'  => 1
                                                )
                                            );
                                            self::render_field( 'number', $block_postcount_args );

                                            /**
                                             * block query wrap end
                                             */
                                            self::render_field( 'field_group_end' );

                                            /**
                                             * radio image field for block layout
                                             */
                                            $block_layout_args = array(
                                                'title'         => __( 'Block Layouts', 'ogma-news' ),
                                                'description'   => __( 'Choose from available layouts.', 'ogma-news' ),
                                                'name'          => 'blocklayout',
                                                'value'         => $control->blocklayout,
                                                'choices'       => array(
                                                    'one'    => array(
                                                        'label' => esc_html( 'Layout One' ),
                                                        'img'   => get_template_directory_uri() . '/inc/customizer/assets/images/news-featured-layout-one.png'
                                                    ),
                                                    'two'    => array(
                                                        'label' => esc_html( 'Layout Two' ),
                                                        'img'   => get_template_directory_uri() . '/inc/customizer/assets/images/news-carousel-two.png'
                                                    )
                                                ),

                                            );
                                            self::render_field( 'selector', $block_layout_args );

                                            /**
                                             * toggle field for posts cats
                                             */
                                            $posts_cats_args = array(
                                                'title'     => __( 'Show posts categories lists', 'ogma-news' ),
                                                'name'      => 'postCats',
                                                'value'     => $control->postCats,
                                            );
                                            self::render_field( 'toggle', $posts_cats_args );

                                            /**
                                             * toggle field for posts author
                                             */
                                            $posts_author_args = array(
                                                'title'     => __( 'Show posts author', 'ogma-news' ),
                                                'name'      => 'postAuthor',
                                                'value'     => $control->postAuthor,
                                            );
                                            self::render_field( 'toggle', $posts_author_args );

                                            /**
                                             * toggle field for posts date
                                             */
                                            $posts_date_args = array(
                                                'title'     => __( 'Show posts date', 'ogma-news' ),
                                                'name'      => 'postDate',
                                                'value'     => $control->postDate,
                                            );
                                            self::render_field( 'toggle', $posts_date_args );

                                            /**
                                             * toggle field for posts comment
                                             */
                                            $posts_comment_args = array(
                                                'title'     => __( 'Show posts comment', 'ogma-news' ),
                                                'name'      => 'postComment',
                                                'value'     => $control->postComment,
                                            );
                                            self::render_field( 'toggle', $posts_comment_args );
                                        ?>

                                        <div class="action-buttons news-carousel">
                                            <div class="close-block"><?php esc_html_e( 'Close', 'ogma-news' ); ?></div>
                                            <div class="red-button remove-block"><?php esc_html_e( 'Remove', 'ogma-news' ); ?></div>
                                        </div><!-- .action-buttons -->
                                    </div><!-- .block-content-wrap -->

                                </div><!-- .news-carousel-block-wrap -->
                            <?php
                                break;

                            case 'news-list' :
                ?>
                                <div class="ogma-news-block news-list-block-wrap" block-name="news-list">
                                    
                                    <div class="block-header content-trigger">
                                        <h2 class="block-header-title"><?php esc_html_e( 'News List', 'ogma-news' ); ?></h2>
                                        <span class="block-settings dashicons dashicons-admin-generic"></span>
                                        <div class="block-header-toggle">
                                            <span class="block-option dashicons dashicons-<?php echo esc_attr( $dash_icon ); ?>"></span>
                                            <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                        </div><!-- .block-header-toggle -->
                                    </div><!-- .block-header -->

                                    <div class="block-content-wrap">
                                        <?php
                                            /**
                                             * text field for block title
                                             */
                                            $block_title_arg = array(
                                                'title'         => __( 'Block Title', 'ogma-news' ),
                                                'description'   => __( 'Leave blank to hide title.', 'ogma-news' ),
                                                'name'          => 'blockTitle',
                                                'value'         => $control->blockTitle
                                            );
                                            self::render_field( 'text', $block_title_arg );

                                            /**
                                             * block query group
                                             */
                                            $block_query_group_arg = array(
                                                'title'         => __( 'Block Query', 'ogma-news' ),
                                                'description'   => __( 'Click Icon to expand the fields.', 'ogma-news' )
                                            );
                                            self::render_field( 'group_title', $block_query_group_arg );

                                            /**
                                             * block query wrap start
                                             */
                                            self::render_field( 'field_group_start' );

                                            /**
                                             * category dropdown field for block category
                                             */
                                            $block_cat_args = array(
                                                'title' => __( 'Block Category', 'ogma-news' ),
                                                'name'  => 'category',
                                                'value' => $control->category
                                            );
                                            self::render_field( 'category_dropdown', $block_cat_args );

                                            /**
                                             * select field for posts orderby
                                             */
                                            $posts_orderby_args = array(
                                                'title'     => __( 'Posts Order by', 'ogma-news' ),
                                                'name'      => 'postOrderby',
                                                'value'     => $control->postOrderby,
                                                'options'   => array(
                                                    'date-desc'     => __( 'Newest - Oldest', 'ogma-news' ),
                                                    'date-asc'      => __( 'Oldest - Newest', 'ogma-news' ),
                                                    'title-asc'     => __( 'A - Z', 'ogma-news' ),
                                                    'title-desc'    => __( 'A - Z', 'ogma-news' ),
                                                    'rand-desc'     => __( 'Random', 'ogma-news' ),
                                                )
                                            );
                                            self::render_field( 'select', $posts_orderby_args );

                                            /**
                                             * select field for posts date filter
                                             */
                                            $posts_datefilter_args = array(
                                                'title'     => __( 'Posts date filter', 'ogma-news' ),
                                                'name'      => 'postDatefilter',
                                                'value'     => $control->postDatefilter,
                                                'options'   => array(
                                                    'all'           => __( 'All', 'ogma-news' ),
                                                    'today'         => __( 'Today', 'ogma-news' ),
                                                    'this-week'     => __( 'This Week', 'ogma-news' ),
                                                    'last-week'     => __( 'Last Week', 'ogma-news' ),
                                                    'this-month'    => __( 'This Month', 'ogma-news' ),
                                                    'last-month'    => __( 'Last Month', 'ogma-news' ),
                                                )
                                            );
                                            self::render_field( 'select', $posts_datefilter_args );

                                            /**
                                             * number field for post count
                                             */
                                            $block_postcount_args = array(
                                                'title'         => __( 'Number of posts', 'ogma-news' ),
                                                'name'          => 'postCount',
                                                'value'         => $control->postCount,
                                                'input_attrs'   => array(
                                                    'min'   => 1,
                                                    'max'   => 15,
                                                    'step'  => 1
                                                )
                                            );
                                            self::render_field( 'number', $block_postcount_args );

                                            /**
                                             * block query wrap end
                                             */
                                            self::render_field( 'field_group_end' );

                                            /**
                                             * radio image field for block layout
                                             */
                                            $block_layout_args = array(
                                                'title'         => __( 'Block Layouts', 'ogma-news' ),
                                                'description'   => __( 'Choose from available layouts.', 'ogma-news' ),
                                                'name'          => 'blocklayout',
                                                'value'         => $control->blocklayout,
                                                'choices'       => array(
                                                    'one'    => array(
                                                        'label' => esc_html( 'Layout One' ),
                                                        'img'   => get_template_directory_uri() . '/inc/customizer/assets/images/news-list-one.png'
                                                    ),
                                                    'two'    => array(
                                                        'label' => esc_html( 'Layout Two' ),
                                                        'img'   => get_template_directory_uri() . '/inc/customizer/assets/images/news-list-two.png'
                                                    )
                                                ),

                                            );
                                            self::render_field( 'selector', $block_layout_args );

                                            /**
                                             * toggle field for posts cats
                                             */
                                            $posts_cats_args = array(
                                                'title'     => __( 'Show posts categories lists', 'ogma-news' ),
                                                'name'      => 'postCats',
                                                'value'     => $control->postCats,
                                            );
                                            self::render_field( 'toggle', $posts_cats_args );

                                            /**
                                             * toggle field for posts author
                                             */
                                            $posts_author_args = array(
                                                'title'     => __( 'Show posts author', 'ogma-news' ),
                                                'name'      => 'postAuthor',
                                                'value'     => $control->postAuthor,
                                            );
                                            self::render_field( 'toggle', $posts_author_args );

                                            /**
                                             * toggle field for posts date
                                             */
                                            $posts_date_args = array(
                                                'title'     => __( 'Show posts date', 'ogma-news' ),
                                                'name'      => 'postDate',
                                                'value'     => $control->postDate,
                                            );
                                            self::render_field( 'toggle', $posts_date_args );

                                            /**
                                             * toggle field for posts comment
                                             */
                                            $posts_comment_args = array(
                                                'title'     => __( 'Show posts comment', 'ogma-news' ),
                                                'name'      => 'postComment',
                                                'value'     => $control->postComment,
                                            );
                                            self::render_field( 'toggle', $posts_comment_args );

                                            /**
                                             * toggle field for posts excerpt
                                             */
                                            $posts_excerpt_args = array(
                                                'title'     => __( 'Show posts excerpt', 'ogma-news' ),
                                                'name'      => 'postExcerpt',
                                                'value'     => $control->postExcerpt,
                                            );
                                            self::render_field( 'toggle', $posts_excerpt_args );

                                            /**
                                             * toggle field for posts more
                                             */
                                            $posts_more_args = array(
                                                'title'     => __( 'Show posts more', 'ogma-news' ),
                                                'name'      => 'postMore',
                                                'value'     => $control->postMore,
                                            );
                                            self::render_field( 'toggle', $posts_more_args );
                                        ?>

                                        <div class="action-buttons news-list">
                                            <div class="close-block"><?php esc_html_e( 'Close', 'ogma-news' ); ?></div>
                                            <div class="red-button remove-block"><?php esc_html_e( 'Remove', 'ogma-news' ); ?></div>
                                        </div><!-- .action-buttons -->

                                    </div><!-- .block-content-wrap -->

                                </div><!-- .news-list-block-wrap -->
                        <?php
                                break;

                            default : esc_html_e( 'No block defined ', 'ogma-news' );
                        }
                    endforeach;
                ?>
                <div class="button clone-block"><?php esc_html_e( 'Clone Block', 'ogma-news' ); ?></div>
            </div><!-- .blocks-repeater-control-wrap -->

            <input type="hidden" <?php esc_attr( $this->link() ); ?> class="blocks-repeater-control" value="<?php echo esc_attr( $this->value() ); ?>" />
    <?php
        } // end function render_content

        public function render_field( $type, $field_args = array() ) {
            switch ( $type ) {

                case 'text' :
    ?>
                    <div class="customize-text-field">
                        <label><?php echo esc_html( $field_args['title'] ); ?></label>
                        <p class="description"><?php echo esc_html( $field_args['description'] ); ?></p>
                        <input type="text" class="block-repeater-control-field" data-name="<?php echo esc_attr( $field_args['name'] ); ?>" value="<?php echo esc_attr( $field_args['value'] ); ?>"/>
                    </div><!-- .customize-text-field -->
    <?php
                    break;

                case 'url' :
    ?>
                    <div class="customize-url-field">
                        <label><?php echo esc_html( $field_args['title'] ); ?></label>
                        <input type="url" class="block-repeater-control-field" data-name="<?php echo esc_attr( $field_args['name'] ); ?>" value="<?php echo esc_url( $field_args['value'] ); ?>"/>
                    </div><!-- .customize-url-field -->
    <?php
                    break;

                case 'number' :
    ?>
                    <div class="customize-number-field">
                        <label><?php echo esc_html( $field_args['title'] ); ?></label>
                        <input type="number" min="<?php echo absint( $field_args['input_attrs']['min'] ); ?>" max="<?php echo absint( $field_args['input_attrs']['max'] ); ?>" step="<?php echo absint( $field_args['input_attrs']['step'] ); ?>" class="block-repeater-control-field" data-name="<?php echo esc_attr( $field_args['name'] ); ?>" value="<?php echo absint( $field_args['value'] ); ?>"/>
                    </div><!-- .customize-number-field -->
    <?php
                    break;
                    
                case 'toggle' :
    ?>
                    <div class="customize-toggle-field">
                        <div class="block-repeater-toggle">
                            <div class="toggle-wrapper">
                                <span class="toggle-title"><?php echo esc_html( $field_args['title'] ); ?></span>
                                <input type="checkbox" class="block-repeater-control-field" data-name="<?php echo esc_attr( $field_args['name'] ); ?>" <?php checked( true, $field_args['value'] ); ?> >
                                <label class="toggle-label"></label>
                            </div><!-- .toggle-wrapper -->
                        </div><!-- .block-repeater-toggle -->
                    </div><!-- .customize-toggle-field -->
    <?php
                    break;

                case 'select' :
    ?>
                    <div class="customize-select-field select-<?php echo esc_attr( $field_args['name'] ); ?>">
                        <label><?php echo esc_html( $field_args['title'] ); ?></label>
                        <select class="block-repeater-control-field" data-name="<?php echo esc_attr( $field_args['name'] ); ?>">
                            <?php
                                foreach ( $field_args['options'] as $key => $value ) {
                                    echo '<option value="'. esc_attr( $key ) .'" '. selected( $key, $field_args['value'] ) .'>'. esc_html( $value ) .'</option>';
                                }
                            ?>
                        </select>
                    </div><!-- .customize-select-field .select-<?php echo esc_attr( $field_args['name'] ); ?> -->
    <?php
                    break;

                case 'category_dropdown' :

                    $dropdown_categories = wp_dropdown_categories(
                        array(
                            'name'              => 'block-category',
                            'echo'              => 0,
                            'show_option_none'  => esc_html__( 'Latest Posts', 'ogma-news' ),
                            'value_field'       => 'slug',
                            'option_none_value' => 'all',
                            'selected'          => esc_attr( $field_args['value'] ),
                            'show_count'        => 1,
                            'hierarchical'      => 1,
                            'hide_empty'        => 1
                        )
                    );

                    $replace_select = '<select class="block-repeater-control-field" data-name="'. esc_attr( $field_args['name'] ) .'"';

                    // Hackily add in the data link parameter.
                    $dropdown_categories = str_replace( '<select', $replace_select, $dropdown_categories );
    ?>
                    <div class="customize-select-field select-category">
                        <label><?php echo esc_html( $field_args['title'] ); ?></label>
                        <?php echo $dropdown_categories; ?>
                    </div><!-- .customize-select-field .select-category -->
    <?php
                    break;

                case 'selector':
    ?>
                    <div class="customize-radio-image-field">
                        <label><?php echo esc_html( $field_args['title'] ); ?></label>
                        <p class="description"><?php echo esc_html( $field_args['description'] ); ?></p>
                        <?php
                            foreach( $field_args['choices'] as $layout_key => $layout ) :
                        ?>
                                <label class="radio-image-single <?php if ( $layout_key === $field_args['value'] ) echo 'selected'; ?>" data-value="<?php echo esc_attr( $layout_key ); ?>">
                                    <img src="<?php echo esc_url( $layout['img'] ); ?>"/>
                                    <span class="lbl-tooltip"><?php echo esc_html( $layout['label'] ); ?></span>
                                </label>
                        <?php
                            endforeach;
                        ?>
                        <input type="hidden" class="block-repeater-control-field" data-name="<?php echo esc_attr( $field_args['name'] ); ?>" value="<?php echo esc_attr( $field_args['value'] ); ?>"/>
                    </div><!-- .customize-radio-image-field -->
    <?php
                    break;

                case 'upload' :
    ?>
                    <div class="customize-upload-image-field">
                        <?php
                            $image_html = $image_class = "";
                            if ( ! empty( $field_args['value'] ) ) {
                                $image_html = '<img src="'.esc_url( $field_args['value'] ).'" style="max-width:100%;"/>';
                                $image_class = ' hidden';
                            }
                        ?>
                        <label><?php echo esc_html( $field_args['title'] ); ?></label>
                        <div class="placeholder<?php echo esc_attr( $image_class ); ?>"><?php esc_html_e( 'No image selected', 'ogma-news' ); ?></div>
                        <div class="field-thumbnail thumbnail-image"><?php echo $image_html; ?></div>
                        <div class="upload-actions clearfix">
                            <button type="button" class="ogma-news-button img-delete-button align-left">
                                <?php esc_html_e( 'Remove', 'ogma-news' ); ?>
                            </button>
                            <button type="button" class="ogma-news-button img-upload-button alignright">
                                <?php esc_html_e( 'Select Image', 'ogma-news' ); ?>
                            </button>
                        </div><!-- .upload-actions -->
                        <input type="hidden" class="block-repeater-control-field" data-name="<?php echo esc_attr( $field_args['name'] ); ?>" value="<?php echo esc_url( $field_args['value'] ); ?>">
                    </div><!-- .customize-upload-image-field -->
    <?php
                    break;

                case 'field_group_start';
                    echo '<div class="field-group-wrapper">';
                    break;

                case 'field_group_end';
                    echo '</div><!-- .field-group-wrapper --></div><!-- .group-toggle-wrapper -->';
                    break;

                case 'group_title';
                    echo '<div class="group-toggle-wrapper"><div class="block-query-group"><label>'. esc_html( $field_args['title'] ) .'</label><span class="group-trigger dashicons dashicons-edit"></span></div><!-- .block-query-group -->';
                    break;
                
                default:
                    // code...
                    break;
            }
        }
    }

endif;