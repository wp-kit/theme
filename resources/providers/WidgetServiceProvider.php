<?php
	
	namespace App\Providers;
	
	use Illuminate\Support\ServiceProvider;
	
	class WidgetServiceProvider extends ServiceProvider {
		 
		public function register() {
    
			foreach( app('config')->get('widgets.widgets') as $widget ) {
				
				add_action( 'widgets_init', function() use ($widget) {
    				
					register_widget($widget);
					
				});
				
			}
		
		}
		
	}