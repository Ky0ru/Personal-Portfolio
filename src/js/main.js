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

const sections = document.querySelectorAll('section[id]')

function scrollActive() {
    const scrollY = window.scrollY

    sections.forEach(current => {
        const sectionHeight = current.offsetHeight
        const sectionTop = current.offsetTop - 50;
        sectionId = current.getAttribute('id')

        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
            document.querySelector('.nav-menu a[href*=' + sectionId + ']').classList.add('active-link')
        } else {
            document.querySelector('.nav-menu a[href*=' + sectionId + ']').classList.remove('active-link')
        }
    })
}

window.addEventListener('scroll', scrollActive)

function scrollHeader() {
    const scrollY = window.scrollY
    if (scrollY > 400) {
        header.classList.add('scrolled')
    } else {
        header.classList.remove('scrolled')
    }
}

window.addEventListener('scroll', scrollHeader);


function backToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    })
}

const themeButton = document.getElementById('theme-button')
const darkTheme = 'dark-theme'
const iconTheme = 'uil-sun'

// Previously selected topic (if user selected)
const selectedTheme = localStorage.getItem('selected-theme')
const selectedIcon = localStorage.getItem('selected-icon')

// We obtain the current theme that the interface has by validating the dark-theme class
const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'bx-moon' : 'bx-sun'

// We validate if the user previously chose a topic
if (selectedTheme) {
    // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the dark
    document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)
    themeButton.classList[selectedIcon === 'bx-moon' ? 'add' : 'remove'](iconTheme)
}

// Activate / deactivate the theme manually with the button
themeButton.addEventListener('click', () => {
    // Add or remove the dark / icon theme
    document.body.classList.toggle(darkTheme)
    themeButton.classList.toggle(iconTheme)
    // We save the theme and the current icon that the user chose
    localStorage.setItem('selected-theme', getCurrentTheme())
    localStorage.setItem('selected-icon', getCurrentIcon())
})

const skillsContent = document.getElementsByClassName('skills_content'),
    skillsHeader = document.querySelectorAll('.skills_header')

function toggleSkills() {
    let itemClass = this.parentNode.className

    for (i = 0; i < skillsContent.length; i++) {
        skillsContent[i].className = 'skills_content skills_close'
    }
    if (itemClass === 'skills_content skills_close') {
        this.parentNode.className = 'skills_content skills_open'
    }
}

skillsHeader.forEach((el) => {
    el.addEventListener('click', toggleSkills)
})

function scrollUp() {
    const scrollUp = document.getElementById('scrollup');
    if (this.scrollY >= 560) scrollUp.classList.add('show-scroll'); else scrollUp.classList.remove('show-scroll')
}

window.addEventListener('scroll', scrollUp)

const porfolioContent = document.getElementsByClassName('portfolio_item'),
    porfolioHeader = document.querySelectorAll('.portfolio_button')

porfolioHeader.forEach((el) => {
    el.addEventListener('click', () => {
        const Selectedfilter = el.dataset.filter
        const Contentsize = porfolioContent.length;

        for (let i = 0; i < Contentsize; i++) {
            porfolioContent[i].classList.remove('portfolio_show')
            if (porfolioContent[i].dataset.category == Selectedfilter || Selectedfilter == 'all') {
                porfolioContent[i].classList.add('portfolio_show')
            }

        }
    })
})

