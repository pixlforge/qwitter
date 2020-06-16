const plugin = require('tailwindcss/plugin')

module.exports = {
  theme: {
    extend: {
      boxShadow: {
        light: '0 0 15px 0 rgba(255, 255, 255, .1)'
      }
    },
  },
  variants: {
    backgroundColor: ['responsive', 'hover', 'focus', 'important'],
    borderWidth: ['important'],
    textColor: ['responsive', 'hover', 'focus', 'important'],
  },
  plugins: [
    plugin(function ({ addVariant }) {
      addVariant('important', ({ container }) => {
        container.walkRules(rule => {
          rule.selector = `.\\!${rule.selector.slice(1)}`
          rule.walkDecls(decl => {
            decl.important = true
          })
        })
      })
    })
  ],
}
