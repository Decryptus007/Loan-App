const updateEmail = document.getElementById('updateEmail')
const upForm = document.getElementById('upForm')
const overlayEmail = document.getElementById('overlayEmail')

const updateName = document.getElementById('updateName')
const upName = document.getElementById('upName')
const overlayName = document.getElementById('overlayName')

const updatePass = document.getElementById('updatePass')
const upPass = document.getElementById('upPass')
const overlayPass = document.getElementById('overlayPass')

updateEmail.addEventListener('click', () => {
    upForm.style.transform = 'scale(1, 1)'
})
overlayEmail.addEventListener('click', () => {
    upForm.style.transform = 'scale(0, 0)'
})

updateName.addEventListener('click', () => {
    upName.style.transform = 'scale(1, 1)'
})
overlayName.addEventListener('click', () => {
    upName.style.transform = 'scale(0, 0)'
})

updatePass.addEventListener('click', () => {
    upPass.style.transform = 'scale(1, 1)'
})
overlayPass.addEventListener('click', () => {
    upPass.style.transform = 'scale(0, 0)'
})