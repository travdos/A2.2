/* Customizer Settings Manager */
( function( api ) {

	var	api = wp.customize,
		tu_styles_template = wp.template( 'tradeup-czr-settings-output' ),
		tu_simple_settings = _.map( tu_customizer_settings, function( element, index ) { return index } ),
		tu_settings_keys = tu_simple_settings,
		tu_settings_values = tu_simple_settings;


	// Update function
	function tu_update_css() {
		var new_settings,
			settings = _.object( tu_settings_keys, tu_customizer_settings );

		_.each( tu_settings_values, function( new_value ) {
			settings[ new_value ] = api( new_value )();
		} );

		new_settings = tu_styles_template( settings );

		api.previewer.send( 'tu-update-settings', new_settings );
	}


	// Update the CSS whenever a color setting is changed.
	_.each( tu_settings_values, function( new_value ) {
		api( new_value, function( new_value ) {
			new_value.bind( tu_update_css );
		} );
	} );


	// Link section
	api.sectionConstructor['link-button'] = api.Section.extend( {
		// No events for this type of section.a
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );


	// Tradeup Extensions installer
	api.sectionConstructor['tuext-installer'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
