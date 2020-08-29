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

	// If this is a date archive but if there is no year indicating it is an /onthisday from Post Kinds
	if ( is_date() && empty( $query->get( 'year' ) ) ) {
		$query->set( 'order', 'ASC' );
		error_log( wp_json_encode( $query ) );
	}

	return $query;
}

add_filter( 'pre_get_posts', 'date_archive_order_date_sort' );
