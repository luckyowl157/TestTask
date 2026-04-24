(function() {
    'use strict';

    // Mobile menu toggle
    const menuToggle = document.querySelector('.button-menu');
    const navigation = document.querySelector('#site-navigation');
    const menuOverlay = document.querySelector('.mobile-menu-overlay');
    const menuClose = document.querySelector('.mobile-menu-close');
    const body = document.body;

    if (menuToggle && navigation) {
        menuToggle.addEventListener('click', function() {
            const expanded = menuToggle.getAttribute('aria-expanded') === 'true' || false;
            menuToggle.setAttribute('aria-expanded', !expanded);
            navigation.classList.toggle('toggled');
            body.style.overflow = !expanded ? 'hidden' : '';
        });
        if (menuOverlay) {
            menuOverlay.addEventListener('click', function() {
                navigation.classList.remove('toggled');
                menuToggle.setAttribute('aria-expanded', 'false');
                body.style.overflow = '';
            });
        }
        if (menuClose) {
            menuClose.addEventListener('click', function() {
                navigation.classList.remove('toggled');
                menuToggle.setAttribute('aria-expanded', 'false');
                body.style.overflow = '';
            });
        }

        const mobileMenuLinks = document.querySelectorAll('.mobile-menu-panel #primary-menu a');
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', function() {
                navigation.classList.remove('toggled');
                menuToggle.setAttribute('aria-expanded', 'false');
                body.style.overflow = '';
            });
        });
    }

    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href !== '#' && href !== '#0') {
                const target = document.querySelector(href);
                
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    const header = document.querySelector('#masthead');
    
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

})();
