<?php
	
	namespace Theme\Providers;
	
	use TwigBridge\ServiceProvider;
	
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
	    }
		
	}