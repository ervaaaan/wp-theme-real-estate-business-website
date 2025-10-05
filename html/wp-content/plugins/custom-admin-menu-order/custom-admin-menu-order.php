<?php
/**
 * Plugin Name: Custom Admin Menu Order
 * Description: Reorder admin menu: Posts below Pages, Properties below Posts, Blocksy below Settings.
 * Version: 1.1.0
 * Author: Dhea Ervan Insani
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enable custom menu order
 */
add_filter( 'custom_menu_order', '__return_true' );

/**
 * Define custom menu order
 */
add_filter( 'menu_order', function( $menu_order ) {
    if ( ! is_array( $menu_order ) ) {
        return $menu_order;
    }

    $new_order = [];

    foreach ( $menu_order as $item ) {
        $new_order[] = $item;

        // Put Posts below Pages
        if ( $item === 'edit.php?post_type=page' ) {
            $new_order[] = 'edit.php';
        }

        // Put Properties below Posts
        if ( $item === 'edit.php' ) {
            $new_order[] = 'edit.php?post_type=blc-product-review';
        }

        // Put Blocksy below Settings
        if ( $item === 'options-general.php' ) {
            $new_order[] = 'ct-dashboard';
        }
    }

    return $new_order;
});
