<?php

class MY_News_Plugin_Public {


  public function __construct() {
    add_shortcode( 'my_news_shortcode', array($this, 'set_news_shortcode') );
    add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts_styles') );
  }

  public function set_news_shortcode($atts) {
    $a = shortcode_atts( array(
  
    ), $atts );

    require MY_NEWS_PLUGIN_DIR_PATH . 'public/includes/public-news-shortcode.php';

    return ob_get_clean();
  }


  public function enqueue_scripts_styles() {
    // enqueue scripts
    wp_enqueue_script( 
      'my_news_plugin-js', 
      MY_NEWS_PLUGIN_URL . 'public/assets/js/my-news-plugin-public.min.js', 
      array( 'jquery' ), 
      MY_NEWS_PLUGIN_VERSION, 
      true
    );
   
    // localize scripts
    wp_localize_script(
      'my_news_plugin-js',
      'mnp_object',
      array(
        'api_url' => get_option('mnp_api_url'),
        'api_date' => get_option('mnp_api_date'),
      )
    );

    // enqueue styles
    wp_enqueue_style( 
      'my_news_plugin', 
      MY_NEWS_PLUGIN_URL . 'public/assets/css/styles.min.css', 
      array(), 
      MY_NEWS_PLUGIN_VERSION, 
      'all' 
    );
  }

}