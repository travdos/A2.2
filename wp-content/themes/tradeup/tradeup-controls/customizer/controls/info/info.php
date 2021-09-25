<?php
/**
 * Info Control
 */
if( ! class_exists( 'Tradeup_Control_Info' ) ) {
	class Tradeup_Control_Info extends WP_Customize_Control {

		public $type 		= 'info-control';
		public $info_type, $css_class, $html;

		/**
		 * Render the control.
		 */
		public function render_content() {

			$icon = ( $this->info_type != '' ) ? '<span class="dashicons dashicons-' . esc_attr( $this->info_type ) . '"></span>' : '';
			$bottom = ( $this->html != '' ) ? '<div class="tu-control-info-bottom">' . $this->html . '</div>' : '';

			// Begin the output. ?>
			<div class="tu-control-info <?php echo esc_attr( $this->css_class ); ?>">
				<?php // Output the label and description if they were passed in.
				if ( isset( $this->label ) && '' !== $this->label ) {
					echo '<span class="customize-control-title tu-control-info-label">' . sanitize_text_field( $this->label ) . $icon . '</span>';
				}
				if ( isset( $this->description ) && '' !== $this->description ) {
					echo '<div class="description customize-control-description tu-control-info-description">' . wp_kses_post( $this->description ) . '</div>';
				}
				echo wp_kses_post( $bottom );
				?>
			</div>
			<?php
		}
	}
}