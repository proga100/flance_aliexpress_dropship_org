<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://www.flance.info
 * @since      1.1.4
 *
 * @package    Flance_aliexpress_dropship
 * @subpackage Flance_aliexpress_dropship/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.1.4
 * @package    Flance_aliexpress_dropship
 * @subpackage Flance_aliexpress_dropship/includes
 * @author     Rusty <tutyou1972@gmail.com>
 */
class Flance_aliexpress_dropship {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.1.4
	 * @access   protected
	 * @var      Flance_aliexpress_dropship_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.1.4
	 * @access   protected
	 * @var      string    $Flance_wamp    The string used to uniquely identify this plugin.
	 */
	protected $Flance_wamp;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.1.4
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.1.4
	 */
	public function __construct() {

		$this->Flance_wamp = 'flance-add-aliexpress-dropship';
		$this->version = '1.1.4';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();


	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Flance_aliexpress_dropship_Loader. Orchestrates the hooks of the plugin.
	 * - Flance_aliexpress_dropship_i18n. Defines internationalization functionality.
	 * - Flance_aliexpress_dropship_Admin. Defines all hooks for the admin area.
	 * - Flance_aliexpress_dropship_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.1.4
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-flance-add-aliexpress-dropship-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-flance-add-aliexpress-dropship-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-flance-add-aliexpress-dropship-admin.php';



		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'widget/class-flance-add-aliexpress-dropship-widget.php';


		$this->loader = new Flance_aliexpress_dropship_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Flance_aliexpress_dropship_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.1.4
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Flance_aliexpress_dropship_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}


	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.1.4
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Flance_aliexpress_dropship_Admin( $this->get_Flance_wamp(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		$this->loader->add_action( 'admin_menu', $plugin_admin, 'flance_amp_admin_menu_page' );
		//$this->loader->add_action( 'widgets_init', $plugin_admin, 'flance_widget' );
		// Redirection after activation
		$this->loader->add_action( 'admin_init', $plugin_admin, 'flance_amp_dropship_plugin_redirect' );
	//	do_action( 'flance_import_aliexpress_product_search_results');// search results pages hook 
	//	add_action( 'flance_import_aliexpress_product_search_results',$this->flance_import_aliexpress_product_search_results() );

		
		
	}



	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.1.4
	 */
	public function run() {
		$this->loader->run();
	
		
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     2.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_Flance_wamp() {
		return $this->Flance_wamp;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     2.0.0
	 * @return    Flance_aliexpress_dropship_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     2.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
	

}
