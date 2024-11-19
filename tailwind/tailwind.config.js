// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;

module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files trigger a rebuild.
		'./theme/**/*.php',
	],
	theme: {
		// Extend the default Tailwind theme.
		extend: {
			colors: {
				primary: {
					DEFAULT: '#015A86',
				},
				secondary: {
					DEFAULT: '#212529',
				},
				dark: {
					DEFAULT: '#212529',
				},
				footer: {
					DEFAULT: '#0000001a',
					light: '#0000001a',
					dark: '#1c1b1b',
					500: '#0000001a',

				}
			},
			backgroundColor: (theme) => ({
				...theme('colors'),
				lightBackground: '#F2F2EA',
				darkBackground: '#1c1b1b',
				footerBackground: '#0000001a',
			}),

			borderRadius: {
				DEFAULT: '1rem',
				md: '0.8rem',
				sm: '0.5rem',
				lg: '1.5rem',
			},
		},
	},
	corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Add Tailwind Typography (via _tw fork).
		require('@_tw/typography'),

		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson'),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require('@tailwindcss/forms'),
		// require('@tailwindcss/aspect-ratio'),
		// require('@tailwindcss/container-queries'),

		function ({ addBase }) {
			addBase({
				':root': {
					'--color-primary': '#015A86', // Replace with your primary color
				},
			});
		},
	],
};
