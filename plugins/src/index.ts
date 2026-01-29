import { getBlockTypes, unregisterBlockType } from '@wordpress/blocks';
import domReady from '@wordpress/dom-ready';

import './styles/style.scss';
import './styles/editor.scss';

import './blocks/header';

// čia galėsi daryti:
export const debounce = (fn: Function, delay = 300) => {
	let t: any;
	return (...args: any[]) => {
		clearTimeout(t);
		t = setTimeout(() => fn(...args), delay);
	};
};

domReady(() => {
	const allowedBlocks = [
		'core/paragraph',
		'core/image',
		'core/html',
		'core/freeform',
	];

	getBlockTypes().forEach((blockType) => {
		if (!allowedBlocks.includes(blockType.name)) {
			unregisterBlockType(blockType.name);
		}
	});
});
