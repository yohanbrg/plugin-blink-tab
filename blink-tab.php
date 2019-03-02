<?php
/**
 * Plugin Name:       Blink Tab
 * Description:       Make the browser tab blink when tab switching
 * Version:           0.0.1
 * Author:            Yohan Bourgogne
 * Text Domain:       blink-tab
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
|--------------------------------------------------------------------------
| DEFINES
|--------------------------------------------------------------------------
*/
define( 'BLINK_TAB_VERSION', '0.0.1' );
define( 'BLINK_TAB_FILE'                  , __FILE__ );
define( 'BLINK_TAB_PATH'                  , realpath( plugin_dir_path( BLINK_TAB_FILE ) ) . DIRECTORY_SEPARATOR );
define( 'BLINK_TAB_PLUGIN_URL'            , plugin_dir_url( BLINK_TAB_FILE ) );
define( 'BLINK_TAB_INC_PATH'              , BLINK_TAB_PATH . 'inc' . DIRECTORY_SEPARATOR );
define( 'BLINK_TAB_TEMPLATES_PATH'              , BLINK_TAB_PATH . 'templates' . DIRECTORY_SEPARATOR );
define( 'BLINK_TAB_ASSETS_URL'              , BLINK_TAB_PLUGIN_URL . 'assets/' );
define( 'BLINK_TAB_JS_URL'              , BLINK_TAB_ASSETS_URL . 'js/' );

/*
|--------------------------------------------------------------------------
| REQUIRE
|--------------------------------------------------------------------------
*/
require_once BLINK_TAB_INC_PATH . 'BlinkTab_AdminPage.php';
require_once BLINK_TAB_INC_PATH . 'BlinkTab_Handler.php';

add_action('plugins_loaded', ['BlinkTab_Handler', 'init']);
