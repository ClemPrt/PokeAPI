let menuToggle = document.querySelector('.menu-toggle')
const menu = document.querySelector('.menu')

/**
 * Menu toggle
 */
function MenuToggle() {
    menu.classList.toggle('open')
}

document.addEventListener('keydown', function (_event) {
    //Play pause toggle
    if (_event.keyCode == 65) {
        MenuToggle();
    }
})