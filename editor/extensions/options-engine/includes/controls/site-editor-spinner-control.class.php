<?php
/**
 * SiteEditor Control: spinner.
 *
 * @package     SiteEditor
 * @subpackage  Options
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SiteEditorSpinnerControl' ) ) {

	/**
	 * Spinner control
	 */
	class SiteEditorSpinnerControl extends SiteEditorOptionsControl {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'spinner';

		public $after_field = '';

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {

		}

		/**
		 * Renders the control wrapper and calls $this->render_content() for the internals.
		 *
		 * @since 3.4.0
		 */
		protected function render_content() {

			$atts           = $this->input_attrs();

			$atts_string    = $atts["atts"];

			$classes        = "sed-module-element-control sed-element-control sed-spinner spinner sed-bp-spinner sed-bp-input sed-control-{$this->type} {$atts['class']}";

			$pkey			= "{$this->option_group}_{$this->id}";

			$sed_field_id   = 'sed_pb_' . $pkey;

            $value          = $this->value();

			?>


			<span class="field_desc flt-help fa f-sed icon-question  fa-lg " title="<?php echo esc_attr( $this->description );?>">"></span>
            <label for="<?php echo esc_attr( $sed_field_id );?>" ><?php echo $this->label; ?></label>  
            <span class="after_field"><?php echo $this->after_field; ?></span> 
            <input type="text" class="<?php echo esc_attr( $classes ); ?>" name="<?php echo esc_attr( $sed_field_id );?>" id="<?php echo esc_attr( $sed_field_id );?>" value="<?php echo esc_attr( $value ); ?>" <?php echo $atts_string;?> />


			<?php
		}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 *
		 * @see SiteEditorOptionsControl::print_template()
		 *
		 * @access protected
		 */
		protected function content_template() {

		}
	}
}

sed_options()->register_control_type( 'spinner' , 'SiteEditorSpinnerControl' );
