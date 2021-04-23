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
  const jenisNilaiSelect = parentNode.querySelector('#jenisNilaiSelect')
  const mapelSelect = parentNode.querySelector('#mapelSelect')
  const hiddenMapelInputs = parentNode.querySelectorAll(
    'input[name="mapel_id[]"]'
  )
  const hiddenJenisNilaiInputs = parentNode.querySelectorAll(
    'input[name="jenis_nilai_id[]"]'
  )

  mapelSelect.addEventListener('change', ({ target: { value } }) => {
    hiddenMapelInputs.forEach(input => (input.value = value))
  })

  jenisNilaiSelect.addEventListener('change', ({ target: { value } }) => {
    hiddenJenisNilaiInputs.forEach(input => (input.value = value))
  })
}

init(baseForm)
