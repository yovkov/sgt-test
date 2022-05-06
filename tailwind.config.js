module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'sgt-purple': '#252cbe',
      },      
      boxShadow: {
        '3xl': '0 0 32px rgba(0, 0, 0, 0.13)',
      }
    },
    fontFamily: {
      'heading': ['"Raleway"'],
      'body': ['"Open Sans"'],
    }
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
