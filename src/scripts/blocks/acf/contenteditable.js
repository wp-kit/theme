export default ($preview, attributes, block) => {
	
	const preview = $preview[0]	
	
	const getInput = (el) => {
		
		let attribute = el.getAttribute('data-attribute')
		let parentRepeater = el.closest('[data-repeater]')
		let index = parentRepeater && parseInt(parentRepeater.getAttribute('data-repeater'))
		
		let selector = index ? `.acf-block-fields .acf-row[data-id="row-${index-1}"] .acf-field[data-name="${attribute}"]` : `.acf-block-fields .acf-field[data-name="${attribute}"]`
			
		let field = document.querySelector(selector)
		
		if( field ) {
		
			let key = field.getAttribute('data-key')
			
			if(index) {
				
				let repeater = field.closest('[data-type="repeater"]')
				let repeaterKey = repeater.getAttribute('data-key')
				
				return field.querySelector(`[name="acf-${attributes.id}[${repeaterKey}][row-${index-1}][${key}]"]`)
				
			} else {
				
				return field.querySelector(`[name="acf-${attributes.id}[${key}]"]`)
				
			}
			
		}
		
		return null	
		
	}
	
	Array.from(preview.querySelectorAll('[contenteditable][data-attribute]')).forEach(el => {
		
		el.addEventListener('input', () => {
			
			let input = getInput(el)
		
			if( input ) {
				
				$(input).val(el.innerHTML)
				
			}
			
		})
		
		el.addEventListener('blur', () => {
			
			let input = getInput(el)
		
			if( input ) {
				
				$(input).trigger('change')
				
			}
			
		})
		
	})
	
}
