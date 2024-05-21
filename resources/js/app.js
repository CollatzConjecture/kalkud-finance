import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('loginButton').addEventListener('click', async function(e) {
        e.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        await login(email, password);
    });
});

// Script for Collapse Sidebar
document.addEventListener("DOMContentLoaded", function() {
    var sidebarCollapseDefault = document.getElementById("sidebarCollapseDefault");
    if (sidebarCollapseDefault) {
        sidebarCollapseDefault.addEventListener("click", sidebarCollapse);
    }
});

function sidebarCollapse() {
    document.getElementById("nav-sidebar").classList.toggle("active");
    document.getElementById("main-content").classList.toggle("active");
}

// Script for Navbar
var dropdown = document.querySelector(".dropdown");
dropdown?.addEventListener("click", toggleDropdownMenu);

function toggleDropdownMenu() {
    const dropdownMenu = document.querySelector(".dropdown-menu");
    dropdownMenu.classList.toggle("hidden");
}

// Script for Modal
var openmodals = document.querySelectorAll(".modal-open");
openmodals.forEach((openmodal) => {
    openmodal?.addEventListener("click", () => {
        toggleModal(openmodal.id, "open");
    });
})

const overlays = document.querySelectorAll(".modal-overlay");
overlays.forEach((overlay) => {
    overlay?.addEventListener("click", () => {
        toggleModal(overlay.id, "overlay");
    });
})

var closemodals = document.querySelectorAll("[class^=modal-close");
closemodals.forEach((closemodal) => {
    closemodal?.addEventListener("click", () => {
        toggleModal(closemodal.id, "close");
    });
})

function toggleModal(itemId, itemName) {
    event.preventDefault();
    var modalId = itemId.split('-' + itemName)[0];
    const modal = document.getElementById(modalId);
    modal.classList.toggle("opacity-0");
    modal.classList.toggle("pointer-events-none");
}

window.Alpine = Alpine;

Alpine.start();