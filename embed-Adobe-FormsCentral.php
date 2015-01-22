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
		$this->run_plugin();
	}

    public function get_plugin_url() {
    	return $this->plugin_url;
    }

    //plugin's functionality functions
    private function run_plugin() {

	}
}

flgs_embed_adobe_formscentral::get_instance(); ?>