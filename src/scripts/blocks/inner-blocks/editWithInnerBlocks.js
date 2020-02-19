const { Fragment } = wp.element
const { InnerBlocks } = wp.editor

export default (
  blockName,
  innerBlockParams,
  append = true,
  hideBlockEdit = false
) => BlockEdit => props => {
  if (props.name !== blockName) {
    return <BlockEdit {...props} />;
  }
  if (append) {
    return (
      <Fragment>
        {!hideBlockEdit && <BlockEdit {...props} />}
        <InnerBlocks {...innerBlockParams} />
      </Fragment>
    );
  }
  // put before block edit
  return (
    <Fragment>
      <InnerBlocks {...innerBlockParams} />
      {!hideBlockEdit && <BlockEdit {...props} />}
    </Fragment>
  );
}