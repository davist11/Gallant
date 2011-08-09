<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'gallant_v2_options', 'gallant_v2_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'gallant_v2theme' ), __( 'Theme Options', 'gallant_v2theme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create the options page
 */
function theme_options_do_page() {

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'gallant_v2theme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'gallant_v2theme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'gallant_v2_options' ); ?>
			<?php $options = get_option( 'gallant_v2_theme_options' ); ?>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row">
						<label class="description" for="gallant_v2_theme_options[ad1]"><?php _e( 'Top Sidebar Ad', 'gallant_v2theme' ); ?></label>
					</th>
					<td>
						<textarea id="sample_theme_options[ad1]" class="large-text" cols="50" rows="8" name="gallant_v2_theme_options[ad1]"><?php echo esc_textarea( $options['ad1'] ); ?></textarea>	
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label class="description" for="gallant_v2_theme_options[ad2]"><?php _e( 'Middle Sidebar Ad', 'gallant_v2theme' ); ?></label>
					</th>
					<td>
						<textarea id="sample_theme_options[ad2]" class="large-text" cols="50" rows="8" name="gallant_v2_theme_options[ad2]"><?php echo esc_textarea( $options['ad2'] ); ?></textarea>	
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label class="description" for="gallant_v2_theme_options[ad5]"><?php _e( 'Left Half Sidebar Ad', 'gallant_v2theme' ); ?></label>
					</th>
					<td>
						<textarea id="sample_theme_options[ad5]" class="large-text" cols="50" rows="8" name="gallant_v2_theme_options[ad5]"><?php echo esc_textarea( $options['ad5'] ); ?></textarea>	
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label class="description" for="gallant_v2_theme_options[ad6]"><?php _e( 'Right Half Sidebar Ad', 'gallant_v2theme' ); ?></label>
					</th>
					<td>
						<textarea id="sample_theme_options[ad6]" class="large-text" cols="50" rows="8" name="gallant_v2_theme_options[ad6]"><?php echo esc_textarea( $options['ad6'] ); ?></textarea>	
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label class="description" for="gallant_v2_theme_options[ad3]"><?php _e( 'Bottom Sidebar Ad', 'gallant_v2theme' ); ?></label>
					</th>
					<td>
						<textarea id="sample_theme_options[ad3]" class="large-text" cols="50" rows="8" name="gallant_v2_theme_options[ad3]"><?php echo esc_textarea( $options['ad3'] ); ?></textarea>	
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label class="description" for="gallant_v2_theme_options[ad4]"><?php _e( 'Bottom Horizontal Ad', 'gallant_v2theme' ); ?></label>
					</th>
					<td>
						<textarea id="sample_theme_options[ad4]" class="large-text" cols="50" rows="8" name="gallant_v2_theme_options[ad4]"><?php echo esc_textarea( $options['ad4'] ); ?></textarea>	
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'gallant_v2theme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {

	return $input;
}