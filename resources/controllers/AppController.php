<?php
	
	namespace Theme\Controllers;
	
	use WPKit\Invoker\Controller;
	use Illuminate\Support\Facades\Request;
	
	class AppController extends Controller {
		
		use Traits\LoadsManifest;
    	
    	/**
	     * @var array
	     */
    	public $scripts = [];
    	
    	/**
	     * Get scripts for controller
	     *
	     * @return array
	     */
    	public function getScripts() {
	        
	        wp_enqueue_script( 'jquery' );
	        
	        $this->loadManifest(['app.js', 'app.css']);
	        
	        return parent::getScripts();
		}
		
		/**
	     * Default controller method when controller is invoked
	     *
	     * @return void
	     */
		public function boot(Request $request) {
			
			action( 'app_header_menu', 'displayMenu' );
		}
		
		/**
	     * Output the header menu
	     *
	     * @return void
	     */
		public function displayMenu() {
			
			echo view( 'app/header-menu', ['items' => get_nav_menu_items_by_location('header-menu')] );
            
		}
	
	}
	
