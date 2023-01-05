<?php
/**
 * Plugin Name: GOAT Contact Form 7 Style for Elementor
 * Description: The Elementor Contact Form 7 Addon is a plugin that allows you to easily add Contact Form 7 forms to your Elementor-powered website. With this plugin, you can customize the form design to match your needs and preferences.
 * Plugin URI: https://blocksmarket.net/cf7-style-for-elementor
 * Author: GOAT
 * Author URI: https://github.com/oktayefendi
 * Version: 1.0.0
 * License: GPLv2 or later
 * Text Domain: goat-elementor-cf7-addon
 */


 // Register the addon with Elementor

function goatcf7_addon_register_widgets($widgets_manager) {
  // Check if Contact Form 7 is installed
  if ( ! function_exists( 'wpcf7' ) ) {
    return;
  }
  // Include the widget file
  require_once( __DIR__ . '/widgets/cf7-form.php' );

  $widgets_manager->register( new \Goat_Elementor_CF7_Addon_Widget() );

}


add_action( 'elementor/widgets/register', 'goatcf7_addon_register_widgets' );


