<?php
	
namespace Theme\Controllers\Traits;

trait LoadsManifest {
	
	protected function loadManifest() {
			
		if(!defined('WP_DEV_SERVER')) {
			define('WP_DEV_SERVER', '');
		}
		
		$manifest = get_stylesheet_directory() . '/manifest.json';
        
        if( file_exists( $manifest ) ) {
	        
	        $scripts = (array) json_decode(file_get_contents($manifest));
	        
	        foreach(array_values($scripts) as $i => &$script) {
		        
		        $file = WP_DEV_SERVER && !filter_var($script, FILTER_VALIDATE_URL) ? WP_DEV_SERVER . $script : $script;
		        
		        if($i) {
		        
		        	$this->scripts[] = $file;
		        	
		        } else {
			        
			        $this->scripts = array_merge($this->scripts, [
		    	        [
		    	            'file' => $file,
		    	            'localize' => [
		        	            'name' => 'myAjax',
		        	            'data' => [ 
		        	                'ajax_url' => admin_url( 'admin-ajax.php' ),
		        	                'dev_server_url' => WP_DEV_SERVER
		                        ]
		    	            ]
		                ]
			        ]);
			        
		        }
		        
	        }
	        
	    }
		
	}
	
}
