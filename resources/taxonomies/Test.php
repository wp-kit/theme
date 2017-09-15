<?php

namespace Theme\Taxonomies;

use WPKit\Registry\Taxonomy;

class Test extends Taxonomy {
    
    /**
     * The post types the taxonomes should be registered on
     *
     * @var array
     */
    var $post_types = [
    	'test'
    ];
    
}
