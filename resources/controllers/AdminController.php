<?php
	
	namespace Theme\Controllers;
	
	use WPKit\Invoker\Controller;
	use Illuminate\Support\Facades\Request;
	
	class AdminController extends Controller {
		
		use Traits\LoadsManifest;
    	
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
