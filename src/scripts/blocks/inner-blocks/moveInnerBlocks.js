import $ from 'jquery'

export default ($preview, attributes, block) => {
	
	const preview = $preview[0]	
	const target = preview.querySelector('.js-inner-blocks')
	
	if( target ) {
		
		block.innerBlocks = block.innerBlocks || {}
		
		const innerBlocks = block.innerBlocks[attributes.id] || preview.closest('.wp-block').querySelector('.editor-inner-blocks')
		
		block.innerBlocks[attributes.id] = innerBlocks
		
		target.appendChild(innerBlocks)
		
	}
	
	Array.from(preview.querySelectorAll('[contenteditable][data-attribute]')).forEach(el => {
		
		el.addEventListener('input', () => {
			
			let attribute = el.getAttribute('data-attribute')
		
			let field = document.querySelector(`.acf-block-fields .acf-field[data-name="${attribute}"]`)
			
			if( field ) {
			
				let key = field.getAttribute('data-key')
				
				let input = field.querySelector(`[name="acf-${attributes.id}[${key}]"]`)
				
				if( input ) {
					
					$(input).val(el.innerHTML).trigger('change')
					
				}
				
			}
			
		})
		
	})
	
}