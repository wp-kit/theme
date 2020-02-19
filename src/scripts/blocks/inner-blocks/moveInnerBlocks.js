export default ($preview, block) => {
	
	const preview = $preview[0]	
	const target = preview.querySelector('.js-inner-blocks')
	
	if( target ) {
		
		if( block.innerBlocks ) {
			
			target.appendChild(block.innerBlocks)
			
		} else {
			
			const innerBlocks = preview.closest('.wp-block').querySelector('.editor-inner-blocks')
			
			block.innerBlocks = innerBlocks
			
			target.appendChild(innerBlocks)
			
		}
		
	}
	
}