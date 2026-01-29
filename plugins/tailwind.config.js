module.exports = {
	content: ['./src/**/*.{ts,tsx}', './src/**/block.json', './**/*.php'],
	theme: {
		screens: {
			sm: '640px',
			md: '768px',
			lg: '1024px',
			xl: '1168px',
		},
		extend: {
			colors: {
				neutral: {
					100: '#0A0A0A',
					90: '#2C2C2A',
					30: '#8D8E8E',
					25: '#DADADA',
					10: '#EFF1F2',
				},
				primary: {
					100: '#015FB6',
				},
			},
			fontFamily: {
				display: ['Playfair Display', 'serif'],
				body: ['Montserrat', 'sans-serif'],
			},
			maxWidth: {
				container: '1168px',
			},
		},
	},
	plugins: [],
};
