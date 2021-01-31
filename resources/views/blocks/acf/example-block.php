<div class="example">
	
	<h1>Hello <span contenteditable="<?= is_admin() ? 'true' : 'false'; ?>" data-attribute="text"><?php the_field('text'); ?></span>!</h1>
	
	<InnerBlocks />
	
</div>
