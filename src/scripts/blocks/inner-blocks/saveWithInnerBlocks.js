const { InnerBlocks } = wp.editor

export default blockName => (BlockSave, block) => {
  if (typeof block === "undefined") {
    return BlockSave;
  }

  if (block.name !== blockName) {
    return BlockSave || block.save;
  }

  return (
    <div>
      <InnerBlocks.Content />
    </div>
  );
}