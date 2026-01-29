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
