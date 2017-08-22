<?php
	
	namespace App\Controllers;
	
	use WPKit\Core\Controller;
	use Timber;
	use TimberMenu;
	
	class AppController extends Controller {
    	
    	/**
	     * Scripts and styles to enqueue when this controller is invoked
	     *
	     * @var Array
	     */
    	public $scripts = [
	    	'framework/framework.min.js',
	    	'application/parties/foundation.min.js',
	    	[
        	    'file' => 'application/parties/modernizr.js',
        	    'in_footer' => false,
            ],
        	'style.css',
    	];
    	
    	/**
	     * Get scripts and styles, where any manipulation of localize should be added
	     *
	     * @return Array
	     */
    	public function getScripts() {
	        
	        $this->scripts = array_merge($this->scripts, [
    	        [
    	            'file' => 'application/application.min.js',
    	            'localize' => [
        	            'name' => 'myAjax',
        	            'data' => [ 
        	                'ajax_url' => admin_url( 'admin-ajax.php' ), 
        	                'current_user_id' => get_current_user_id(), 
        	                'themeDir' => THEME_DIR
                        ]
    	            ]
                ]
	        ]);
	        
	        return parent::getScripts();
			
		}
		
		/**
	     * Filter called when Controller is invoked, this is where any actions and filters should be added
	     *
	     * @return Void
	     */
		public function beforeFilter() {
			
			add_action( 'app_header_menu', array($this, 'display_app_header_menu') );

            // some generic filters and actions across the whole site
			
			add_filter( 'style_loader_src', array($this, 'remove_cssjs_ver'), 10, 2 );

			add_filter( 'script_loader_src', array($this, 'remove_cssjs_ver'), 10, 2 );
			
			add_filter( 'the_content', array($this, 'fix_shortcodes') );
			
			add_filter( 'the_excerpt', array($this, 'adjust_excerpt') );
			
			add_filter( 'wp_title', array($this, 'theme_name_wp_title'), 10, 2 );
			
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			
	    	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	    	
	    	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	    	
	    	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	    		
	    	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	    	
	    	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	    	
	    	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	    	
	    	add_filter( 'tiny_mce_plugins', array($this, 'disable_emojis_tinymce') );
			
			add_filter( 'wp_calculate_image_srcset', '__return_false' );
			
			add_filter( 'script_loader_tag', array($this, 'clean_script_tag') );
			
			add_action( 'wp_footer', array($this, 'deregister_scripts') );
			
			parent::beforeFilter();
			
		}
		
		/**
	     * Add Header Menu
	     *
	     * @return Void
	     */
		public function display_app_header_menu() {
			
			$this->render( 'header-menu', array_merge(Timber::get_context(), array(
	           'menu' => new TimberMenu('header-menu'),
            ) ) ); 
			
		}
		
		/**
	     * Removes Emojis from TinyMCE
	     *
	     * @return Array
	     */
		public function disable_emojis_tinymce( $plugins ) {
	        
	    	if ( is_array( $plugins ) ) {
	        	
	    		return array_diff( $plugins, array( 'wpemoji' ) );
	    		
	    	} else {
	        	
	    		return array();
	    		
	    	}
	    	
	    }

		/**
	     * Removes Type tag from Script tags
	     *
	     * @return String
	     */
	    public function clean_script_tag($input) {
	        
	        $input = str_replace("type='text/javascript' ", '', $input);
	        
	        return str_replace("'", '"', $input);
	        
	    }
		
		/**
	     * Renames theme title to a friendlier string
	     *
	     * @return String
	     */
		public function theme_name_wp_title( $title, $sep ) {
		
			if ( is_feed() ) {
				
				return $title;
				
			}
			
			global $page, $paged;
		
			// Add the blog name
			$title .= get_bloginfo( 'name', 'display' );
		
			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) ) {
				$title .= " $sep $site_description";
			}
		
			// Add a page number if necessary:
			if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
				$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
			}
		
			return $title;
			
		}
		
		/**
	     * Cleans up shortcode <br> issue
	     *
	     * @return String
	     */
		public function fix_shortcodes($content) {
			
			$array = array (
				'<p>[' => '[',
				']</p>' => ']',
				']<br />' => ']'
			);
			$content = strtr($content, $array);
			
			return $content;
			
		}
		
		/**
	     * Reduces string down to a desired number of words
	     *
	     * @return String
	     */
		private function substr_words($text, $lim, $delim="&hellip;") { 
			
		    $len = strlen($text); 
		    
		    if ($len <= $lim) return $text; 
		 
		    // split at first word boundary after $lim chars 
		    preg_match('/(.{' . $lim . '}.*?)\b/', $text, $matches); 
		 
		    // preg above can result in "hello &amp" without terminal ';' 
		    $text = preg_replace("'(&[a-zA-Z0-9#]+)$'", '$1;', $matches[1]); 
		    
		    $text .= $delim; 
		    
		    return $text; 
		    
		}
		
		/**
	     * Reduces excerpt down to a desired size
	     *
	     * @return String
	     */
		public function adjust_excerpt( $excerpt ) {
			
			global $length;
			
			$length = ($length) ? $length : 90;
			
		    return str_replace('<p', '<p class="excerpt"', $this->substr_words($excerpt, $length, $delim="&hellip;"));
		    
		}
		
		/**
	     * Removes ver parameter from static assets
	     *
	     * @return String
	     */
		public function remove_cssjs_ver( $src ) {
    
		    if( strpos( $src, '?ver=' ) ) {
		    
		        $src = remove_query_arg( 'ver', $src );
		    
		    }
		        
		    return $src;
		    
		}
		
		/**
	     * Deregisters wp-embed script
	     *
	     * @return Void
	     */
		public function deregister_scripts(){
    
		    wp_deregister_script( 'wp-embed' );

		}
		
	}
	
