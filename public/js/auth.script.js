const button = document.querySelector('.signInButton');
const targetOfButton = document.querySelector('#abstract__form_input')

button.addEventListener('click', () => {
  targetOfButton.checked = true
})