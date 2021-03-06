const moreMapel = document.querySelector('#moreMapel')
const lessMapel = document.querySelector('#lessMapel')
const baseForm = document.querySelector('#baseForm')
const formsParent = document.querySelector('#formsParent')

function toggleLessMapel() {
  if (document.querySelectorAll('#baseForm').length <= 1) {
    lessMapel.style.visibility = 'hidden'
  } else {
    lessMapel.style.visibility = 'visible'
  }
}

moreMapel.addEventListener('click', () => {
  const formClone = baseForm.cloneNode(true)
  formsParent.appendChild(formClone)
  toggleLessMapel()
  init(formClone)
})

lessMapel.addEventListener('click', () => {
  const {
    children: { length },
    lastElementChild
  } = formsParent
  if (length > 2) formsParent.removeChild(lastElementChild)
  toggleLessMapel()
})

function init(parentNode) {
  const jenisNilaiSelect = parentNode.querySelector('#jenisNilaiSelect')
  const mapelSelect = parentNode.querySelector('#mapelSelect')
  const semesterSelect = parentNode.querySelector('#semesterSelect')
  const hiddenMapelInputs = parentNode.querySelectorAll(
    'input[name="detail_upd_id[]"]'
  )
  const hiddenJenisNilaiInputs = parentNode.querySelectorAll(
    'input[name="jenis_nilai_id[]"]'
  )
  const hiddenSemesterInputs = parentNode.querySelectorAll(
    'input[name="semester[]"]'
  )

  mapelSelect.addEventListener('change', ({ target: { value } }) => {
    hiddenMapelInputs.forEach(input => (input.value = value))
  })

  jenisNilaiSelect.addEventListener('change', ({ target: { value } }) => {
    hiddenJenisNilaiInputs.forEach(input => (input.value = value))
  })

  semesterSelect.addEventListener('change', ({ target: { value } }) => {
    hiddenSemesterInputs.forEach(input => (input.value = value))
  })
}

init(baseForm)
