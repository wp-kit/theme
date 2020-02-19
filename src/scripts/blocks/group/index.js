const { Fragment } = wp.element;
const { addFilter } = wp.hooks;
const { createHigherOrderComponent } = wp.compose;
const { InspectorControls } = wp.editor;
const { PanelBody, ToggleControl } = wp.components;
const { __ } = wp.i18n;

addFilter( 'blocks.registerBlockType', 'rest-kit/add-group-props', function ( props ) {
	if ( 'core/group' !== props.name ) {
        return props;
    }
    void 0 !== props.attributes && (props.attributes = Object.assign(props.attributes, {
      centered: {
        type: 'boolean',
        default: false
      }
    }))
    return props;
});

addFilter( 'editor.BlockEdit', 'rest-kit/group/with-inspector-controls', createHigherOrderComponent( ( BlockEdit ) => {
    return function( props ) {
	    if ( 'core/group' !== props.name ) {
	        return <BlockEdit { ...props } />
	    }
	    const { attributes, setAttributes } = props;
	    const { centered } = attributes;
	    return (
		    <Fragment>
		    	<BlockEdit { ...props } />
		    	<InspectorControls>
		    		<PanelBody title={ __( 'Group Settings' ) }>
		    			<ToggleControl
		    				checked={ !!centered }
		    				label={ 'Centered?' }
		    				onChange={ ( centered ) => {
			    				const className = centered ? 'grid-container' : ''
			                    setAttributes( { centered, className } )
							} }
						/>
					</PanelBody>
				</InspectorControls>
			</Fragment>
	    );
    };
}, 'withInspectorControls' ) );