<?php
	
	namespace Theme\Shortcodes;
    
	use WPKit\Shortcodes\Shortcode;
	
	class Test extends Shortcode {
		
		/**
	     * The shortcode tag
	     *
	     * @var string
	     */
		var $tag = 'test';
		
		/**
	     * The attributes of the shortcode
	     *
	     * @var array
	     */
		var $atts = [
			'text' => 'foo',
			'icon' => 'icon.png',
			'message' => 'Hey!'
		];
		
		/**
	     * Get filename for the shortcode
	     *
	     * @return string
		 */	
		protected function getFilename() {
			
			return 'tests' . DS . $this->tag;
			
		}
		
		/**
	     * Filter the shortcode attributes
	     *
	     * @param array $atts
	     * @return array
		 */
		protected function filterAtts( $atts = array() ) {
	
	    	$atts['icon'] = get_stylesheet_directory_uri() . '/images/' . $atts['icon'];
			
			return $atts;
			
		}
			
		/**
	     * Get default attributes for the shortcode
	     *
	     * @return array
		 */
		protected function getDefaultAtts() {
	
			if( is_user_logged_in() ) {
	
				global $current_user;
		
				$this->atts['message'] = 'Hey ' . $current_user->first_name;
	
			}
			
			return $this->atts;
			
		}
	    
	}
