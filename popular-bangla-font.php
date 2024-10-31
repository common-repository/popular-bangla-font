<?php
/**
 * Plugin Name: Popular Bangla Font
 * Description: Set Your Popular Bangla Font to your WordPress Website.
 * Plugin URI: https://rumi.pro/popular-bangla-font
 * Author: SynthiaSoft
 * Author URI: https://synthasoft.com/
 * Version: 1.0.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: popular-bangla-font
 */



	defined( 'ABSPATH' ) or die( 'Stop! You can not do this!' );


	
	function PopularBnFont() {
		   $bangla_font_settings_options = get_option( 'bangla_font_settings_option_name' );
         $font_name = $bangla_font_settings_options['select_font_0'];
         $font_name = str_replace(' ', '', $font_name);
         $font_css = plugins_url( 'font/'.$font_name.'/font.css', __FILE__ );
          wp_enqueue_style( 'bangla-font', $font_css, [], time(), 'all' );
          

          }
		


	add_action('wp_enqueue_scripts', 'PopularBnFont');




class BanglaFontSettings {
	private $bangla_font_settings_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'bangla_font_settings_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'bangla_font_settings_page_init' ) );
	}

	public function bangla_font_settings_add_plugin_page() {
		add_menu_page(
			'Bangla Font Settings', // page_title
			'Bangla Font Settings', // menu_title
			'manage_options', // capability
			'bangla-font-settings', // menu_slug
			array( $this, 'bangla_font_settings_create_admin_page' ), // function
			'dashicons-admin-generic', // icon_url
			65 // position
		);
	}

	public function bangla_font_settings_create_admin_page() {
		$this->bangla_font_settings_options = get_option( 'bangla_font_settings_option_name' ); ?>

		<div class="wrap">
			<h2>Bangla Font Settings</h2>
			<p>Select Your desired Bangla Font</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'bangla_font_settings_option_group' );
					do_settings_sections( 'bangla-font-settings-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function bangla_font_settings_page_init() {
		register_setting(
			'bangla_font_settings_option_group', // option_group
			'bangla_font_settings_option_name', // option_name
			array( $this, 'bangla_font_settings_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'bangla_font_settings_setting_section', // id
			'Settings', // title
			array( $this, 'bangla_font_settings_section_info' ), // callback
			'bangla-font-settings-admin' // page
		);

		add_settings_field(
			'select_font_0', // id
			'Select Font', // title
			array( $this, 'select_font_0_callback' ), // callback
			'bangla-font-settings-admin', // page
			'bangla_font_settings_setting_section' // section
		);
	}

	public function bangla_font_settings_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['select_font_0'] ) ) {
			$sanitary_values['select_font_0'] = $input['select_font_0'];
		}

		return $sanitary_values;
	}

	public function bangla_font_settings_section_info() {
		
	}

	public function select_font_0_callback() {
		?> <select name="bangla_font_settings_option_name[select_font_0]" id="select_font_0">
			<?php $selected = (isset( $this->bangla_font_settings_options['select_font_0'] ) && $this->bangla_font_settings_options['select_font_0'] === 'adorsho-lipi ') ? 'selected' : '' ; ?>
			<option value="adorsho-lipi " <?php echo $selected; ?>> Adorsho Lipi</option>
			<?php $selected = (isset( $this->bangla_font_settings_options['select_font_0'] ) && $this->bangla_font_settings_options['select_font_0'] === 'apona-lohit ') ? 'selected' : '' ; ?>
			<option value="apona-lohit " <?php echo $selected; ?>> Apona Lohit</option>
			<?php $selected = (isset( $this->bangla_font_settings_options['select_font_0'] ) && $this->bangla_font_settings_options['select_font_0'] === 'bangla ') ? 'selected' : '' ; ?>
			<option value="bangla " <?php echo $selected; ?>> Bangla</option>
			<?php $selected = (isset( $this->bangla_font_settings_options['select_font_0'] ) && $this->bangla_font_settings_options['select_font_0'] === 'bensen ') ? 'selected' : '' ; ?>
			<option value="bensen " <?php echo $selected; ?>> BenSen</option>
			<?php $selected = (isset( $this->bangla_font_settings_options['select_font_0'] ) && $this->bangla_font_settings_options['select_font_0'] === 'charukola-ultra-light ') ? 'selected' : '' ; ?>
			<option value="charukola-ultra-light " <?php echo $selected; ?>> Charukola Ultra Light</option>
			<?php $selected = (isset( $this->bangla_font_settings_options['select_font_0'] ) && $this->bangla_font_settings_options['select_font_0'] === 'ekushey-lohit ') ? 'selected' : '' ; ?>
			<option value="ekushey-lohit " <?php echo $selected; ?>> Ekushey Lohit</option>
			<?php $selected = (isset( $this->bangla_font_settings_options['select_font_0'] ) && $this->bangla_font_settings_options['select_font_0'] === 'kalpurush ') ? 'selected' : '' ; ?>
			<option value="kalpurush " <?php echo $selected; ?>> Kalpurush </option>
			<?php $selected = (isset( $this->bangla_font_settings_options['select_font_0'] ) && $this->bangla_font_settings_options['select_font_0'] === 'mukti ') ? 'selected' : '' ; ?>
			<option value="mukti " <?php echo $selected; ?>> Mukti</option>
			<?php $selected = (isset( $this->bangla_font_settings_options['select_font_0'] ) && $this->bangla_font_settings_options['select_font_0'] === 'siyam-rupali ') ? 'selected' : '' ; ?>
			<option value="siyam-rupali " <?php echo $selected; ?>> Siyam Rupali</option>
			<?php $selected = (isset( $this->bangla_font_settings_options['select_font_0'] ) && $this->bangla_font_settings_options['select_font_0'] === 'solaiman-lipi ') ? 'selected' : '' ; ?>
			<option value="solaiman-lipi " <?php echo $selected; ?>> Solaiman Lipi</option>
		</select> <?php
	}

}


if ( is_admin() )
	$bangla_font_settings = new BanglaFontSettings();


 function PopularBnFamily(){
 	$bangla_font_settings_options = get_option( 'bangla_font_settings_option_name' );
    $font_name = $bangla_font_settings_options['select_font_0'];
    $font_name = str_replace('-', ' ', $font_name);
    $font_name = ucwords($font_name);
    $font_name = str_replace(' ', '', $font_name);

    return $font_name;



 }

	function embed_bangla_font() {

		
	?>
		<style>
			body, article, h1, h2, h3, h4, h5, h6, textarea, input, select, .primary-menu .common-menu-wrap .nav>li>a, .topbar, .main-menu, .breadcrumb, .copyrights-area, form span.required {
				font-family: '<?php echo esc_html(PopularBnFamily()); ?>', sans-serif!important;

			}
		</style>
	<?php
	}
	
	
	add_action('wp_head', 'embed_bangla_font');