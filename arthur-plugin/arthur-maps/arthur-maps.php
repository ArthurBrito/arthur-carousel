<?php
/**
 * Plugin Name: Arthur-maps
 * Description: Plugin to add google maps addresses with high customization
 **/

 function map_function() {
    $info = '<div id="map"></div>';

    return $info;
 }
 //  Page and post shortcode
 add_shortcode('map', 'map_function');

 function arthur_maps_menu() {
   //  1st Title
   //  2nd Wordpress left menu
   //  3rd Users permissions
   //  4th Slug
   //  5th Callback function
   //  6th Page img default: settings icon
   //  7th Lists position on menu
   add_menu_page('Maps Scripts', 'Site Scripts', 'manage_options', 'arthur-maps-menu', 'arthur_maps_scripts_page', '', 200);
 }

 add_action('admin_menu', 'arthur_maps_menu');

 function arthur_maps_scripts_page() {
   if(array_key_exists("submit_config", $_POST)) {
      update_option("arthur_maps_api_key", $_POST["api_key"])
      ?>
      <div id="submit_confirmation" class="updated settings-error notice is-dismissible"> Settings saved! </div>
      <?php
   }

   $api_key = get_option("arthur_maps_api_key", "none");

   ?>
   <div class="wrap">
   <h2>Arthur Maps configuration</h2>
   <form method="post" action="">
   <label for="api_key"> API KEY </label>
   <input type="text" name="api_key" value=<?php print $api_key; ?>>

   <br><br>
   <input type="submit" name="submit_config" class="button button-primary" value="Submit configuration">
   </div>
   <?php
 }

   //  Add things to the Header scripts
 function arthur_maps_display_maps_scripts() {
   $api_key = get_option("arthur_maps_api_key", "none");
   $scripts = '';
   // Polyfills to allow latest ES6 features
   $scripts .= '<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>';
   // Custom Javascript
   $scripts .= '<script src="/main.js"></script>';
   // Google maps javascript lib with the users custom api key
   $scripts .= sprintf('<script src="https://maps.googleapis.com/maps/api/js?key=%s&callback=initMap&libraries=&v=weekly" defer></script>', $api_key);

   print $scripts;
 }

 add_action("wp_head", "arthur_maps_display_maps_scripts");

 function load_resources() {
   wp_register_style( 'maps.css', plugin_dir_url( __FILE__ ) . '_inc/maps.css', array(), "1.0.0" );
   wp_enqueue_style( 'maps.css');
   wp_register_script( 'maps.js', plugin_dir_url( __FILE__ ) . '_inc/maps.js', array(), "1.0.0" );
   wp_enqueue_script( 'maps.js');
 }

 add_action( 'admin_enqueue_scripts', array( '', 'load_resources' ) );

?> 