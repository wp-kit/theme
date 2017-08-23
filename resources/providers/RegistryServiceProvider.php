<?php
	
	namespace Theme\Providers;
	
	use Illuminate\Support\ServiceProvider;
	use PostTypes\PostType;
	
	class RegistryServiceProvider extends ServiceProvider {
		
		public function register() {
			
			$post_types = $this->app['config']['registry']['post_types'];
			$taxonomies = $this->app['config']['registry']['taxonomies'];
			
			array_map(array($this, 'registerPostType'), array_keys($post_types), $post_types);
			array_map(array($this, 'registerTaxonomy'), array_keys($taxonomies), $taxonomies);
			
		}
		
		protected function registerPostType($key, $post_type) {
			
			$post_type = is_array( $post_type ) ? $post_type : get_object_vars( new $post_type() );
			
			$post_type = array_merge(array(
				'names' => $key,
				'options' => [],
				'labels' => [],
				'taxonomies' => []
			), $post_type);
			
			$object = new PostType($post_type['names'], $post_type['options'], $post_type['labels']);
			
			foreach( $post_type['taxonomies'] as $key => $taxonomy ) {
				
				$taxonomy = array_merge(array(
					'names' => $key,
					'options' => []
				), $taxonomy);
					
				$object->taxonomy($taxonomy['names'], $taxonomy['options']);
				
			}
			
		}
		
		protected function registerTaxonomy($key, $taxonomy) {
			
			$taxonomy = is_array( $taxonomy ) ? $taxonomy : get_object_vars( new $taxonomy() );
			
			$taxonomy = array_merge(array(
				'names' => $key,
				'options' => [],
				'post_types' => []
			), $taxonomy);
			
			foreach( $taxonomy['post_types'] as $post_type ) {
					
				$post_type = new PostType($post_type);
				
				$post_type->taxonomy($taxonomy['names'], $taxonomy['options']);
				
			}
			
		}
		
	}