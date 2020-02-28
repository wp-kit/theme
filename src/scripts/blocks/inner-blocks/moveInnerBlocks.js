export default ($preview, block) => {
	
	const preview = $preview[0]	
	const target = preview.querySelector('.js-inner-blocks')
	
	if( target ) {
		
		if( $preview.innerBlocks ) {
			
			target.appendChild($preview.innerBlocks)
			
		} else {
			
			const innerBlocks = preview.closest('.wp-block').querySelector('.editor-inner-blocks')
			
			$preview.innerBlocks = innerBlocks
			
			target.appendChild(innerBlocks)
			
		}
		
	}
	
}