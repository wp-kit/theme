<?php
	
	namespace Theme\Providers;
	
	use Illuminate\Support\ServiceProvider;
	
	class FunctionsServiceProvider extends ServiceProvider {
		 
		public function register() {
    
			foreach(glob(resources_path('functions') . DS . '*.php') as $support) {
      
				require_once($support);
			
			}
		
		}
		
	}
