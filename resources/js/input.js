const moreMapel = document.querySelector('#moreMapel')
const lessMapel = document.querySelector('#lessMapel')
const baseForm = document.querySelector('#baseForm')
const formsParent = document.querySelector('#formsParent')

moreMapel.addEventListener('click', () => {
  const formClone = baseForm.cloneNode(true)
  formsParent.appendChild(formClone)
  init(formClone)
})

lessMapel.addEventListener('click', () => {
  if (formsParent.children.length > 2)
    formsParent.removeChild(formsParent.lastElementChild)
})

function init(parentNode) {
  const nilaiSelect = parentNode.querySelector('#nilaiSelect')
  const mapelSelect = parentNode.querySelector('#mapelSelect')
  const hiddenMapelInput = parentNode.querySelector('input[name="mapel_id[]"]')
  const pengetahuanInputs = parentNode.querySelectorAll(
    'input[data-tag="pengetahuanInput"]'
  )
  const keterampilanInputs = parentNode.querySelectorAll(
    'input[data-tag="keterampilanInput"]'
  )

  nilaiSelect.addEventListener('change', ({ target: { value } }) => {
    keterampilanInputs.forEach(input =>
      input.setAttribute('name', `${value}k[]`)
    )
    pengetahuanInputs.forEach(input => input.setAttribute('name', `${value}[]`))
  })

  mapelSelect.addEventListener('change', ({ target: { value } }) => {
    hiddenMapelInput.value = value
  })
}

init(baseForm)
