
const dispApply = document.getElementById("applyLoan")
const overlay = document.getElementById("overlay")

const overlayL = document.getElementById("overlayL")
const applyWindow = document.getElementById("windowLoan")
const loanDetails = document.getElementById("loanDetails")
const calcBtn = document.getElementById("calcBtn")
const calcWindow = document.getElementById("calcWindow")
const cancelApply = document.getElementById("cancelApply")
const showL = document.getElementById("showL")
const loanPlan = document.getElementById("plan_id")
const loanType = document.getElementById("loan_plan_id")

const overlaySide = document.getElementById("overlayS")
const closeSide = document.getElementById("closeSide")
const openSide = document.getElementById("openSide")
const nav = document.getElementById("nav")

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
    calcWindow.style.display = 'block'
})

showL.addEventListener('click', () => {
    loanDetails.style.transform = 'scale(1, 1)'
})
overlayL.addEventListener('click', () => {
    loanDetails.style.transform = 'scale(0, 0)'
})

calcBtn.disabled = true
const valCheck = (param1, param2) => {
    if (param1 === "" || param2 === "") {
        calcBtn.disabled = true
    } else {
        calcBtn.disabled = false
    }
}

loanPlan.addEventListener('change', () => valCheck(loanPlan.value, loanType.value))
loanType.addEventListener('change', () => valCheck(loanType.value, loanType.value))

openSide.addEventListener('click', () => {
    overlaySide.style.transform = 'translateX(0)'
    nav.style.transform = 'translateX(0)'
})

closeSide.addEventListener('click', () => {
    overlaySide.style.transform = 'translateX(-100%)'
    nav.style.transform = 'translateX(-100%)'
})
overlaySide.addEventListener('click', () => {
    overlaySide.style.transform = 'translateX(-100%)'
    nav.style.transform = 'translateX(-100%)'
})