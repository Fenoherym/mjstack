import './bootstrap';
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.body.classList.add('dark')
} else {
    document.body.classList.remove('dark')
}
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll("pre").forEach(pre => {
        if (!pre.querySelector("code")) { 
            const code = document.createElement("code");
            code.innerHTML = pre.innerHTML.trim(); 
            code.classList.add("language-php"); // Ajoute la classe pour Prism.js ou Highlight.js
            pre.innerHTML = "";
            pre.appendChild(code);
        }
    });

    // Réactive la coloration selon la bibliothèque utilisée
    if (window.Prism) {
        Prism.highlightAll();
    }   
    
});

// Check if theme exists in localStorage or use system preference
const theme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
if (theme === 'dark') {
    document.documentElement.classList.add('dark');
}


const themeToggleBtn = document.getElementById('theme-toggle');
const html = document.documentElement;

function updateTheme(isDark) {
    if (isDark) {
        html.classList.add('dark');
        localStorage.theme = 'dark';
    } else {
        html.classList.remove('dark');
        localStorage.theme = 'light';
    }
}

themeToggleBtn.addEventListener('click', () => {
    const isDark = html.classList.contains('dark');
    updateTheme(!isDark);
});


 // Fonction pour gérer le changement de thème
 function handleThemeToggle() {
    const body = document.body;
    const isDark = body.classList.contains('dark');
    
    body.classList.toggle('dark');
    localStorage.setItem('theme', isDark ? 'light' : 'dark');
}

// Initialisation du thème
if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.body.classList.add('dark');
}

// Écouteur d'événement
document.getElementById('theme-toggle').addEventListener('click', handleThemeToggle);

//BAck to top button
document.addEventListener('DOMContentLoaded', function() {
    const backToTopButton = document.getElementById('backToTop');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTopButton.classList.remove('opacity-0', 'invisible');
            backToTopButton.classList.add('opacity-100');
        } else {
            backToTopButton.classList.add('opacity-0', 'invisible');
            backToTopButton.classList.remove('opacity-100');
        }
    });

    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

