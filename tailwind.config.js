import defaultTheme from 'tailwindcss/defaultTheme';
// tailwind.config.js

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
   
        extend: {
            fontFamily: {
                sans: ['sans', ...defaultTheme.fontFamily.sans],
            },
            typography: {
                DEFAULT: {
                    css: {
                        // 'code:not(pre code)': {
                        //   backgroundColor: '#656c7633', // Light mode background color
                        //   padding: '2px 8px !important',
                        //   borderRadius: '12px',

                        // },
                        // '@media (prefers-color-scheme: dark)': {
                        //   'code:not(pre code)': {
                        //     //backgroundColor: '#2d3748', // Dark mode background color
                        //     color: '#e2e8f0', // Optional: adjust text color for dark mode
                        //   },
                        // },
                      
                      'code::before': {
                        content: '',
                      },
                      'code::after': {
                        content: '',
                      },
                    },
                  }
                  
              },
        },
    },
    darkMode:'class',
    plugins: [
        require('@tailwindcss/typography'),
        // ...
      ],
    
};
