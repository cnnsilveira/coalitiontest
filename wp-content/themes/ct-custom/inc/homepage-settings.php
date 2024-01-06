<?php
/**
 * This file generates the menu page and options for the homepage template.
 *
 * @package CT_Custom
 */

add_action( 'body_class', 'ctdev__body_class' );
/**
 * Adds custom class to the body for reference.
 *
 * @param array $wp_classes WP body classes array.
 * @return array $wp_classes Modified classes array.
 */
function ctdev__body_class( $wp_classes ) {
	$wp_classes[] = 'ctd';

	return $wp_classes;
}

add_action( 'init', 'ctdev__homepage_options' );
/**
 * Creates the homepage settings options on the DB.
 */
function ctdev__homepage_options() {
	add_option( 'ctdev__header_logo' );
	add_option( 'ctdev__phone_number' );
	add_option( 'ctdev__address_1' );
	add_option( 'ctdev__address_2' );
	add_option( 'ctdev__address_3' );
	add_option( 'ctdev__fax' );
	add_option( 'ctdev__social_facebook' );
	add_option( 'ctdev__social_twitter' );
	add_option( 'ctdev__social_linkedin' );
	add_option( 'ctdev__social_pinterest' );
}

add_action( 'admin_enqueue_scripts', 'ctdev__admin_enqueue' );
/**
 * Enqueues the WP media selector script on admin area.
 */
function ctdev__admin_enqueue() {
	wp_enqueue_media();
}

add_action( 'admin_menu', 'ctdev__admin_page' );
/**
 * Adds the Homepage Settings menu to WP panel.
 */
function ctdev__admin_page() {
	add_menu_page( __( 'Homepage settings', 'ct-custom' ), __( 'Homepage', 'ct-custom' ), 'manage_options', 'homepage-settings', 'ctdev__homepage_settings', '', 31 );
}
/**
 * Generates the HTML for the Homepage Settings menu page.
 */
function ctdev__homepage_settings() {
	$default_logo = get_template_directory_uri() . '/assets/img/default-logo.png';

	$logo = ! empty( get_option( 'ctdev__header_logo' ) ) ? get_option( 'ctdev__header_logo' ) : $default_logo;

	?>
	<div class="ctd__homepage-settings">
		<h1>Homepage Settings</h1>
		<form method="post">
			<?php wp_nonce_field( -1, 'ctdev__homepage_settings' ); ?>

			<fieldset>
				<legend>Header logo</legend>
				<div class="ctd__homepage-settings--input ctdev__header_logo">
					<input type="hidden" name="ctdev__header_logo" id="ctdev__header_logo" value="<?php echo esc_url( $logo ); ?>">
					<img src="<?php echo esc_url( $logo ); ?>" alt="Header logo preview" width="173" height="38">
					<div class="actions">
						<button id="ctd__homepage-settings--logo-default" type="button"><?php esc_html_e( 'Default', 'ct-custom' ); ?></button>
						<button id="ctd__homepage-settings--logo-select" type="button"><?php esc_html_e( 'Select', 'ct-custom' ); ?></button>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend>Contact info</legend>
				<div class="ctd__homepage-settings--input"><label for="ctdev__phone_number"><?php esc_html_e( 'Phone number', 'ct-custom' ); ?></label><input type="text" name="ctdev__phone_number" id="ctdev__phone_number" value="<?php echo get_option( 'ctdev__phone_number' ); ?>"></div>
				<div class="ctd__homepage-settings--input"><label for="ctdev__fax"><?php esc_html_e( 'Fax number', 'ct-custom' ); ?></label><input type="text" name="ctdev__fax" id="ctdev__fax" value="<?php echo get_option( 'ctdev__fax' ); ?>"></div>
				<div class="ctd__homepage-settings--input"><label for="ctdev__address_1"><?php esc_html_e( 'Address title', 'ct-custom' ); ?></label><input type="text" name="ctdev__address_1" id="ctdev__address_1" value="<?php echo get_option( 'ctdev__address_1' ); ?>"></div>
				<div class="ctd__homepage-settings--input"><label for="ctdev__address_2"><?php esc_html_e( 'Address line 1', 'ct-custom' ); ?></label><input type="text" name="ctdev__address_2" id="ctdev__address_2" value="<?php echo get_option( 'ctdev__address_2' ); ?>"></div>
				<div class="ctd__homepage-settings--input"><label for="ctdev__address_3"><?php esc_html_e( 'Address line 2', 'ct-custom' ); ?></label><input type="text" name="ctdev__address_3" id="ctdev__address_3" value="<?php echo get_option( 'ctdev__address_3' ); ?>"></div>
			</fieldset>

			<fieldset>
				<legend>Social links</legend>
				<div class="ctd__homepage-settings--input"><label for="ctdev__social_facebook"><?php esc_html_e( 'Facebook link', 'ct-custom' ); ?></label><input type="text" name="ctdev__social_facebook" id="ctdev__social_facebook" value="<?php echo get_option( 'ctdev__social_facebook' ); ?>"></div>
				<div class="ctd__homepage-settings--input"><label for="ctdev__social_twitter"><?php esc_html_e( 'Twitter link', 'ct-custom' ); ?></label><input type="text" name="ctdev__social_twitter" id="ctdev__social_twitter" value="<?php echo get_option( 'ctdev__social_twitter' ); ?>"></div>
				<div class="ctd__homepage-settings--input"><label for="ctdev__social_linkedin"><?php esc_html_e( 'Linkedin link', 'ct-custom' ); ?></label><input type="text" name="ctdev__social_linkedin" id="ctdev__social_linkedin" value="<?php echo get_option( 'ctdev__social_linkedin' ); ?>"></div>
				<div class="ctd__homepage-settings--input"><label for="ctdev__social_pinterest"><?php esc_html_e( 'Pinterest link', 'ct-custom' ); ?></label><input type="text" name="ctdev__social_pinterest" id="ctdev__social_pinterest" value="<?php echo get_option( 'ctdev__social_pinterest' ); ?>"></div>
			</fieldset>

			<input type="submit" value="<?php esc_html_e( 'Update', 'ct-custom' ); ?>">
		</form>
	</div>

	<style>
		.ctd__homepage-settings {
			padding: 0 20px 0 0;
		}
		.ctd__homepage-settings h1 {
			font-size: 36px;
			border-bottom: 1px solid #b0acac;
			line-height: 36px;
			padding-bottom: 20px;
			margin-bottom: 20px;
		}
		.ctd__homepage-settings fieldset {
			margin-bottom: 20px;
		}
		.ctd__homepage-settings legend {
			font-size: 24px;
			font-weight: 500;
			line-height: 24px;
			margin-bottom: 10px;
		}
		.ctd__homepage-settings--input {
			display: flex;
			flex-direction: column;
			align-items: flex-start;
			margin-bottom: 10px;
			gap: 5px;
		}
		.ctd__homepage-settings input:not([type="submit"]) {
			width: 100%;
			max-width: 300px;
		}
		.ctdev__header_logo button {
			margin-top: 10px;
		}
		.ctdev__header_logo img {
			object-fit: contain;
		}
	</style>

	<script>
		jQuery(function($) {
			const defaultLogo = '<?php echo $default_logo; ?>';

			$('#ctd__homepage-settings--logo-select').on('click', () => {
				const imageUploader = wp.media({
					title: 'Choose an image',
					multiple: false
				});

				imageUploader.on('select', () => {
					let attachment = imageUploader.state().get('selection').first().toJSON();
					$('.ctdev__header_logo input').val(attachment.url);
					$('.ctdev__header_logo img').attr('src', attachment.url);
				});

				imageUploader.open();
			});

			$('#ctd__homepage-settings--logo-default').on('click', () => {
				$('.ctdev__header_logo input').val(defaultLogo);
				$('.ctdev__header_logo img').attr('src', defaultLogo);
			});
		});
	</script>
	<?php
}

add_action( 'init', 'ctdev__update_options' );
/**
 * Updates the homepage options on the database.
 */
function ctdev__update_options() {
	if ( isset( $_POST['ctdev__homepage_settings'] ) && wp_verify_nonce( sanitize_key( $_POST['ctdev__homepage_settings'] ) ) ) {
		$to_update = array(
			'ctdev__header_logo',
			'ctdev__phone_number',
			'ctdev__address_1',
			'ctdev__address_2',
			'ctdev__address_3',
			'ctdev__fax',
			'ctdev__social_facebook',
			'ctdev__social_twitter',
			'ctdev__social_linkedin',
			'ctdev__social_pinterest',
		);

		foreach ( $_POST as $id => $value ) {
			if ( in_array( $id, $to_update ) ) {
				update_option( $id, $value );
			}
		}

		wp_safe_redirect( $_SERVER['HTTP_REFERER'] );
	}
}
