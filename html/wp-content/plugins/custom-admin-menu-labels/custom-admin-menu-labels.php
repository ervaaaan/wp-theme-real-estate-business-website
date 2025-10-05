<?php
/**
 * Plugin Name: Custom Admin Menu Labels
 * Description: Rename items in the admin menu for specific post types.
 * Version: 1.1.0
 * Author: Dhea Ervan Insani
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Rename labels for the "blc-product-review" custom post type
 */
add_action( 'init', function() {
	$post_type = 'blc-product-review';
	$object = get_post_type_object( $post_type );

	if ( ! $object ) {
		return;
	}

	$labels = $object->labels;

	// Update the relevant labels
	$labels->name               = 'Properties';
	$labels->singular_name      = 'Property';
	$labels->menu_name          = 'Properties';
	$labels->name_admin_bar     = 'Property';
	$labels->add_new            = 'Add New Property';
	$labels->add_new_item       = 'Add New Property';
	$labels->edit_item          = 'Edit Property';
	$labels->new_item           = 'New Property';
	$labels->view_item          = 'View Property';
	$labels->search_items       = 'Search Properties';
	$labels->not_found          = 'No properties found';
	$labels->not_found_in_trash = 'No properties found in Trash';

    // Set menu icon (Dashicons)
	$object->menu_icon = 'dashicons-admin-home';
});
