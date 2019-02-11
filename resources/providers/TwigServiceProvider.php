<?php
	
	namespace Theme\Providers;
	
	use TwigBridge\ServiceProvider;
	use Timber\Twig;
	
	class TwigServiceProvider extends ServiceProvider {
		
		/**
	     * {@inheritdoc}
	     */
	    public function register()
	    {
	        $this->registerOptions();
	        $this->registerLoaders();
	        $this->registerEngine();
	        $this->registerAliases();
	    }
	    
	    /**
	     * {@inheritdoc}
	     */
	    public function boot()
	    {
	        $this->registerExtension();
	        
	        if( class_exists( Twig::class ) ) { 
	        
		        $twig = new Twig();
		        
		        $twig->add_timber_filters( $this->app['twig'] );
		        $twig->add_timber_functions( $this->app['twig'] );
		        $twig->add_timber_escapers( $this->app['twig'] );
		        
			}
			
	    }
		
	}
