<div class="grid"> 

	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
	
		<div class="size-12 size-8-m size-4-l grid--item">
			
			<h2><?php the_title(); ?></h2>
			
			<?php the_content(); ?>
            
		</div>
	            
	<?php endwhile; endif; ?>

</div>