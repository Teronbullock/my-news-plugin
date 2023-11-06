<?php
  ?>
  
  <div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form action="options.php" method="POST">
      <?php
      settings_fields( 'my_news_plugin_group', 'mnp_api_url' );
      settings_fields( 'my_news_plugin_group', 'mnp_api_date' );
      do_settings_sections( 'my-news-plugin-admin-menu-page' );

      submit_button( __( 'Save Settings', 'textdomain' ) );
      ?>
    </form>
  </div>
  <?php
