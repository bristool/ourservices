<?php
/**
 * Template part for displaying a content located in bottom footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_news_footer_bottom_enable = ogma_news_get_customizer_option_value( 'ogma_news_footer_bottom_enable' );

if ( false === $ogma_news_footer_bottom_enable ) {
    return;
}

?>

<div class="site-info">
    <div class="ogma-news-container ogma-news-flex">
        <div class="copyright-content-wrapper">
            <span class="copyright-content">
                <?php
                    $copyright_content = ogma_news_get_customizer_option_value( 'ogma_news_footer_copyright_info' );
                    echo wp_kses_post( str_replace( '{year}', date('Y'), $copyright_content ) );
                ?>
            </span><!-- .copyright-content -->
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ogma-news' ) ); ?>">
                <?php
                /* translators: %s: CMS name, i.e. WordPress. */
                printf( esc_html__( 'Proudly powered by %s', 'ogma-news' ), 'WordPress' );
                ?>
            </a>
            <span class="sep"> | </span>
                <?php
                /* translators: 1: Theme name, 2: Theme author. */
                printf( esc_html__( 'Theme: %1$s by %2$s.', 'ogma-news' ), 'ogma-news', '<a href="https://mysterythemes.com/">Mystery Themes</a>' );
                ?>
        </div><!-- .copyright-content-wrapper -->
        <nav id="footer-navigation" class="footer-navigation" <?php ogma_news_schema_markup( 'site_navigation' ); ?>>
            <div class="footer-menu-wrap">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer_menu',
                        'menu_id'        => 'footer-menu',
                    )
                );
                ?>
            </div><!-- .footer-menu-wrap -->
        </nav><!-- #site-navigation -->
    </div>
</div><!-- .site-info -->