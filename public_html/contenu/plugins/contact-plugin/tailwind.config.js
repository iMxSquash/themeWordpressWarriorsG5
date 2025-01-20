module.exports = {
  content: [
    "./includes/**/*.{php,html,js}",
    "./admin/**/*.{php,html,js}",
    "./public/**/*.{php,html,js}",
    "./*.php"
  ],
  theme: {
    extend: {
        colors: {
            primary: {
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
        borderRadius: {
          '2rem': '2rem',
          '5rem': '5rem',
        }
    },
  },
  safelist: [
    'bg-primary-100',
    'bg-primary-300',
    'bg-primary-500',
    'bg-primary-900',
    'text-primary-100',
    'text-primary-300',
    'text-primary-500',
    'text-primary-900',
  ],
  plugins: [],
}
