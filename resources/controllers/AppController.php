<?php
	
	namespace Theme\Controllers;
	
	use WPKit\Invoker\Controller;
	use Illuminate\Support\Facades\Input;
	
	class AppController extends Controller {
    	
    	/**
	     * @var array
	     */
    	public $scripts = [
        	'style.css',
    	];
    	
    	/**
	     * Get scripts for controller
	     *
	     * @return array
	     */
    	public function getScripts() {
	        
	        $this->scripts = array_merge($this->scripts, [
    	        [
    	            'file' => 'app.js',
    	            'localize' => [
        	            'name' => 'myAjax',
        	            'data' => [ 
        	                'ajax_url' => admin_url( 'admin-ajax.php' )
                        ]
    	            ]
                ]
	        ]);
	        
	        return parent::getScripts();
		}
		
		/**
	     * Before filter method used before every action
	     *
	     * @return void
	     */
		public function beforeFilter(Input $request) {
			
			add_action( 'app_header_menu', array($this, 'displayMenu') );
			
			parent::beforeFilter($request);
		}
		
		/**
	     * Output the header menu
	     *
	     * @return void
	     */
		public function displayMenu() {
			
			echo view( 'app/header-menu', array(
	           'items' => [
		           [
			           'link' => '#',
			           'label' => 'Test'
		           ]
	           ],
            ) );
            
		}
	
	}
	
