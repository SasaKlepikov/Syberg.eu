<?php
/**
 * WooCommerce Jetpack Add to Cart per Category
 *
 * The WooCommerce Jetpack Add to Cart per Category class.
 *
 * @class    WCJ_Add_To_Cart_Per_Category
 * @version  2.2.0
 * @category Class
 * @author   Algoritmika Ltd.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WCJ_Add_To_Cart_Per_Category' ) ) :

class WCJ_Add_To_Cart_Per_Category {

    /**
     * Constructor.
     */
    public function __construct() {

        // Main hooks
        if ( 'yes' === get_option( 'wcj_add_to_cart_per_category_enabled' ) ) {
			add_filter( 'woocommerce_product_single_add_to_cart_text', 	array( $this, 'change_add_to_cart_button_text_single' ), 	PHP_INT_MAX );
			add_filter( 'woocommerce_product_add_to_cart_text', 		array( $this, 'change_add_to_cart_button_text_archive' ), 	PHP_INT_MAX );
        }
    }

    /**
     * change_add_to_cart_button_text_single.
     */
    public function change_add_to_cart_button_text_single( $add_to_cart_text ) {
		return $this->change_add_to_cart_button_text( $add_to_cart_text, 'single' );
	}

    /**
     * change_add_to_cart_button_text_archive.
     */
    public function change_add_to_cart_button_text_archive( $add_to_cart_text ) {
		return $this->change_add_to_cart_button_text( $add_to_cart_text, 'archive' );
	}

    /**
     * change_add_to_cart_button_text.
     */
    public function change_add_to_cart_button_text( $add_to_cart_text, $single_or_archive ) {
		$product_categories = get_the_terms( get_the_ID(), 'product_cat' );
		if ( empty( $product_categories ) )
			return $add_to_cart_text;
		for ( $i = 1; $i <= apply_filters( 'wcj_get_option_filter', 1, get_option( 'wcj_add_to_cart_per_category_total_groups_number', 1 ) ); $i++ ) {
			if ( 'yes' !== get_option( 'wcj_add_to_cart_per_category_enabled_group_' . $i ) )
				continue;
//			$categories = array_filter( explode( ',', get_option( 'wcj_add_to_cart_per_category_group_' . $i ) ) );
			$categories = get_option( 'wcj_add_to_cart_per_category_ids_group_' . $i );
			if ( empty(  $categories ) )
				continue;
			foreach ( $product_categories as $product_category_id => $product_category ) {
				foreach ( $categories as $category ) {
					if ( $product_category_id == $category ) {
						return get_option( 'wcj_add_to_cart_per_category_text_' . $single_or_archive . '_group_' . $i, $add_to_cart_text );
					}
				}
			}
		}
        return $add_to_cart_text;
    }
}

endif;

return new WCJ_Add_To_Cart_Per_Category();
