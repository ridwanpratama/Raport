const nilaiSelect = document.querySelector('#nilaiSelect')
const mapelSelect = document.querySelector('#mapelSelect')
const pengetahuanInputs = document.querySelectorAll(
  'input[data-tag="pengetahuanInput"]'
)
const keterampilanInputs = document.querySelectorAll(
  'input[data-tag="keterampilanInput"]'
)

nilaiSelect.addEventListener('change', ({ target: { value } }) => {
  keterampilanInputs.forEach(input => input.setAttribute('name', `${value}[]`))
  pengetahuanInputs.forEach(input => input.setAttribute('name', `${value}[]`))
})
