<?php
/**
 * Plugin Name: Date Archive Order
 * Plugin URI: https://github.com/dshanske/archive-order
 * Description: Changes date archives to go from oldest to newest
 * Author: David Shanske
 * Author URI: https://david.shanske.com
 * Text Domain: archive-order
 * Version: 0.01
 */

function date_archive_order_date_sort( $query ) {
	// check if the user is requesting an admin page
	if ( is_admin() ) {
		return;
	}

	if ( is_date() ) {
		$query->set( 'order', 'ASC' );
	}

	return $query;
}

add_filter( 'pre_get_posts', 'date_archive_order_date_sort' );
