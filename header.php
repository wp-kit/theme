<!doctype html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>
	
		<meta charset="<?php bloginfo('charset'); ?>" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title><?php wp_title(); ?></title>
		
		<?php wp_head(); ?>
		
	</head>
	
	<body <?php body_class(); ?>>
		
		<!--------------------------------------------------------->
		<!--  Site: Header  -->
		<!--------------------------------------------------------->
		
		<header class="app-head" role="banner">
		
			<div class="grid">
				
				<div class="size-6 size-4-m size-3-l grid--item">
					
					<a href="<?php echo get_site_url(); ?>" class="logo">
    							
						<img src="<?php the_asset('logo.svg'); ?>" />
						
			        </a>
    				        
				</div>
				
				<div class="size-6 size-8-m size-9-l grid--item">
			    
				    <?php 
					    
					    /**
						 * app_header_menu hook.
						 *
						 * @hooked AppController@display_app_header_menu - 10
						 */
					    do_action( 'app_header_menu' );
					    
					?>
				    
				</div>
			
			</div>
		
		</header>
		
		<!--------------------------------------------------------->
		<!--  Site: Main  -->
		<!--------------------------------------------------------->
		
		<main class="app-main" role="main">
