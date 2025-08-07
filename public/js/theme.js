const themeToggle = document.getElementById('theme-toggle')

function toggleTheme() {
  const restoreAnimation = disableAnimation()
  document.documentElement.classList.toggle('dark')

  const isDark = document.documentElement.classList.contains('dark')
  localStorage.setItem('theme', isDark ? 'dark' : 'light')
  themeToggle.setAttribute('data-theme', isDark ? 'dark' : 'light')

  restoreAnimation()
}

document.addEventListener('DOMContentLoaded', function () {
  const savedTheme = localStorage.getItem('theme')
  const restoreAnimation = disableAnimation()

  if (savedTheme === 'dark') {
    themeToggle.setAttribute('data-theme', 'dark')
    document.documentElement.classList.add('dark')
  } else {
    themeToggle.setAttribute('data-theme', 'light')
    document.documentElement.classList.remove('dark')
  }

  restoreAnimation()
})

const disableAnimation = (nonce) => {
  const css = document.createElement('style')
  if (nonce) css.setAttribute('nonce', nonce)
  css.appendChild(
    document.createTextNode(
      `*,*::before,*::after{-webkit-transition:none!important;-moz-transition:none!important;-o-transition:none!important;-ms-transition:none!important;transition:none!important}`,
    ),
  )
  document.head.appendChild(css)

  return () => {
    // Force restyle
    ;(() => window.getComputedStyle(document.body))()

    // Wait for next tick before removing
    setTimeout(() => {
      document.head.removeChild(css)
    }, 1)
  }
}
