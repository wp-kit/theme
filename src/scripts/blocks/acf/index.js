import contenteditable from './contenteditable'

if(window.acf) {
	
	const { addFilter } = wp.hooks
	
	acf.addAction('prepare', () => {

		acf.data.blockTypes.forEach(block => {
			acf.addAction( `render_block_preview/type=${block.name.replace('acf/', '')}`, (preview, attributes) => contenteditable(preview, attributes, block) )
		})

	})

	

}
