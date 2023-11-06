<?php
 
/**
* Plugin Name:       My News Plugin
* Plugin URI:        na
* Description:       na
* Version:           0.0.1
* Author:            Teron Bullock
* Author URI:        na
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:       my-news-plugin
* Domain Path:       /languages
*/

// If this file is called directly, abort.
if ( ! defined('WPINC') ) {
  die;
}

// define plugin constants
define( 'MY_NEWS_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'MY_NEWS_PLUGIN_VERSION', '0.0.1' );
define( 'MY_NEWS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

class My_News_Plugin {

  function __construct(){
    $this->getPublicClass();
    $this->getAdminClass();
  }

  public function getPublicClass() {
    require_once MY_NEWS_PLUGIN_DIR_PATH . 'public/class-my-news-plugin-public.php';
    $my_news_plugin_public = new MY_News_Plugin_Public();
  }

  public function getAdminClass() {
    if( is_admin() ){
      require_once MY_NEWS_PLUGIN_DIR_PATH . 'admin/class-my-news-plugin-admin.php';
      $my_news_plugin_admin = new MY_News_Plugin_Admin();
    }
  }
}

new My_News_Plugin();