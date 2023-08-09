<?php
/**
 * Partial template to display social icons
 *
 * @package Ogma News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_news_social_icons = ogma_news_get_customizer_option_value( 'ogma_news_social_icons' );
$ogma_news_social_icons = json_decode( $ogma_news_social_icons );

if ( empty( $ogma_news_social_icons ) ) {
    return;
}

$icon_target = '_self';

$ogma_news_social_icon_link_target = ogma_news_get_customizer_option_value( 'ogma_news_social_icon_link_target' );

if ( false !== $ogma_news_social_icon_link_target ) {
    $icon_target = '_blank';
}
?>

<ul class="social-icons-wrapper">
    <?php
        foreach ( $ogma_news_social_icons as $social_icon ) {
            if ( 'show' === $social_icon->item_visible ) {
    ?>
                <li class="social-icon">
                    <a href="<?php echo esc_url( $social_icon->social_url ); ?>" target="<?php echo esc_attr( $icon_target ); ?>">
                        <i class="<?php echo esc_attr( $social_icon->social_icon ); ?>"></i>
                    </a>
                </li><!-- .social-icon -->
    <?php
            }
        }
    ?>
</ul><!-- .social-icons-wrapper -->
