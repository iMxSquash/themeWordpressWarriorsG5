module.exports = {
  content: [
    "./includes/**/*.php",
    "./admin/**/*.php",
    "./public/**/*.php"
  ],
  theme: {
    extend: {
        colors: {
            blue: {
                100: '#F4F9FF',
                300: '#72C5F5',
                500: '#3D8CE1',
                900: '#0C264D',
            },
            danger: '#67141C',
            warning: '#9C4D08',
        },
        fontFamily: {
            'maragsa': ['Maragsa'],
            'realway': ['Realway'],
        },  
    },
  },
  plugins: [],
}
