<?php
/*
Plugin Name: WooCommerce čeština
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7F53XKXAB2HSG
Plugin URI: http://wptranslations.eu/woocommerce-cestina/
Description: Přeloží plugin WooCommerce do češtiny. uživatelskou i admin část.
Version: 2.2
Author: Expres-Web.cz & wpranslations.eu
Author URI: http://wptranslations.eu
Text Domain: woocommerce-cestina

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Maybe load the WooCommerce čeština.
 *
 * @since 2.2
 */
 
	/**********  Vytvoreni menu hlavni **********/
add_action( 'admin_menu', 'register_my_custom_menu_page' );

function register_my_custom_menu_page(){
	add_menu_page( 'WooCommerce čeština', 'Woo čeština', 'activate_plugins', 'Info', 'ObsahUvodWC', plugins_url( 'woocommerce-cestina\img\cz.png' ), 56.6 ); 
}

// Obsah Kontaktní fomulář
function ObsahUvodWC() {


include 'info.php';

}

// Překlad uživ. částni
function wcc_load_textdomain() {
	$mofile = WP_PLUGIN_DIR . '/woocommerce-cestina/jazyky/user/' . apply_filters( 'woocommerce_locale', get_locale() ) . '.mo';

	if ( file_exists( $mofile ) )
		return load_textdomain( 'woocommerce', $mofile );
}
add_action( 'woocommerce_loaded', 'wcc_load_textdomain' );

// Překlad admin. částni
function wcca_load_textdomain() {
	$mofile = WP_PLUGIN_DIR . '/woocommerce-cestina/jazyky/admin/' . apply_filters( 'woocommerce_locale', get_locale() ) . '.mo';

	if ( file_exists( $mofile ) )
		return load_textdomain( 'woocommerce', $mofile );
}
add_action( 'woocommerce_loaded', 'wcca_load_textdomain' );

	// Funkce pro přidání CSS souboru do hlavičky administrace
    function WCC_PridaniCssSouboru(){
        wp_enqueue_style('woocommerce-cestina-css', plugin_dir_url(__FILE__).'design/style.css');
    }

	/**********   Konec definice funkcí   **********/


	// Spuštění funkce pro přidání CSS souboru do administrace
	add_action('init', 'WCC_PridaniCssSouboru');
	
/**