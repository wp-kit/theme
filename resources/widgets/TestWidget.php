<?php
    
    namespace Theme\Widgets;
    
    use WP_Widget;
    
    class TestWidget extends WP_Widget {
        
        public function __construct($id_base, $name) {
    		$this->widget_cssclass    = 'test_widget';
    		$this->widget_description = __( 'Test Widget', 'woocommerce' );
    		$this->widget_id          = $id_base;
    		$this->widget_name        = $name;
    		parent::__construct($id_base, $name);
    	}
    
        public function widget( $args, $instance ) {
            
            $this->widget_start( $args, $instance );
            
            $text = 'Hello!';
            
    		echo view( 'widgets/test', compact( 'text' ) );
    		
    		$this->widget_end( $args );
    		
    	}
    
    	 public function update( $new_instance, $old_instance ) {
    		// Save widget options
    	}
    
    	 public function form( $instance ) {
    		// Output admin widget options form
    	}
        
    }
