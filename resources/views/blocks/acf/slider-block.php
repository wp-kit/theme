<?php if( have_rows( 'slides' ) ) : ?>

	<div class="slider js-slider">
		
		<?php while( have_rows( 'slides' ) ) : the_row(); ?>
		
			<div>
				<h1><?php the_sub_field('text'); ?>!</h1>
			</div>
		
		<?php endwhile; ?>
		
	</div>
	
<?php endif; ?>