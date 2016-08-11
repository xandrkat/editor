<?php
/**
 * SiteEditor Control: switch.
 *
 * @package     SiteEditor
 * @subpackage  Options
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SiteEditorSwitchControl' ) ) {

	/**
	 * Switch control
	 */
	class SiteEditorSwitchControl extends SiteEditorOptionsControl {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'switch';

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

			$classes        = "sed-module-element-control sed-element-control sed-bp-input sed-bp-switch-input sed-control-{$this->type} {$atts['class']}";

			$pkey			= "{$this->option_group}_{$this->id}";

			$sed_field_id   = 'sed_pb_' . $pkey;

            $value          = $this->value();

			?>

			<label class=""><?php echo $this->label;?></label>
			<span class="field_desc flt-help fa f-sed icon-question fa-lg " title="<?php echo esc_attr( $this->description );?>"></span>
			<div class="sed-bp-form-switch">
				<?php
				$i = 1;
				foreach( $this->choices as $key_val => $choice ) {
					$checked = ( $key_val == $value ) ? 'checked="checked"' : '';
				?>

					<div class="sed-bp-form-switch-item">
						<label for="<?php echo esc_attr( $sed_field_id ) . $i ;?>">
							<input  type="switch" class="<?php echo esc_attr( $classes ); ?>" value="<?php echo esc_attr( $key_val );?>" name="<?php echo esc_attr( $sed_field_id );?>" id="<?php echo esc_attr( $sed_field_id ) . $i ;?>"  <?php echo $checked;?> <?php echo $atts_string;?> />
							<?php echo $choice;?>
						</label>
					</div>

				<?php 
				    $i++;
				  } 
				?>
			</div>

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

$this->register_control_type( 'switch' , 'SiteEditorSwitchControl' );