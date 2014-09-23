<?php
/**
 * Plugin Name: YITH Pre-Launch
 * Plugin URI: http://yithemes.com/
 * Description: YITH Pre-Launch allows you to add a prelaunch page and customize it.
 * Version: 1.0.5
 * Author: Your Inspiration Themes
 * Author URI: http://yithemes.com/
 * Text Domain: yit
 * Domain Path: /languages/
 *
 * @author Your Inspiration Themes
 * @package YITH Pre-Launch
 * @version 1.0.4
 */
/*  Copyright 2013  Your Inspiration Themes  (email : plugins@yithemes.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if ( !defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

/* Include common functions */
if( !defined('YITH_FUNCTIONS') ) {
    require_once( 'yit-common/yit-functions.php' );
}

load_plugin_textdomain( 'yit', false, dirname( plugin_basename( __FILE__ ) ). '/languages/' );

define( 'YITH_PRELAUNCH', true );
define( 'YITH_PRELAUNCH_URL', plugin_dir_url( __FILE__ ) );
define( 'YITH_PRELAUNCH_DIR', plugin_dir_path( __FILE__ ) );
define( 'YITH_PRELAUNCH_OPTIONS_FILE', 'yith-prelaunch-options.php' );

// Load required classes and functions
require_once('functions.yith-prelaunch.php');

$child_path     = get_stylesheet_directory() . '/theme/assets/prelaunch/' . YITH_PRELAUNCH_OPTIONS_FILE;
$theme_path     = get_template_directory()   . '/theme/assets/prelaunch/' . YITH_PRELAUNCH_OPTIONS_FILE;
$plugin_path    = YITH_PRELAUNCH_DIR . YITH_PRELAUNCH_OPTIONS_FILE;

foreach ( array( $child_path, $theme_path, $plugin_path ) as $var ) {
    if ( file_exists( $var ) ) {
       require_once( $var );
        break;
    }
}

require_once('class.yith-prelaunch-admin.php');
require_once('class.yith-prelaunch-frontend.php');
require_once('class.yith-prelaunch.php');

// Let's start the game!
global $yith_prelaunch;
$yith_prelaunch = new YITH_Prelaunch();
