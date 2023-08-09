<?php
/**
 * Customizer Repeater Control.
 * 
 * @package Ogma News
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Ogma_News_Control_Repeater' ) ) :
    
    /**
     * Repeater control
     *
     * @since 1.0.0
     */
    class Ogma_News_Control_Repeater extends WP_Customize_Control {

        /**
         * The control type.
         *
         * @access public
         * @var string
         * @since 1.0.0
         */
        public $type = 'ogma-news-repeater';

        /**
         * The repeater field label.
         *
         * @access public
         * @var string
         * @since 1.0.0
         */
        public $ogma_news_box_label = '';

        /**
         * The repeater field add button label.
         *
         * @access public
         * @var string
         * @since 1.0.0
         */
        public $ogma_news_box_add_control = '';

        /**
         * The repeater field limit count.
         *
         * @access public
         * @var int
         * @since 1.0.0
         */
        public $ogma_news_field_limit;

        /**
         * The fields that each container row will contain.
         *
         * @access public
         * @var array
         * @since 1.0.0
         */
        public $fields = array();

        /**
         * Get the listed categories.
         *
         * @access public
         * @var array
         * @since 1.0.0
         */
        public $categories = '';

        /**
         * Repeater drag and drop controller
         *
         * @since  1.0.0
         */
        public function __construct( $manager, $id, $args = array(), $fields = array() ) {
            
            $this->fields = $fields;
            $this->ogma_news_box_label          = $args['ogma_news_box_label_text'] ;
            $this->ogma_news_box_add_control    = $args['ogma_news_box_add_control_text'];
            $this->ogma_news_field_limit        = $args['ogma_news_field_limit'];
            $this->categories               = get_categories();
            parent::__construct( $manager, $id, $args );
        }

        protected function render_content() {

            $repeater_id    = $this->id;
            $values         = json_decode( $this->value() );
            $field_count    = count( $values );
            
    ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

            <?php if ( $this->description ) { ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post( $this->description ); ?>
                </span>
            <?php } ?>

            <ul class="ogma-news-repeater-field-control-wrap">
                <?php $this->ogma_news_get_fields(); ?>
            </ul>

            <input type="hidden" <?php $this->link(); ?> class="ogma-news-repeater-collector" value="<?php echo esc_attr( $this->value() ); ?>" />
            <input type="hidden" name="<?php echo esc_attr( $repeater_id ).'_count'; ?>" class="field-count" value="<?php echo absint( $field_count ); ?>">
            <input type="hidden" name="field_limit" class="field-limit" value="<?php echo esc_attr( $this->ogma_news_field_limit ); ?>">
            <button type="button" class="button ogma-news-repeater-add-control-field"><i class="bx bx-plus"></i><?php echo esc_html( $this->ogma_news_box_add_control ); ?></button>
    <?php
        }

        private function ogma_news_get_fields() {

            $fields = $this->fields;
            $values = json_decode( $this->value() );

            if ( is_array( $values ) ) {

                foreach ( $values as $value ) {
                    if ( 'show' === $value->item_visible ) {
                        $item_class = 'item-visible';
                        $dash_icon = 'visibility';
                    } else {
                        $item_class = 'item-not-visible';
                        $dash_icon = 'hidden';
                    }
        ?>
                <li class="ogma-news-repeater-field-control <?php echo esc_attr( $item_class ); ?>">

                    <div class="heading-wrapper">
                        <span class="field-display dashicons dashicons-<?php echo esc_attr( $dash_icon ); ?>"></span>
                        <span class="ogma-news-repeater-field-title <?php echo esc_attr( $item_class ); ?>"><?php echo esc_html( $this->ogma_news_box_label ); ?></span>
                        
                    </div><!-- .heading-wrapper -->
                
                    <div class="ogma-news-repeater-fields">
                        <?php
                            foreach ( $fields as $key => $field ) {

                                $class = isset( $field['class'] ) ? $field['class'] : '';

                                $field_type  = isset( $field['type'] ) ? $field['type'] : 'none
                                ';
                        ?>
                                <div class="ogma-news-repeater-field ogma-news-repeater-type-<?php echo esc_attr( $field_type ).' '.esc_attr( $class ); ?>">

                                    <?php 
                                        $label          = isset( $field['label'] ) ? $field['label'] : '';
                                        $description    = isset( $field['description'] ) ? $field['description'] : '';
                                        $placeholder    = isset( $field['placeholder'] ) ? $field['placeholder'] : '';
                                        $new_value  = isset( $value->$key ) ? $value->$key : '';
                                        $default    = isset( $field['default'] ) ? $field['default'] : '';

                                        if ( 'checkbox' != $field['type'] && 'item_visible' !== $key ) {
                                    ?>
                                            <span class="customize-control-title"><?php echo esc_html( $label ); ?></span>
                                            <span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
                                    <?php 
                                        }

                                        switch ( $field['type'] ) {

                                            /**
                                             * URL field
                                             */
                                            case 'url':
                                                echo '<input data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'" type="text" placeholder="'. esc_attr( $placeholder ) .'" value="'.esc_url( $new_value ).'"/>';
                                                break;
     
                                            /**
                                             * Social Icon field
                                             */
                                            case 'social_icon':
                                                $ogma_news_social_icons_array = ogma_news_social_icons_array();
                                                echo '<div class="ogma-news-repeater-selected-icon"><i class="'. esc_attr( $new_value ) .'"></i><span><i class="bx bx-chevron-down"></i></span></div><ul class="ogma-news-repeater-icon-list ogma-news-clearfix">';
                                                foreach ( $ogma_news_social_icons_array as $ogma_news_social_icon ) {
                                                    $icon_class = $new_value == $ogma_news_social_icon ? 'icon-active' : '';
                                                    echo '<li class='. esc_attr( $icon_class ) .'><i class="'. esc_attr( $ogma_news_social_icon ) .'"></i></li>';
                                                }
                                                echo '</ul><input data-default="'. esc_attr( $default ) .'" type="hidden" value="'. esc_attr( $new_value ) .'" data-name="'. esc_attr( $key ) .'"/>';
                                                break;

                                            case 'hidden' :
                                                echo '<input type="hidden" class="repeater-field-visible-holder" data-default="' .esc_attr( $default ). '" data-name="' .esc_attr( $key ). '" value="' .esc_attr( $new_value ). '">';
                                                break;

                                            default:
                                                break;
                                        }
                                    ?>
                                </div>
                        <?php
                            }
                        ?>
                        <div class="ogma-news-clearfix ogma-news-repeater-footer">
                            <div class="alignright">
                            <a class="ogma-news-repeater-field-remove" href="#remove"><?php esc_html_e( 'Delete', 'ogma-news' ) ?></a> |
                            <a class="ogma-news-repeater-field-close" href="#close"><?php esc_html_e( 'Close', 'ogma-news' ) ?></a>
                            </div>
                        </div><!-- .ogma-news-repeater-footer -->
                    </div><!-- .ogma-news-repeater-fields-->
                </li>
        <?php   
                }
            }
        }

    }

endif;