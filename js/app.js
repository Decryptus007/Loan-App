
const dispApply = document.getElementById("applyLoan")
const overlay = document.getElementById("overlay")
const applyWindow = document.getElementById("windowLoan")
const calcBtn = document.getElementById("calcBtn")
const calcWindow = document.getElementById("calcWindow")
const cancelApply = document.getElementById("cancelApply")

dispApply.addEventListener('click', () => {
    applyWindow.style.transform = 'scale(1, 1)'
})

overlay.addEventListener('click', () => {
    applyWindow.style.transform = 'scale(0, 0)'
})
cancelApply.addEventListener('click', (e) => {
    applyWindow.style.transform = 'scale(0, 0)'
    e.preventDefault()
})

calcBtn.addEventListener('click', (e) => {
    e.preventDefault()
    // calcWindow.style.display = 'block'
})