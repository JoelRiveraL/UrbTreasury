const menuResponsiveElement =  document.getElementById('responsiveMenu');
const mainMenuElement = document.getElementById('mainMenu');

menuResponsiveElement.addEventListener('click', () => {
    mainMenuElement.classList.toggle('mainMenu--Show');
});