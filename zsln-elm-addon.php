<?php
/**
 * Plugin Name: ZSLN Elementor Addon
 * Description: Hello, This is my first elementor addon. thanks for activated my elementor addon.
 * Plugin URI:  https://elementor.com/
 * Version:     7.0.0
 * Author:      Asif Ahmed
 * Author URI:  www.developerasif.com
 * Text Domain: zsln-elm-addon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * ZSLN Elementor Addon Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Zsln_Elemetor_Addon {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var ZSLN Elementor Addon The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return ZSLN Elementor Addon An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'zsln-elm-addon' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// ZSLN Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'zsln_widget_css' ] );

		// ZSLN Register Widget Scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'zsln_widget_js' ] );

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		
		// add custom categorie
		add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );

		//add_action( 'zsln-elm-addon/controls/controls_registered', [ $this, 'init_controls' ] );
	}

	// call back fucntion for custom category
	function add_elementor_widget_categories( $zsln_manager ) {

		$zsln_manager->add_category(
			'zsln-custom-cat',
			[
				'title' => __( 'zsln category', 'zsln-elm-addon' ),
				'icon' => 'fa fa-plug',
			]
		);
	
	}




	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'zsln-elm-addon' ),
			'<strong>' . esc_html__( 'ZSLN Elementor Addon', 'zsln-elm-addon' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'zsln-elm-addon' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'zsln-elm-addon' ),
			'<strong>' . esc_html__( 'ZSLN Elementor Addon', 'zsln-elm-addon' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'zsln-elm-addon' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'zsln-elm-addon' ),
			'<strong>' . esc_html__( 'ZSLN Elementor Addon', 'zsln-elm-addon' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'zsln-elm-addon' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	
	/**
	// ZSLN widgets css call back function
	*/
	public function zsln_widget_css(){
		wp_register_style( 'zsln-widget-css', plugins_url('css/zsln-widget.css', __FILE__ ) );
	}

	/**
	// ZSLN widgets js call back function
	*/
	public function zsln_widget_js(){
		wp_register_script( 'zsln-widget-js', plugins_url('js/zsln-widget.js', __FILE__ ) );
	}


	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files
		require_once( __DIR__ . '/widgets/zsln-basic-widget.php' );
		require_once( __DIR__ . '/widgets/zsln-repeater-widget.php' );
		require_once( __DIR__ . '/widgets/zsln-blog-widget.php' );

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Zsln_Basic_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Zsln_Repeater_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Zsln_Blog_Widget() );

	}


	/**
	 * Init Controls
	 *
	 * Include controls files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
/*	public function init_controls() {

		// Include Control files
		require_once( __DIR__ . '/controls/test-control.php' );

		// Register control
		\Elementor\Plugin::$instance->controls_manager->register_control( 'control-type-', new \Test_Control() );

	}
	*/

}

Zsln_Elemetor_Addon::instance();