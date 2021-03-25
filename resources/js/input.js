const nilaiSelect = document.querySelector('#nilaiSelect')
const mapelSelect = document.querySelector('#mapelSelect')
const pengetahuanInputs = document.querySelectorAll(
  'input[data-tag="pengetahuanInput"]'
)
const keterampilanInputs = document.querySelectorAll(
  'input[data-tag="keterampilanInput"]'
)
const moreMapel = document.querySelector('#moreMapel')
const lessMapel = document.querySelector('#lessMapel')
const baseForm = document.querySelector('#baseForm')
const formsParent = document.querySelector('#formsParent')

nilaiSelect.addEventListener('change', ({ target: { value } }) => {
  keterampilanInputs.forEach(input => input.setAttribute('name', `${value}[]`))
  pengetahuanInputs.forEach(input => input.setAttribute('name', `${value}[]`))
})

moreMapel.addEventListener('click', () => {
  const formClone = baseForm.cloneNode(true)
  formsParent.appendChild(formClone)
})

lessMapel.addEventListener('click', () => {
  if (formsParent.children.length > 2)
    formsParent.removeChild(formsParent.lastElementChild)
})
