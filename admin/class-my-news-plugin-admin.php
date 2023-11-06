<?php

class MY_News_Plugin_Admin {

  function __construct() {
    add_action( 'admin_enqueue_scripts', array($this, 'enqueue_scripts_styles') );
    add_action( 'admin_menu', array( $this, 'addAdminMenu' ) );
    add_action( 'admin_init', array( $this, 'settings_init' ) );
  }

  public function enqueue_scripts_styles () {
    wp_enqueue_style(
      'mnp-admin-style',
      MY_NEWS_PLUGIN_URL . 'admin/assets/css/admin-styles.min.css',
      array(),
      MY_NEWS_PLUGIN_VERSION,
      'all'
    );
  
  }

  public function addAdminMenu() {
    
    add_menu_page(
      'My News Plugin',
      'My News Plugin',
      'manage_options',
      'my-news-plugin-admin-menu-page',
      array( $this, 'admin_menu_page' ),
      'dashicons-admin-site',
      100
    );
  }

  public function admin_menu_page() {
  
    require_once MY_NEWS_PLUGIN_DIR_PATH . 'admin/includes/admin-my-news-plugin-display.php';

  }

  public function settings_init() {

    add_settings_section('mnp_settings_section', null, null, 'my-news-plugin-admin-menu-page');

    // url parameter
    register_setting( 'my_news_plugin_group', 'mnp_api_url', array(
      'type' => 'string', 
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'add url here',
    ) ); 

    add_settings_field('mnp_api_url', 'API URL', array($this, 'mnp_api_url_callback'), 'my-news-plugin-admin-menu-page', 'mnp_settings_section');


    // date parameter
    register_setting( 'my_news_plugin_group', 'mnp_api_date', array(
      'type' => 'string', 
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '2022/11/11',
    ) ); 

    add_settings_field('mnp_api_date', 'API Date Parameter', array($this, 'mnp_api_date_callback'), 'my-news-plugin-admin-menu-page', 'mnp_settings_section');

  }

  public function mnp_api_url_callback() {
    ?>
    <input class="mnp-settings-input" type="text" name="mnp_api_url" id="mnp_api_url" value="<?php echo esc_attr( get_option('mnp_api_url') ); ?>" />
    <?php
  }

  public function mnp_api_date_callback() {
    ?>
    <input class="mnp-settings-input" type="text" name="mnp_api_date" id="mnp_api_date" value="<?php echo esc_attr( get_option('mnp_api_date') ); ?>" />
    <?php
  }
}