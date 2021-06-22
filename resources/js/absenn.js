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
  const semesterSelect = parentNode.querySelector('#semesterSelect')
  const tanggalSelect = parentNode.querySelector('#tanggalSelect')

  const hiddenSemesterInputs = parentNode.querySelectorAll(
    'input[name="semester[]"]'
  )

  const hiddenTanggalInputs = parentNode.querySelectorAll(
    'input[name="tanggal[]"]'
  )

  semesterSelect.addEventListener('change', ({ target: { value } }) => {
    hiddenSemesterInputs.forEach(input => (input.value = value))
  })

  tanggalSelect.addEventListener('change', ({ target: { value } }) => {
    hiddenTanggalInputs.forEach(input => (input.value = value))
  })

}

init(baseForm)
