// Menu Show&Hidden
const navMenu = document.getElementById('nav_menu'),
    navToggle = document.getElementById('nav_toggle'),
    navCLose = document.getElementById('nav_close'),
    header = document.getElementById('header')

// Menu Show
if (navToggle) {
    navToggle.addEventListener('click', () => {
        navMenu.classList.add('show-menu')
    })
}

//Menu Hiden
if (navCLose) {
    navCLose.addEventListener('click', () => {
        navMenu.classList.remove('show-menu')
    })
}

//Remove Menu Mobile
const navLink = document.querySelectorAll('.link')

function linkAction() {
    const navMenu = document.getElementById('nav_menu')
    navMenu.classList.remove('show-menu')
}

navLink.forEach(n => n.addEventListener('click', linkAction))


window.addEventListener('scroll',  ()=> {
    if( window.scrollY > 400){
        header.classList.add('scrolled')
    }else {
        header.classList.remove('scrolled')
    }
});
