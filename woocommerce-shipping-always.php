<?php
/*
Plugin Name: WooCommerce - Always Ask for Shipping Address
Plugin URI: https://github.com/OM4/woocommerce-shipping-always
Description: During checkout, always ask the customer for a shipping address. Useful if you have virtual products that still need a shipping address.
Version: 0.1
Author: OM4
Author URI: http://om4.com.au/
Text Domain: woocommerce-shipping-always
Git URI: https://github.com/OM4/woocommerce-shipping-always
Git Branch: release
License: GPLv2
*/

/*
Copyright 2014 OM4 (email: info@om4.com.au    web: http://om4.com.au/)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! class_exists( 'WC_Shipping_Always' ) ) {

	/**
	 * This class is a singleton.
	 *
	 * Class WC_Shipping_Always
	 */
	class WC_Shipping_Always {

		/**
		 * Refers to a single instance of this class
		 */
		private static $instance = null;

		/**
		 * Creates or returns an instance of this class
		 * @return WC_Shipping_Always A single instance of this class
		 */
		public static function instance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;

		}

		/**
		 * Constructor
		 */
		private function __construct() {
			/*
			 * The 'woocommerce_cart_needs_shipping_address' filter forces the checkout process to ask for a shipping address,
			 * regardless of what is the customer's cart.
			 *
			 * Using 'woocommerce_cart_needs_shipping' would mean the customer has to select a valid shipping quote/method,
			 * whereas 'woocommerce_cart_needs_shipping_address' simply forces a shipping address but doesn't ask for a shipping method.
			 *
			 * Other filters such as 'woocommerce_product_needs_shipping' aren't required.
			 */
			add_filter( 'woocommerce_cart_needs_shipping_address', '__return_true' );
		}

	}

	WC_Shipping_Always::instance();

}