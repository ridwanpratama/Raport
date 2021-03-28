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
  const {
    children: { length },
    lastElementChild
  } = formsParent

  if (length > 2) formsParent.removeChild(lastElementChild)
})

function init(parentNode) {
  const nilaiSelect = parentNode.querySelector('#nilaiSelect')
  const mapelSelect = parentNode.querySelector('#mapelSelect')
  const hiddenMapelInputs = parentNode.querySelectorAll(
    'input[name="mapel_id[]"]'
  )
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
    hiddenMapelInputs.forEach(input => (input.value = value))
  })
}

init(baseForm)
