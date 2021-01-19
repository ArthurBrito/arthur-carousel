<?php
/**
 * Plugin Name: Arthur-carousel
 * Description: Plugin to add use bootstrap carousel with high customization
 **/

 function carousel_start() {
    $first_img = get_option("arthur_carousel_first_img", "none");
    $first_img_alt = get_option("arthur_carousel_first_img_alt", "none");

    $second_img = get_option("arthur_carousel_second_img", "none");
    $second_img_alt = get_option("arthur_carousel_second_img_alt", "none");

    $third_img = get_option("arthur_carousel_third_img", "none");
    $third_img_alt = get_option("arthur_carousel_third_img_alt", "none");
    
    $carousel = '';
    $carousel .= '<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">';
    $carousel .= '<div class="carousel-inner">';
    $carousel .= '<div class="carousel-item active">';
    $carousel .= '<img src="'.$first_img.'"class="d-block w-100" alt="'.$first_img_alt.'">';
    $carousel .= '</div>';
    $carousel .= '<div class="carousel-item">';
    $carousel .= '<img src="'.$second_img.'"class="d-block w-100" alt="'.$second_img_alt.'">';
    $carousel .= '</div>';

    // Dynamic display the third item
    if ($third_img !== 'none' && $third_img_alt !== 'none') {
      $carousel .= '<div class="carousel-item">';
      $carousel .= '<img src="'.$third_img.'"class="d-block w-100" alt="'.$third_img_alt.'">';
      $carousel .= '</div>';
    }

    $carousel .= '</div>';
    $carousel .= '</div>';
    $carousel .= '</div>';

    return $carousel;
 }
 //  Page and post shortcode
 add_shortcode('arthur_carousel', 'carousel_start');

 function arthur_carousel_menu() {
   //  1st Title
   //  2nd Wordpress left menu
   //  3rd Users permissions
   //  4th Slug
   //  5th Callback function
   //  6th Page img default: settings icon
   //  7th Lists position on menu
   add_menu_page('carousel Scripts', 'Site Scripts', 'manage_options', 'arthur-carousel-menu', 'arthur_carousel_scripts_page', '', 200);
 }

 add_action('admin_menu', 'arthur_carousel_menu');

 function arthur_carousel_scripts_page() {
   if(array_key_exists("submit_config", $_POST)) {
      update_option("arthur_carousel_first_img", $_POST["first_img"]);
      update_option("arthur_carousel_first_img_alt", $_POST["first_img_alt"]);

      update_option("arthur_carousel_second_img", $_POST["second_img"]);
      update_option("arthur_carousel_second_img_alt", $_POST["second_img_alt"]);

      update_option("arthur_carousel_third_img", $_POST["third_img"]);
      update_option("arthur_carousel_third_img_alt", $_POST["third_img_alt"]);

      ?>
        <div id="submit_confirmation" class="updated settings-error notice is-dismissible"> Settings saved! </div>
      <?php
   }

   $first_img = get_option("arthur_carousel_first_img", "none");
   $first_img_alt = get_option("arthur_carousel_first_img_alt", "none");

   $second_img = get_option("arthur_carousel_second_img", "none");
   $second_img_alt = get_option("arthur_carousel_second_img_alt", "none");

   $third_img = get_option("arthur_carousel_third_img", "none");
   $third_img_alt = get_option("arthur_carousel_third_img_alt", "none");

  ?>
    <div class="wrap">
      <h2>Arthur carousel configuration</h2>
      <form method="post" action="">

      <label for="first_img"> First img (URL)* </label>
      <input type="text" name="first_img" value=<?php print $first_img; ?>>
      <br>
      <label for="first_img_alt"> First img alt </label>
      <input type="text" name="first_img_alt" value=<?php print $first_img_alt; ?>>
      <br><br>
      <label for="second_img"> Second img (URL)* </label>
      <input type="text" name="second_img" value=<?php print $second_img; ?>>
      <br>
      <label for="second_img_alt"> Second img alt </label>
      <input type="text" name="second_img_alt" value=<?php print $second_img_alt; ?>>
      <br><br>
      <label for="third_img"> Third img (URL) </label>
      <input type="text" name="third_img" value=<?php print $third_img; ?>>
      <br>
      <label for="third_img_alt"> Third img alt </label>
      <input type="text" name="third_img_alt" value=<?php print $third_img_alt; ?>>
      <br>
      <p>* Mandatory fields </p>
      <br><br>
      <input type="submit" name="submit_config" class="button button-primary" value="Submit configuration">
    </div>
   <?php
 }

  //  Add things to the Header scripts
 function arthur_carousel_display_carousel_scripts() {
   $scripts = '';
   // Polyfills to allow latest ES6 features
   $scripts .= '<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>';
   // Bootstrap CSS
   $scripts .= '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">';
   // Boootstrap JS
   $scripts .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>';

   print $scripts;
 }

 add_action("wp_head", "arthur_carousel_display_carousel_scripts");

//  function load_resources() {
//    wp_register_style( 'carousel.css', plugin_dir_url( __FILE__ ) . '_inc/carousel.css', array(), "1.0.0" );
//    wp_enqueue_style( 'carousel.css');
//    wp_register_script( 'carousel.js', plugin_dir_url( __FILE__ ) . '_inc/carousel.js', array(), "1.0.0" );
//    wp_enqueue_script( 'carousel.js');
//  }

//  add_action( 'admin_enqueue_scripts', array( '', 'load_resources' ) );

?> 