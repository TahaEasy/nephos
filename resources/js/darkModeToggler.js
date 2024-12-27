export const availableColors = [
  'default',
  'default-light',
  'sea',
  'aquamarine',
  'purpley',
  'livery',
  'muddy',
  'sandy',
  'grown',
  'gold',
  'orangey',
  'redy',
  'withered-purple',
  'pinky',
  'greeny',
  'beige',
  'black',
  'majorelle-blue',
  'tawny',
]

const darkTogglers = document.getElementsByClassName('dark-toggler')
const lightTogglers = document.getElementsByClassName('light-toggler')

for (let i = 0; i < darkTogglers.length; i++) {
  const darkToggler = darkTogglers[i];
  
  darkToggler.addEventListener('click', () => {
    document.documentElement.setAttribute('data-theme', 'dark')
    localStorage.theme = 'dark'
    
    const currentColor = document.body.getAttribute('data-theme')

    if (currentColor === 'default' || !availableColors.includes(currentColor)) {
      document.body.setAttribute('data-theme', 'default-light')
      localStorage.themeColor = 'default-light'
    }
  })
}

for (let i = 0; i < lightTogglers.length; i++) {
  const lightToggler = lightTogglers[i];
  
  lightToggler.addEventListener('click', () => {
    document.documentElement.setAttribute('data-theme', 'light')
    localStorage.theme = 'light'
    
    const currentColor = document.body.getAttribute('data-theme')

    if (currentColor === 'default-light' || !availableColors.includes(currentColor)) {
      document.body.setAttribute('data-theme', 'default')
      localStorage.themeColor = 'default'
    }
  })
}