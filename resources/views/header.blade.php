<header id="main-header" class="header-glass sticky top-0 z-50 border-b border-slate-200/80 bg-white/80 backdrop-blur-md transition-colors duration-300 dark:border-slate-700/80 dark:bg-slate-900/80">
    <nav class="mx-auto flex max-w-5xl items-center justify-between px-4 py-3.5 sm:px-6 lg:px-8" aria-label="Navigation principale">
        <a href="{{ route('home') }}" class="text-lg font-bold tracking-tight text-slate-900 dark:text-slate-100">Daens Elliott</a>

        {{-- Desktop nav --}}
        <div class="flex items-center gap-2">
            <ul class="hidden items-center gap-0.5 md:flex">
                <li><a href="{{ route('home') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-slate-100 {{ request()->routeIs('home') ? 'nav-active bg-slate-100 text-slate-900 dark:bg-slate-800 dark:text-slate-100' : '' }}">Accueil</a></li>
                <li><a href="{{ route('about') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-slate-100 {{ request()->routeIs('about') ? 'nav-active bg-slate-100 text-slate-900 dark:bg-slate-800 dark:text-slate-100' : '' }}">À propos</a></li>
                <li><a href="{{ route('cv') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-slate-100 {{ request()->routeIs('cv') ? 'nav-active bg-slate-100 text-slate-900 dark:bg-slate-800 dark:text-slate-100' : '' }}">CV</a></li>
                <li><a href="{{ route('projets') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-slate-100 {{ request()->routeIs('projets') ? 'nav-active bg-slate-100 text-slate-900 dark:bg-slate-800 dark:text-slate-100' : '' }}">Projets</a></li>
                <li><a href="{{ route('contact') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-slate-100 {{ request()->routeIs('contact') ? 'nav-active bg-slate-100 text-slate-900 dark:bg-slate-800 dark:text-slate-100' : '' }}">Contact</a></li>
            </ul>

            <button type="button" onclick="toggleTheme()" class="theme-btn rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm font-medium text-slate-700 shadow-sm transition hover:bg-slate-100 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-700" aria-label="Changer de thème">
                <span id="theme-label">Mode sombre</span>
            </button>

            {{-- Hamburger mobile --}}
            <button type="button" id="menu-toggle" class="mobile-menu-btn inline-flex items-center justify-center rounded-lg p-2 text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 md:hidden dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-slate-100" aria-expanded="false" aria-controls="mobile-menu" aria-label="Ouvrir le menu">
                <svg class="h-6 w-6 menu-open" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg class="h-6 w-6 menu-close hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </nav>

    {{-- Mobile menu panel --}}
    <div id="mobile-menu" class="mobile-panel hidden border-t border-slate-200/80 bg-white/95 backdrop-blur-lg dark:border-slate-700/80 dark:bg-slate-900/95 md:hidden" aria-hidden="true">
        <div class="mx-auto max-w-5xl px-4 py-4 sm:px-6">
            <ul class="flex flex-col gap-1">
                <li><a href="{{ route('home') }}" class="block rounded-lg px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800 {{ request()->routeIs('home') ? 'bg-slate-100 dark:bg-slate-800' : '' }}">Accueil</a></li>
                <li><a href="{{ route('about') }}" class="block rounded-lg px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800 {{ request()->routeIs('about') ? 'bg-slate-100 dark:bg-slate-800' : '' }}">À propos</a></li>
                <li><a href="{{ route('cv') }}" class="block rounded-lg px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800 {{ request()->routeIs('cv') ? 'bg-slate-100 dark:bg-slate-800' : '' }}">CV</a></li>
                <li><a href="{{ route('projets') }}" class="block rounded-lg px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800 {{ request()->routeIs('projets') ? 'bg-slate-100 dark:bg-slate-800' : '' }}">Projets</a></li>
                <li><a href="{{ route('contact') }}" class="block rounded-lg px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800 {{ request()->routeIs('contact') ? 'bg-slate-100 dark:bg-slate-800' : '' }}">Contact</a></li>
            </ul>
        </div>
    </div>
</header>
<script>
(function(){
    var header = document.getElementById('main-header');
    var toggle = document.getElementById('menu-toggle');
    var panel = document.getElementById('mobile-menu');
    var openIcon = header && header.querySelector('.menu-open');
    var closeIcon = header && header.querySelector('.menu-close');

    function updateHeaderScroll() {
        if (!header) return;
        if (window.scrollY > 16) {
            header.classList.add('header-scrolled');
        } else {
            header.classList.remove('header-scrolled');
        }
    }
    window.addEventListener('scroll', function(){ updateHeaderScroll(); }, { passive: true });
    updateHeaderScroll();

    if (toggle && panel) {
        toggle.addEventListener('click', function(){
            var open = panel.classList.toggle('hidden');
            toggle.setAttribute('aria-expanded', open ? 'false' : 'true');
            panel.setAttribute('aria-hidden', open ? 'true' : 'false');
            if (openIcon) openIcon.classList.toggle('hidden', !open);
            if (closeIcon) closeIcon.classList.toggle('hidden', open);
        });
        panel.querySelectorAll('a').forEach(function(a){
            a.addEventListener('click', function(){ panel.classList.add('hidden'); toggle.setAttribute('aria-expanded', 'false'); panel.setAttribute('aria-hidden', 'true'); if (openIcon) openIcon.classList.remove('hidden'); if (closeIcon) closeIcon.classList.add('hidden'); });
        });
    }
})();
</script>
