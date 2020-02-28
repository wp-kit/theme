import editWithInnerBlocks from './editWithInnerBlocks'
import saveWithInnerBlocks from './saveWithInnerBlocks'
import moveInnerBlocks from './moveInnerBlocks';

const { addFilter } = wp.hooks

const blocks = acf.data.blockTypes.filter(block => block.has_inner_blocks)

blocks.forEach(block => {
	addFilter("editor.BlockEdit", `with-inner-blocks/${block.name}`, editWithInnerBlocks(block.name, block.inner_block_params))
	addFilter("blocks.getSaveElement",  `with-inner-blocks/${block.name}`, saveWithInnerBlocks(block.name))
	acf.addAction( `render_block_preview/type=${block.name.replace('acf/', '')}`, (preview, attributes) => moveInnerBlocks(preview, attributes, block) )
})

