<?php
    
    namespace Theme\Widgets;
    
    use WP_Widget;
    
    class TestWidget extends WP_Widget {
        
        public function __construct() {
    		parent::__construct('test_widget', __( 'Test Widget', 'woocommerce') );
    	}
    
        public function widget( $args, $instance ) {
            
            $text = 'Hello!';
            
    		echo view( 'widgets/test', compact( 'text' ) );
    		
    	}
    
    	 public function update( $new_instance, $old_instance ) {
    		// Save widget options
    	}
    
    	 public function form( $instance ) {
    		// Output admin widget options form
    	}
        
    }
