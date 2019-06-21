<?php
	
	/**
	 * Get nav menu items by location
	 *
	 * @param $location The menu location id
	 */
	function get_nav_menu_items_by_location( $location, $args = [] ) {
	 
	    // Get all locations
	    $locations = get_nav_menu_locations();
	 
	    // Get object id by location
	    $object = wp_get_nav_menu_object( $locations[$location] );
	 
	    // Get menu items by menu name
	    $menu_items = wp_get_nav_menu_items( $object->name, $args );
	 
	    // Return menu post objects
	    return $menu_items;
	}
