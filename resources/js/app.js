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

//Home Chart
document.addEventListener('DOMContentLoaded', function () {
    const chartConfigs = [
        {
            elementId: 'chart1',
            label: 'Barang Masuk',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            data: [12, 19, 3, 5, 2, 3, 7],
            type: 'bar'
        },
        {
            elementId: 'chart2',
            label: 'Barang Keluar',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            data: [8, 11, 5, 8, 3, 7, 4],
            type: 'bar'
        },
        {
            elementId: 'chart3',
            label: 'Stock Value Over Time',
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgba(153, 102, 255, 1)',
            data: [5, 10, 15, 20, 25, 30, 35],
            type: 'line'
        },
        {
            elementId: 'chart4',
            label: 'Monthly Sales',
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            data: [30, 25, 20, 15, 10, 5, 0],
            type: 'line'
        },
        {
            elementId: 'chart5',
            label: 'Product Distribution',
            backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(153, 102, 255, 0.2)'],
            borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(153, 102, 255, 1)'],
            data: [300, 500, 100],
            type: 'pie'
        },
        {
            elementId: 'chart6',
            label: 'Unit Performance',
            backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)'],
            borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)'],
            data: [50, 25, 25],
            type: 'doughnut'
        }
    ];

    chartConfigs.forEach(config => {
        const ctx = document.getElementById(config.elementId).getContext('2d');
        new Chart(ctx, {
            type: config.type,
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: config.label,
                    backgroundColor: config.backgroundColor,
                    borderColor: config.borderColor,
                    data: config.data,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
});

window.Alpine = Alpine;

Alpine.start();