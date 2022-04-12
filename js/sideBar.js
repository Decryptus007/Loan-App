const overlaySide = document.getElementById("overlayS")
const closeSide = document.getElementById("closeSide")
const openSide = document.getElementById("openSide")
const nav = document.getElementById("nav")

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