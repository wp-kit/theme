<?php
	
	namespace Theme\Controllers;
	
	use WPKit\Invoker\Controller;
	use Illuminate\Support\Facades\Request;
	use WPKit\Invoker\Traits\LoadsManifest;
	
	class AdminController extends Controller {
		
		use LoadsManifest;
    	
    	protected $scriptsAction = 'admin_enqueue_scripts';
    	
    	/**
	     * Get scripts for controller
	     *
	     * @return array
	     */
    	public function getScripts() {
	    	
	    	wp_enqueue_script( 'jquery' );
	        
	        $this->loadManifest(['admin.js', 'admin.css']);
	        	        
	        return parent::getScripts();
		}
		
	}
