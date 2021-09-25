/* Customizer JS */
jQuery( document ).ready( function( $ ) {

	/* Move some panels/sections/controls */
	wp.customize.section( 'header_image' ).panel( 'settings_options' );
	wp.customize.control( 'header_image' ).priority( 90 );
	wp.customize.control( 'enable_parallax_custom_headers' ).priority( 91 );

	// Dismiss Tradeup Extensions Buttons
	$(document).on( 'click', '#tu-dismiss-rec-plugin', function(event) {
		event.preventDefault();
		$.ajax({
			url: tradeup_customizer_js_vars.admin_ajax,
			type: 'post',
			dataType: 'json',
			data: {
				action: 'tradeup_dismiss_ext',
				tradeup_dismiss_ext_nonce: tradeup_customizer_js_vars.dismiss_ext_nonce,
			}
		}).done( function( data ) {
			wp.customize.section( 'tuext-installer' ).deactivate();
		});
	});

});
