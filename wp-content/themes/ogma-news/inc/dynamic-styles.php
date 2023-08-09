<?php
/**
 * Managed the theme's dynamic styles.
 *
 * @package Ogma News
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*---------------------- Custom CSS ----------------------------*/
    
    if ( ! function_exists( 'ogma_news_custom_css' ) ) :

        /**
         * function to handle ogma_news_head_css filter where all the css relation functions are hooked.
         *
         * @since 1.0.0
         */
        function ogma_news_custom_css( $output_css = NULL ) {

            // Add filter ogma_news_head_css for adding custom css via other functions.
            $output_css = apply_filters( 'ogma_news_head_css', $output_css );

            if ( ! empty( $output_css ) ) {
                $output_css = wp_strip_all_tags( ogma_news_minify_css( $output_css ) );
                echo "<!--Ogma News CSS -->\n<style type=\"text/css\">\n". $output_css ."\n</style>";
            }
        }

    endif;

    add_action( 'wp_head', 'ogma_news_custom_css', 9999 );

/*---------------------- General CSS ---------------------------*/

    if ( ! function_exists( 'ogma_news_general_css' ) ) :

        /**
         * function to handle the genral css for all sections.
         * 
         * @since 1.0.0
         */
        function ogma_news_general_css( $output_css ) {
            $ogma_news_primary_theme_color    = ogma_news_get_customizer_option_value( 'ogma_news_primary_theme_color' );
            $primary_darker_color   = ogma_news_darker_color( $ogma_news_primary_theme_color, '-20' );
            $ogma_news_text_color             = ogma_news_get_customizer_option_value( 'ogma_news_text_color' );
            $ogma_news_link_color             = ogma_news_get_customizer_option_value( 'ogma_news_link_color' );
            $ogma_news_link_hover_color       = ogma_news_get_customizer_option_value( 'ogma_news_link_hover_color' );
            
            $get_categories = get_categories( array( 'hide_empty' => 1 ) );

            $ogma_news_main_container_width   = ogma_news_get_customizer_option_value( 'ogma_news_main_container_width' );
            $ogma_news_boxed_container_width  = ogma_news_get_customizer_option_value( 'ogma_news_boxed_container_width' );

            //define variable for custom css
            $custom_css = '';

            // Background Color
            $custom_css .= ".navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.reply .comment-reply-link,.widget_search .search-submit,.widget_search .search-submit:hover,.widget_tag_cloud .tagcloud a:hover,.widget.widget_tag_cloud a:hover,.header-main-layout--one .primary-menu-wrapper .ogma-news-container,.header-main-layout--one .is-sticky .primary-menu-wrapper,#site-navigation ul.sub-menu,#site-navigation ul.children,.header-search-wrapper .search-form-wrap .search-submit,.sticky-sidebar-close,.header-main-layout--two .sidebar-menu-toggle a:hover,.news-ticker-label,.ogma-news-banner-wrapper .slider-wrapper .post-cats-wrap ul li a,.news-carousel-block .block-layout--two .post-cats-wrap li a,.banner-tabbed-wrapper ul.banner-tabs li.ui-state-active a,.banner-tabbed-wrapper ul.banner-tabs li:hover a,.news-carousel-block .lSAction a:hover,.trending-posts-wrapper .lSAction a:hover,.single-posts-layout--two .post-cats-wrap li a,.error-404.not-found .error-button-wrap a,#ogma-news-scrollup,.trending-posts .post-thumbnail-wrap .post-count,.navigation .nav-links a.page-numbers:hover,.navigation .nav-links .page-numbers.current{background-color: ". esc_attr( $ogma_news_primary_theme_color ) ."}\n";

            // Color
            $custom_css .= "a,a:hover,a:focus,a:active,.entry-cat .cat-links a:hover,.entry-cat a:hover,.byline a:hover,.posted-on a:hover,.entry-footer a:hover,.comment-author .fn .url:hover,.commentmetadata .comment-edit-link,#cancel-comment-reply-link,#cancel-comment-reply-link:before,.logged-in-as a,.widget a:hover,.widget a:hover::before,.widget li:hover::before,.header-main-layout--two #site-navigation ul li:hover>a,.header-main-layout--two #site-navigation ul li.current-menu-item>a,.header-main-layout--two #site-navigation ul li.current_page_item>a,.header-main-layout--two #site-navigation ul li.current-menu-ancestor>a,.header-main-layout--two #site-navigation ul li.focus>a,.header-main-layout--two .ogma-news-icon-elements-wrap .search-icon a:hover,.header-news-ticker-wrapper .posted-on a,.ogma-news-banner-wrapper .lSAction a:hover,.ogma-news-banner-wrapper .banner-tabbed-wrapper .post-cats-wrap a,.post-cats-wrap li a,.ogma-news-button a:hover,.post-meta-wrap span a:hover,.post-meta-wrap span:hover,.ogma-news-post-content-wrap .entry-meta span:hover a,.ogma-news-post-content-wrap .entry-meta span:hover:before,.site-footer .widget_archive a:hover,.site-footer .widget_categories a:hover,.site-footer .widget_recent_entries a:hover,.site-footer .widget_meta a:hover,.site-footer .widget_recent_comments li:hover,.site-footer .widget_rss li:hover,.site-footer .widget_pages li a:hover,.site-footer .widget_nav_menu li a:hover,.site-footer .wp-block-latest-posts li a:hover,.site-footer .wp-block-archives li a:hover,.site-footer .wp-block-categories li a:hover,.site-footer .wp-block-page-list li a:hover,.site-footer .wp-block-latest-comments li:hover,.ogma-news-post-title-wrap .entry-meta span:hover a,.ogma-news-post-title-wrap .entry-meta span:hover:before,.dark-mode.header-main-layout--two #site-navigation ul li a:hover,.dark-mode.header-main-layout--two .ogma-news-icon-elements-wrap .search-icon a:hover,.dark-mode .ogma-news-button a:hover,.dark-mode .widget_archive a:hover,.dark-mode .widget_categories a:hover,.dark-mode .widget_recent_entries a:hover,.dark-mode .widget_meta a:hover,.dark-mode .widget_recent_comments li:hover,.dark-mode .widget_rss li:hover,.dark-mode .widget_pages li a:hover,.dark-mode .widget_nav_menu li a:hover,.dark-mode .wp-block-latest-posts li a:hover,.dark-mode .wp-block-archives li a:hover,.dark-mode .wp-block-categories li a:hover,.dark-mode .wp-block-page-list li a:hover,.dark-mode .wp-block-latest-comments li:hover,.dark-mode .header-news-ticker-wrapper .post-title a:hover,.dark-mode .post-meta-wrap span a:hover,.dark-mode .post-meta-wrap span:hover,.dark-mode .ogma-news-post-content-wrap .entry-meta span a:hover,.breadcrumb-trail.breadcrumbs ul li a:hover{color: ". esc_attr( $ogma_news_primary_theme_color ) ."}\n";

            // Border Color
            $custom_css .= ".navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.widget_search .search-submit,.widget_search .search-submit:hover,.widget_tag_cloud .tagcloud a:hover,.widget.widget_tag_cloud a:hover,.header-main-layout--two .sidebar-menu-toggle a:hover,.news-carousel-block .lSAction a:hover,.trending-posts-wrapper .lSAction a:hover,.navigation .nav-links a.page-numbers:hover,.navigation .nav-links .page-numbers.current{border-color: ". esc_attr( $ogma_news_primary_theme_color ) ."}\n";

            // Border Left Color
            $custom_css .= ".page-header .page-title,.block-title,.related-post-title,.widget-title{border-left-color: ". esc_attr( $ogma_news_primary_theme_color ) ."}\n";

            // RTL Border Right Color
            $custom_css .= ".rtl .page-header .page-title,.rtl .block-title,.rtl .related-post-title,.rtl .widget-title{border-right-color: ". esc_attr( $ogma_news_primary_theme_color ) ."}\n";

            // Border Top Color
            $custom_css .= ".search-form-wrap,.header-main-layout--two .primary-menu-wrapper{border-top-color: ". esc_attr( $ogma_news_primary_theme_color ) ."}\n";

            // Responsive color
            $custom_css .= "@media (max-width: 979px) { .header-main-layout--one #site-navigation .primary-menu-wrap {background-color: ". esc_attr( $ogma_news_primary_theme_color ) ."}}\n";

            $custom_css .= "@media (max-width: 979px) { .header-main-layout--two .ogma-news-menu-toogle:hover {color: ". esc_attr( $ogma_news_primary_theme_color ) ."}}\n";

            // Woocommerce Dynamic color

            $custom_css .= ".woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce .product_meta a:hover,.woocommerce-error:before, .woocommerce-info:before, .woocommerce-message:before{color: ". esc_attr( $ogma_news_primary_theme_color ) ."}\n";

            $custom_css .= ".woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce ul.products li.product:hover .button,.woocommerce ul.products li.product:hover .added_to_cart,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt.woocommerce nav.woocommerce-pagination ul li a,.woocommerce nav.woocommerce-pagination ul li span.woocommerce span.onsale,.woocommerce div.product .woocommerce-tabs ul.tabs li.active,.woocommerce #respond input#submit.disabled,.woocommerce #respond input#submit:disabled,.woocommerce #respond input#submit:disabled[disabled],.woocommerce a.button.disabled, .woocommerce a.button:disabled,.woocommerce a.button:disabled[disabled],.woocommerce button.button.disabled,.woocommerce button.button:disabled,.woocommerce button.button:disabled[disabled],.woocommerce input.button.disabled,.woocommerce input.button:disabled,.woocommerce input.button:disabled[disabled].woocommerce #respond input#submit.alt.disabled,.woocommerce #respond input#submit.alt.disabled:hover,.woocommerce #respond input#submit.alt:disabled,.woocommerce #respond input#submit.alt:disabled:hover,.woocommerce #respond input#submit.alt:disabled[disabled],.woocommerce #respond input#submit.alt:disabled[disabled]:hover,.woocommerce a.button.alt.disabled,.woocommerce a.button.alt.disabled:hover,.woocommerce a.button.alt:disabled,.woocommerce a.button.alt:disabled:hover,.woocommerce a.button.alt:disabled[disabled],.woocommerce a.button.alt:disabled[disabled]:hover,.woocommerce button.button.alt.disabled,.woocommerce button.button.alt.disabled:hover,.woocommerce button.button.alt:disabled,.woocommerce button.button.alt:disabled:hover,.woocommerce button.button.alt:disabled[disabled],.woocommerce button.button.alt:disabled[disabled]:hover,.woocommerce input.button.alt.disabled,.woocommerce input.button.alt.disabled:hover,.woocommerce input.button.alt:disabled,.woocommerce input.button.alt:disabled:hover,.woocommerce input.button.alt:disabled[disabled],.woocommerce input.button.alt:disabled[disabled]:hover.woocommerce,.widget_price_filter .ui-slider .ui-slider-range,.woocommerce-MyAccount-navigation-link a,.woocommerce-store-notice, p.demo_store{background-color: ". esc_attr( $ogma_news_primary_theme_color ) ."}\n";

            $custom_css .= ".woocommerce ul.products li.product:hover,.woocommerce-page ul.products li.product:hover.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce ul.products li.product:hover .button,.woocommerce ul.products li.product:hover .added_to_cart,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt.woocommerce #respond input#submit.alt.disabled,.woocommerce #respond input#submit.alt.disabled:hover,.woocommerce #respond input#submit.alt:disabled,.woocommerce #respond input#submit.alt:disabled:hover,.woocommerce #respond input#submit.alt:disabled[disabled],.woocommerce #respond input#submit.alt:disabled[disabled]:hover,.woocommerce a.button.alt.disabled,.woocommerce a.button.alt.disabled:hover,.woocommerce a.button.alt:disabled,.woocommerce a.button.alt:disabled:hover,.woocommerce a.button.alt:disabled[disabled],.woocommerce a.button.alt:disabled[disabled]:hover,.woocommerce button.button.alt.disabled,.woocommerce button.button.alt.disabled:hover,.woocommerce button.button.alt:disabled,.woocommerce button.button.alt:disabled:hover,.woocommerce button.button.alt:disabled[disabled],.woocommerce button.button.alt:disabled[disabled]:hover,.woocommerce input.button.alt.disabled,.woocommerce input.button.alt.disabled:hover,.woocommerce input.button.alt:disabled,.woocommerce input.button.alt:disabled:hover,.woocommerce input.button.alt:disabled[disabled],.woocommerce input.button.alt:disabled[disabled]:hover.woocommerce .widget_price_filter .ui-slider .ui-slider-handle{border-color: ". esc_attr( $ogma_news_primary_theme_color ) ."}\n";

            $custom_css .= ".woocommerce div.product .woocommerce-tabs ul.tabs{border-bottom-color: ". esc_attr( $ogma_news_primary_theme_color ) ."}\n";

            $custom_css .= ".woocommerce-error, .woocommerce-info, .woocommerce-message{border-top-color: ". esc_attr( $ogma_news_primary_theme_color ) ."}\n";

            // Preloader Color
            $custom_css .= ".ogma-news-wave .og-rect,.ogma-news-three-bounce .og-child,.ogma-news-folding-cube .og-cube:before{background-color: ". esc_attr( $ogma_news_primary_theme_color ) ."}\n";

            // Primary Hover Color
            $custom_css .= "#site-navigation ul li:hover > a, #site-navigation ul li.current-menu-item > a, #site-navigation ul li.current_page_item > a, #site-navigation ul li.current-menu-ancestor > a, #site-navigation ul li.focus > a{background-color: ". esc_attr( $primary_darker_color ) ."}\n";

            // Text Color
            $custom_css .= "body {color: ". esc_attr( $ogma_news_text_color ) ."}\n";

            // Link Color
            $custom_css .= ".page-content a, .entry-content a, .entry-summary a {color: ". esc_attr( $ogma_news_link_color ) ."}\n";

            // Link Hover Color
            $custom_css .= ".page-content a:hover, .entry-content a:hover, .entry-summary a:hover{color: ". esc_attr( $ogma_news_link_hover_color ) ."}\n";

            // different categories color
            foreach ( $get_categories as $category ) {
                $get_term_id = $category->term_id;
                $get_cat_color = get_theme_mod( 'category_color_'.strtolower( $get_term_id ), '#3b2d1b' );

                $custom_css .= ".ogma-news-banner-wrapper .post-cats-wrap .post-cats-list li.cat-".absint( $get_term_id ) ." a { color: ". esc_attr( $get_cat_color ) ."}\n";

                $custom_css .= ".news-carousel-block .block-layout--two .post-cats-wrap .post-cats-list li.cat-".absint( $get_term_id ) ." a { background: ". esc_attr( $get_cat_color ) ."}\n";

                $custom_css .= ".post-cats-wrap .post-cats-list li.cat-".absint( $get_term_id ) ." a { color: ". esc_attr( $get_cat_color ) ."}\n";

                $custom_css .= ".ogma-news-banner-wrapper.frontpage-banner-layout--two .tabbed-content-wrapper .post-cats-wrap .post-cats-list li.cat-".absint( $get_term_id ) ." a { color: ". esc_attr( $get_cat_color ) ."}\n";

                $custom_css .= ".ogma-news-banner-wrapper.frontpage-banner-layout--two .slider-wrapper .post-cats-wrap ul li.cat-".absint( $get_term_id ) ." a { background-color: ". esc_attr( $get_cat_color ) ."}\n";


                $custom_css .= ".single-posts-layout--two .post-cats-wrap .post-cats-list li.cat-".absint( $get_term_id ) ." a { background-color: ". esc_attr( $get_cat_color ) ."}\n";
            }

            $custom_css .= ".ogma-news-container{width: ". esc_attr( $ogma_news_main_container_width ) ."px}\n";

            $custom_css .= ".ogma-news-site-layout--boxed #page{width: ". esc_attr( $ogma_news_boxed_container_width ) ."px}\n";

            // frontpage banner bg type with value
            $ogma_news_banner_bg_type = ogma_news_get_customizer_option_value( 'ogma_news_banner_bg_type' );
            if ( 'bg-image' === $ogma_news_banner_bg_type ) {
                $ogma_news_banner_bg_image        = ogma_news_get_customizer_option_value( 'ogma_news_banner_bg_image' );
                $ogma_news_banner_bg_image_url    = wp_get_attachment_image_url( $ogma_news_banner_bg_image, 'full' );
                $custom_css .= ".ogma-news-banner-wrapper{background-image:url(". esc_url( $ogma_news_banner_bg_image_url ) .")}\n";
            } elseif ( 'bg-color' === $ogma_news_banner_bg_type ) {
                $ogma_news_banner_bg_color = ogma_news_get_customizer_option_value( 'ogma_news_banner_bg_color' );
                $custom_css .= ".ogma-news-banner-wrapper{background-color: ". esc_attr( $ogma_news_banner_bg_color ) ."}\n";
            }

            // top header bg color
            $ogma_news_header_top_bg_color = ogma_news_get_customizer_option_value( 'ogma_news_header_top_bg_color' );
            $custom_css .= "#top-header{background-color: ". esc_attr( $ogma_news_header_top_bg_color ) ."}\n";
            
            if ( ! empty( $custom_css ) ) {
                $output_css .= $custom_css;
            }

            return $output_css;
        }

    endif;

    add_filter( 'ogma_news_head_css', 'ogma_news_general_css' );

/*---------------------- Header CSS------------------------ ----*/
    
    if ( ! function_exists( 'ogma_news_main_header_css' ) ) :

        /**
         * function to handle the css for header section.
         * 
         * @since 1.0.0
         */
        function ogma_news_main_header_css( $output_css ) {

            $ogma_news_header_main_bg_type = ogma_news_get_customizer_option_value( 'ogma_news_header_main_bg_type' );

            $custom_css = '';

            if ( 'bg-image' === $ogma_news_header_main_bg_type ) {
                $ogma_news_header_main_bg_image        = ogma_news_get_customizer_option_value( 'ogma_news_header_main_bg_image' );
                $ogma_news_header_main_bg_image_url    = wp_get_attachment_image_url( $ogma_news_header_main_bg_image, 'full' );
                if ( ! empty( $ogma_news_header_main_bg_image_url ) ) {
                    $custom_css .= "background-image:url(". esc_url( $ogma_news_header_main_bg_image_url ) .")\n";
                }
            } elseif ( 'bg-color' === $ogma_news_header_main_bg_type ) {
                $ogma_news_header_main_bg_color = ogma_news_get_customizer_option_value( 'ogma_news_header_main_bg_color' );
                $custom_css .= "background-color: ". esc_attr( $ogma_news_header_main_bg_color ) ."\n";
            }

            if ( ! empty( $custom_css ) ) {
                $output_css .= '/* Main Header CSS */#masthead{'. $custom_css .'}';
            }

            return $output_css;

        }

    endif;

    add_filter( 'ogma_news_head_css', 'ogma_news_main_header_css' );

/*---------------------- Typography CSS-------------------------*/
    
    if ( ! function_exists( 'ogma_news_typography_css' ) ) :

    /**
     * function to handle the typography css.
     *
     * @since 1.0.0
     */
    function ogma_news_typography_css( $output_css ) {

        $custom_css = '';

        /**
         * Body typography
         */
        $ogma_news_body_font_family       = ogma_news_get_customizer_option_value( 'ogma_news_body_font_family' );
        $ogma_news_body_font_weight       = ogma_news_get_customizer_option_value( 'ogma_news_body_font_weight' );
        $ogma_news_body_font_style        = ogma_news_get_customizer_option_value( 'ogma_news_body_font_style' );
        $ogma_news_body_font_transform    = ogma_news_get_customizer_option_value( 'ogma_news_body_font_transform' );
        $ogma_news_body_font_decoration   = ogma_news_get_customizer_option_value( 'ogma_news_body_font_decoration' );

        $custom_css .= "body{
            font-family:        $ogma_news_body_font_family;
            font-style:         $ogma_news_body_font_style;
            font-weight:        $ogma_news_body_font_weight;
            text-decoration:    $ogma_news_body_font_decoration;
            text-transform:     $ogma_news_body_font_transform;
        }\n";

        /**
         * H1 to H6 typography
         */
        $ogma_news_heading_font_family       = ogma_news_get_customizer_option_value( 'ogma_news_heading_font_family' );
        $ogma_news_heading_font_weight       = ogma_news_get_customizer_option_value( 'ogma_news_heading_font_weight' );
        $ogma_news_heading_font_style        = ogma_news_get_customizer_option_value( 'ogma_news_heading_font_style' );
        $ogma_news_heading_font_transform    = ogma_news_get_customizer_option_value( 'ogma_news_heading_font_transform' );
        $ogma_news_heading_font_decoration   = ogma_news_get_customizer_option_value( 'ogma_news_heading_font_decoration' );

        $custom_css .= "h1, h2, h3, h4, h5, h6 {
            font-family:        $ogma_news_heading_font_family;
            font-style:         $ogma_news_heading_font_style;
            font-weight:        $ogma_news_heading_font_weight;
            text-decoration:    $ogma_news_heading_font_decoration;
            text-transform:     $ogma_news_heading_font_transform;
        }\n";

        if ( ! empty( $custom_css ) ) {
            $output_css .= '/*/ Typography CSS /*/'. $custom_css;
        }

        return $output_css;
    }

endif;

add_filter( 'ogma_news_head_css', 'ogma_news_typography_css' );