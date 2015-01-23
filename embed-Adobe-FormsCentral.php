<?php /*
Plugin Name: Embed Adobe FormsCentral
Description: Easily Embed Adobe FormsCentral forms in your posts, pages, and custom post types
Author: forlogos
Author URI: https://jasonjalbuena.com/
Requires at least: 4.1
Version: 1.0
*/

class flgs_embed_adobe_formscentral {
	private static $instance = null;
	private $plugin_path;
	private $plugin_url;

	//Creates or returns an instance of this class.
	public static function get_instance() {
		// If an instance hasn't been created and set to $instance create an instance and set it to $instance.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	//Initializes the plugin by setting hooks, filters, and functions.
	private function __construct() {
		$this->plugin_url = plugin_dir_url( __FILE__ );
		//add_action('admin_init', array($this,'register_settings'));		
		//add_action('admin_enqueue_scripts', array($this,'tinymce_buttons'));
		//add_action('admin_footer', array( $this, 'print_scripts_styles'));

		add_shortcode('adobeform', array($this,'shortcode_output'));

		$this->run_plugin();
	}

    public function get_plugin_url() {
    	return $this->plugin_url;
    }

    public function tinymce_buttons() {
		add_filter('mce_external_plugins','add_buttons');
    	add_filter('mce_buttons','register_buttons');
	}

	
	public function add_buttons($plugin_array) {
		
    	return $plugin_array;
	}

	public function register_buttons($buttons) {
		
    	return $buttons;
	}

	//let the shortcode show our adobe form
	function shortcode_output($atts){
		//get attributes
		extract( shortcode_atts(
			array(
				'js' => 'https://formscentral.acrobat.com/Clients/Current/FormsCentral/htmlClient/scripts/adobe.form.embed.min.js',
				'formid' => ''
			), $atts )
		);

		//ensure there is a formId, else return
		if(empty($formid) || $formid=='') {
			return;
		}

		//output js
		$return='<script type="text/javascript" src="'.$js.'"></script>';

		//output id
		$return.='<script type="text/javascript">;ADOBEFORMS.EmbedForm({formId:"'.$formid.'"});</script>';

		//return all output
		return $return;
	}


    //plugin's functionality functions
    private function run_plugin() {



	}
}

flgs_embed_adobe_formscentral::get_instance(); ?>
