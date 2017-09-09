<?php
	
	namespace Theme\Providers;
	
	use Illuminate\Support\ServiceProvider;
	
	class SupportServiceProvider extends ServiceProvider {
		 
		public function register() {
    
			foreach(glob(resources_path('supports') . DS . '*.php') as $support) {
      
				require_once($support);
			
			}
		
		}
		
	}
