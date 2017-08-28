<?php
	
	namespace Theme\Providers;
	
	use Illuminate\Support\ServiceProvider;
	
	class ErrorServiceProvider extends ServiceProvider {
		
		/**
	     * Register the service provider.
	     *
	     * @return void
	     */
		public function register() {
			
			$whoops = new \Whoops\Run;
			$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
			$whoops->register();
			
		}
		
	}