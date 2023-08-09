/**
 * Custom scripts for Dropdown Categories Control
 *
 * @package Ogma News
 */

wp.customize.controlConstructor['ogma-news-dropdown-categories'] = wp.customize.Control.extend({

	ready: function() {

		'use strict';

		var control = this;

		control.container.on( 'change', 'select', function() {
			control.setting.set( jQuery( this ).val() );
		} );

	}

});