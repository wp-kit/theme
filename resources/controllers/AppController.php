<?php
	
	namespace Theme\Controllers;
	
	use WPKit\Invoker\Controller;
	use Illuminate\Support\Facades\Request;
	
	class AppController extends Controller {
    	
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
	        
	        $this->loadManifest();
	        
	        return parent::getScripts();
		}
		
		/**
	     * Before filter method used before every action
	     *
	     * @return void
	     */
		public function beforeFilter(Request $request) {
			
			add_action( 'app_header_menu', array($this, 'displayMenu') );
			
			parent::beforeFilter($request);
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
	
