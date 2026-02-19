import './bootstrap';

/**
 * Mode sombre — Cause possible du bug : le script peut s'exécuter avant que
 * le DOM soit prêt (race condition avec Vite/defer). On enveloppe dans
 * DOMContentLoaded pour garantir que #theme-toggle existe.
 */
function initTheme() {
    const STORAGE_KEY = 'go-akademi-theme';
    const html = document.documentElement;

    function getPreferred() {
        const stored = localStorage.getItem(STORAGE_KEY);
        if (stored === 'dark' || stored === 'light') return stored;
        if (window.matchMedia('(prefers-color-scheme: dark)').matches) return 'dark';
        return 'light';
    }

    function setTheme(theme) {
        const value = theme === 'dark' ? 'dark' : 'light';
        html.setAttribute('data-theme', value);
        localStorage.setItem(STORAGE_KEY, value);
    }

    // Appliquer tout de suite (synchronise avec le script inline du layout)
    setTheme(getPreferred());

    const btn = document.getElementById('theme-toggle');
    if (btn) {
        btn.addEventListener('click', () => {
            const next = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            setTheme(next);
            btn.setAttribute('aria-label', next === 'dark' ? 'Passer en mode clair' : 'Passer en mode sombre');
        });
        btn.setAttribute('aria-label', html.getAttribute('data-theme') === 'dark' ? 'Passer en mode clair' : 'Passer en mode sombre');
    }

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
        if (localStorage.getItem(STORAGE_KEY)) return;
        setTheme(e.matches ? 'dark' : 'light');
    });
}

// Attendre que le DOM soit prêt pour le mode sombre
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initTheme);
} else {
    initTheme();
}

/**
 * Animations au scroll (désactivées si prefers-reduced-motion)
 * + Header ombre au scroll
 */
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (!prefersReducedMotion) {
    const revealElements = document.querySelectorAll('.animate-on-scroll');
    if (revealElements.length) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) entry.target.classList.add('animate-visible');
                });
            },
            { threshold: 0.1, rootMargin: '0px 0px -40px 0px' }
        );
        revealElements.forEach((el) => observer.observe(el));
        /* Révéler d’abord les éléments déjà en viewport, puis activer .js-ready pour le reste */
        requestAnimationFrame(() => {
            requestAnimationFrame(() => document.body.classList.add('js-ready'));
        });
    } else {
        document.body.classList.add('js-ready');
    }
} else {
    document.body.classList.add('js-ready');
}

const header = document.querySelector('header');
if (header) {
    const onScroll = () => {
        header.classList.toggle('scrolled', window.scrollY > 20);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
}

/**
 * Bouton retour en haut — Toujours actif (indépendant de prefers-reduced-motion).
 * Cause du bug : le bouton était créé uniquement dans le bloc réduit par
 * prefersReducedMotion, donc jamais rendu si l'utilisateur avait activé cette option.
 */
function initBackToTop() {
    let btn = document.getElementById('back-to-top');
    if (!btn) {
        btn = document.createElement('button');
        btn.id = 'back-to-top';
        btn.type = 'button';
        btn.setAttribute('aria-label', 'Retour en haut de la page');
        btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>';
        document.body.appendChild(btn);
    }

    const toggle = () => btn.classList.toggle('visible', window.scrollY > 400);
    window.addEventListener('scroll', toggle, { passive: true });
    toggle();

    btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
}

/**
 * Menu mobile : toggle hamburger / panneau
 */
function initMobileMenu() {
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('mobile-menu');
    const openIcon = document.querySelector('.menu-icon-open');
    const closeIcon = document.querySelector('.menu-icon-close');
    if (!toggle || !menu) return;

    function open() {
        menu.setAttribute('data-open', 'true');
        toggle.setAttribute('aria-expanded', 'true');
        toggle.setAttribute('aria-label', 'Fermer le menu');
        if (openIcon) openIcon.classList.add('hidden');
        if (closeIcon) closeIcon.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    function close() {
        menu.setAttribute('data-open', 'false');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Ouvrir le menu');
        if (openIcon) openIcon.classList.remove('hidden');
        if (closeIcon) closeIcon.classList.add('hidden');
        document.body.style.overflow = '';
    }

    toggle.addEventListener('click', () => {
        const isOpen = menu.getAttribute('data-open') === 'true';
        if (isOpen) close();
        else open();
    });
    menu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => close());
    });
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) close();
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        initBackToTop();
        initMobileMenu();
    });
} else {
    initBackToTop();
    initMobileMenu();
}
