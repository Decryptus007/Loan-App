
const dispApply = document.getElementById("applyLoan")
const overlay = document.getElementById("overlay")

const overlayL = document.getElementById("overlayL")
const applyWindow = document.getElementById("windowLoan")
const loanDetails = document.getElementById("loanDetails")
const loanStatus = document.getElementsByClassName("badge")
const withdraw = document.getElementsByClassName("withdraw")
const fillDetails = document.getElementById("fillDetails")
const overlayB = document.getElementById("overlayB")

const calcBtn = document.getElementById("calcBtn")
const calcWindow = document.getElementById("calcWindow")
const cancelApply = document.getElementById("cancelApply")
const showL = document.getElementById("showL")
const loanPlan = document.getElementById("plan_id")
const loanType = document.getElementById("loan_plan_id")
const purpose = document.getElementById("purpose")
const amount = document.getElementById("amount")

const totalAmt = document.getElementById("totalAmt")
const mnthlyAmt = document.getElementById("mnthlyAmt")
const penAmt = document.getElementById("penAmt")

const overlaySide = document.getElementById("overlayS")
const closeSide = document.getElementById("closeSide")
const openSide = document.getElementById("openSide")
const nav = document.getElementById("nav")

const closeLoanD = document.getElementById("closeLoanD")

let wthdrw = 0
Array.from(loanStatus).forEach(el => {
    if (el.textContent == "Released") {
        const withdraw = document.createElement("span")
        withdraw.innerText = "Withdraw"
        withdraw.classList.add("withdraw")
        withdraw.setAttribute('id', `wthdrw-${wthdrw}`)
        el.appendChild(withdraw)
        wthdrw += 1
    }
})

const toggleWithdraw = (a, b) => fillDetails.style.transform = `scale(${a}, ${b})`

Array.from(withdraw).forEach(el => {
    el.addEventListener('click', () => {
        toggleWithdraw(1, 1)
        console.log(el.id);
    })
})

const calc = () => {
    let totalAmount
    if (loanPlan.value == 1) {
        totalAmount = ((amount.value / 100) * 8)
    } else if (loanPlan.value == 2) {
        totalAmount = ((amount.value / 100) * 5)
    } else if (loanPlan.value == 3) {
        totalAmount = ((amount.value / 100) * 6)
    }

    totalAmount += parseInt(amount.value)
    totalAmt.value = totalAmount.toFixed(2)

    let penAmtHolder

    if (loanPlan.value == 1) {
        mnthlyAmt.value = (totalAmount / 36).toFixed(2)
        penAmtHolder = parseFloat((mnthlyAmt.value / 100) * 3)
        penAmt.value = penAmtHolder.toFixed(2)
    } else if (loanPlan.value == 2) {
        mnthlyAmt.value = (totalAmount / 24).toFixed(2)
        penAmtHolder = parseFloat((mnthlyAmt.value / 100) * 2)
        penAmt.value = penAmtHolder.toFixed(2)
    } else if (loanPlan.value == 3) {
        mnthlyAmt.value = (totalAmount / 27).toFixed(2)
        penAmtHolder = parseFloat((mnthlyAmt.value / 100) * 2)
        penAmt.value = penAmtHolder.toFixed(2)
    }

    penAmt.scrollIntoView()
}

const valCheck = (param1, param2, param3, param4) => {
    if (param1 === "" || param2 === "" || param3 === "" || param4 === "") {
        calcBtn.disabled = true
    } else {
        calcBtn.disabled = false
    }
}

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

closeSide.addEventListener('click', () => {
    overlaySide.style.transform = 'translateX(-100%)'
    nav.style.transform = 'translateX(-100%)'
})
overlaySide.addEventListener('click', () => {
    overlaySide.style.transform = 'translateX(-100%)'
    nav.style.transform = 'translateX(-100%)'
})

overlayB.addEventListener('click', () => toggleWithdraw(0, 0))

loanPlan.addEventListener('change', () => valCheck(loanPlan.value, loanType.value, purpose.value, amount.value))
loanType.addEventListener('change', () => valCheck(loanType.value, loanType.value, purpose.value, amount.value))
purpose.addEventListener('change', () => valCheck(loanType.value, loanType.value, purpose.value, amount.value))
amount.addEventListener('change', () => valCheck(loanType.value, loanType.value, purpose.value, amount.value))

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

calcBtn.disabled = true
calcBtn.addEventListener('click', (e) => {
    e.preventDefault()
    calcWindow.style.display = 'block'
    calc()
})

showL.addEventListener('click', () => {
    loanDetails.style.transform = 'scale(1, 1)'
})
overlayL.addEventListener('click', () => {
    loanDetails.style.transform = 'scale(0, 0)'
})
closeLoanD.addEventListener('click', () => {
    loanDetails.style.transform = 'scale(0, 0)'
})

