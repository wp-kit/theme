<?php
	
	namespace Theme\Controllers;
	
	use WPKit\Invoker\Controller;
	use Illuminate\Support\Facades\Input;
	
	class AppController extends Controller {
    	
    	public $scripts = [
        	'style.css',
    	];
    	
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
		
		public function beforeFilter(Input $request) {
			
			add_action( 'app_header_menu', array($this, 'display_app_header_menu') );
			
			parent::beforeFilter($request);
		}
		
		public function display_app_header_menu() {
			
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
	