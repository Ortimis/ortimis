<?php

namespace ortimis\Custom;

use ortimis\Api\Settings;
use ortimis\Api\Callbacks\SettingsCallback;

/**
 * Admin
 * use it to write your admin related methods by tapping the settings api class.
 */
class Admin
{
	/**
	 * Store a new instance of the Settings API Class
	 * @var class instance
	 */
	public $settings;

	/**
	 * Callback class
	 * @var class instance
	 */
	public $callback;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->settings = new Settings();

		$this->callback = new SettingsCallback();
	}

	/**
     * register default hooks and actions for WordPress
     * @return
     */
	public function register()
	{
		$this->enqueue()->pages()->settings()->sections()->fields()->register_settings();

		$this->enqueue_faq( new Settings() );
	}

	/**
	 * Trigger the register method of the Settings API Class
	 * @return
	 */
	private function register_settings() {
		$this->settings->register();
	}

	/**
	 * Enqueue scripts in specific admin pages
	 * @return $this
	 */
	private function enqueue()
	{
		// Scripts multidimensional array with styles and scripts
		$scripts = array(
			'script' => array( 
				'jquery', 
				'media_uplaoder',
				get_template_directory_uri() . '/assets/js/admin.min.js'
			),
			'style' => array( 
				get_template_directory_uri() . '/assets/css/admin.min.css',
				'wp-color-picker'
			)
		);

		// Pages array to where enqueue scripts
		$pages = array( 'toplevel_page_ortimis' );

		// Enqueue files in Admin area
		$this->settings->admin_enqueue( $scripts, $pages );

		return $this;
	}

	/**
	 * Enqueue only to a specific page different from the main enqueue
	 * @param  Settings $settings 	a new instance of the Settings API class
	 * @return
	 */
	private function enqueue_faq( Settings $settings )
	{
		// Scripts multidimensional array with styles and scripts
		$scripts = array(
			'style' => array( 
				get_template_directory_uri() . '/assets/css/admin.min.css',
			)
		);

		// Pages array to where enqueue scripts
		$pages = array( 'ortimis_page_ortimis_faq' );

		// Enqueue files in Admin area
		$settings->admin_enqueue( $scripts, $pages )->register();
	}

	/**
	 * Register admin pages and subpages at once
	 * @return $this
	 */
	private function pages()
	{
		$admin_pages = array(
			array(
				'page_title' => 'ortimis Admin Page',
				'menu_title' => 'ortimis',
				'capability' => 'manage_options',
				'menu_slug' => 'ortimis',
				'callback' => array( $this->callback, 'admin_index' ),
				'icon_url' => get_template_directory_uri() . '/assets/images/ortimis-logo.png',
				'position' => 110,
			)
		);

		$admin_subpages = array(
			array(
				'parent_slug' => 'ortimis',
				'page_title' => 'ortimis FAQ',
				'menu_title' => 'FAQ',
				'capability' => 'manage_options',
				'menu_slug' => 'ortimis_faq',
				'callback' => array( $this->callback, 'admin_faq' )
			)
		);

		// Create multiple Admin menu pages and subpages
		$this->settings->addPages( $admin_pages )->withSubPage( 'Settings' )->addSubPages( $admin_subpages );

		return $this;
	}

	/**
	 * Register settings in preparation of custom fields
	 * @return $this
	 */
	private function settings()
	{
		// Register settings
		$args = array(
			array(
				'option_group' => 'ortimis_options_group',
				'option_name' => 'first_name',
				'callback' => array( $this->callback, 'ortimis_options_group' )
			),
			array(
				'option_group' => 'ortimis_options_group',
				'option_name' => 'ortimis_test2'
			)
		);

		$this->settings->add_settings( $args );

		return $this;
	}

	/**
	 * Register sections in preparation of custom fields
	 * @return $this
	 */
	private function sections()
	{
		// Register sections
		$args = array(
			array(
				'id' => 'ortimis_admin_index',
				'title' => 'Settings',
				'callback' => array( $this->callback, 'ortimis_admin_index' ),
				'page' => 'ortimis'
			)
		);

		$this->settings->add_sections( $args );

		return $this;
	}

	/**
	 * Register custom admin fields
	 * @return $this
	 */
	private function fields()
	{
		// Register fields
		$args = array(
			array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array( $this->callback, 'first_name' ),
				'page' => 'ortimis',
				'section' => 'ortimis_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => ''
				)
			)
		);

		$this->settings->add_fields( $args );

		return $this;
	}
}