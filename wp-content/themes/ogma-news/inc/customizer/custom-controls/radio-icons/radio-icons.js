/**
 * Custom scripts for Radio Image Control
 *
 * @package Ogma News
 */

wp.customize.controlConstructor['ogma-news-radio-icons'] = wp.customize.Control.extend({

    ready: function() {

        'use strict';

        var control = this;

        // Change the value
        this.container.on( 'change', 'input', function() {
            control.setting.set( jQuery( this ).val() );
        });

    }

});