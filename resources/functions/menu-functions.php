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
	    $the_menu_items;
	    foreach($menu_items as $item) {
			$item->children = [];
			$item->path = parse_url($item->url, PHP_URL_PATH);
			if($item->menu_item_parent) {
				 $the_menu_items[$item->menu_item_parent]->children[] = $item;
			} else { 
				$the_menu_items[$item->ID] = $item;
			}  
		}
	    // Return menu post objects
	    return array_values($the_menu_items);
	}
