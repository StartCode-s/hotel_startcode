//Sidebar
let sidebar = document.querySelector('.sidebar-container')
let menubutton = document.querySelector('.sidebar-button')
let mainClose = document.querySelector(".close-button")

menubutton.addEventListener('click', function(e) {
sidebar.classList.toggle('sidebar-active')
});

mainClose.addEventListener('click', function(e) {
    sidebar.classList.remove('sidebar-active')
});