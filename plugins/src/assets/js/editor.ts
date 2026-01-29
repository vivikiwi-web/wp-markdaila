wp.domReady(() => {
	const allowedBlocks = [
		'core/paragraph',
		'core/image',
		// 'core/html',
		'core/heading',
		// 'core/list',
		// 'core/quote',
		// 'core/preformatted',
		// 'core/separator',
		'core/spacer',
		'core/table',
		'core/video',
		'core/file',
		'core/buttons',
		'core/button',
		'core/group',
		// 'core/columns',
		// 'core/column',
		// 'core/media-text',
	];

	wp.blocks.getBlockTypes().forEach((blockType) => {
		if (!allowedBlocks.includes(blockType.name)) {
			wp.blocks.unregisterBlockType(blockType.name);
		}
	});
});
