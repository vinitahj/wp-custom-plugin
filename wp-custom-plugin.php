<?php
/*
* Plugin Name: Custom Plugin
* Plugin URI: https://github.com/vinitahj/wp-custom-plugin
* Description: Easy to make your own plugin by just small changes as per your requirments.
* Version: 1.0
* Author: Vinita Ahuja
* Author URI: https://github.com/vinitahj/wp-custom-plugin
*/


define( 'CUSTOM_PLUGIN_VERSION', '1.0' );
define( 'CUSTOM_PLUGIN__PLUGIN_DIR', plugin_dir_path(__FILE__) );
define( 'CUSTOM_PLUGIN__PLUGIN_URL', plugin_dir_url(__FILE__) );

//Include Class Files where all Functions are written


require_once(CUSTOM_PLUGIN__PLUGIN_DIR.'includes/CustomPlugin.php');


register_activation_hook( __FILE__, array( 'CustomPlugin', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'CustomPlugin', 'plugin_deactivation' ) );

add_action( 'init', array( 'CustomPlugin', 'init' ) );

