const linksInternos = document.querySelectorAll('.js-menu a[href^="#"]');

function scrollToSection(event){
    event.preventDefault();
    const href = event.currentTarget.getAttribute('href');
    const section = document.querySelector(href);

    section.scrollIntoView({
        behavior: 'smooth',
        block: 'start',
    })
}

linksInternos.forEach((link) => {
    link.addEventListener('click', scrollToSection);
});

const setaDown = document.querySelector('#seta-down')

function dropdown(e){
    const dropDownMenu = document.querySelector('#dropdown');
    dropDownMenu.classList.toggle('active');
}

setaDown.addEventListener('click', dropdown);