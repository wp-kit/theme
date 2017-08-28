<?php

namespace Theme\Taxonomies;

use WPKit\Registry\Taxonomy;

class TestCategory extends Taxonomy {
    
    /**
     * The post types the taxonomes should be registered on
     *
     * @var array
     */
    var $post_types = [
    	'test'
    ];
    
}
