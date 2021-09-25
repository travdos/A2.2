/* Customizer Preview */
( function( $ ) {

	var style = $( 'tradeup-czr-settings-output-css' ),
		 api = wp.customize;

	if ( ! style.length ) {
		style = $( 'head' ).append( '<style type="text/css" id="tradeup-czr-settings-output-css" />' )
		                    .find( '#tradeup-czr-settings-output-css' );
	}

	api.bind( 'preview-ready', function() {
		api.preview.bind( 'tu-update-settings', function( new_settings ) {
			style.html( new_settings );
		} );
	} );

} )( jQuery );