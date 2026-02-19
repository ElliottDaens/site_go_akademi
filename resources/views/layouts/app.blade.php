<!DOCTYPE html>
<html lang="fr" class="scroll-smooth" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Thème avant tout rendu (localStorage puis préférence système) --}}
    <script>
        (function(){
            var key = 'go-akademi-theme';
            var stored = localStorage.getItem(key);
            var theme = (stored === 'dark' || stored === 'light') ? stored : (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>
    <meta name="description" content="Go Akademi - L'Académie Calaisienne de Jiu Jitsu Brésilien, Kosen Judo et Luta Livre">
    <title>@yield('title', 'Go Akademi') - Jiu Jitsu Brésilien Calais</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="min-h-screen overflow-x-hidden antialiased font-sans transition-colors duration-300" style="background-color: var(--color-bg); color: var(--color-text);">
    <a href="#main-content" class="skip-link">Aller au contenu</a>

    {{-- Navbar pro : transparent → opaque au scroll, hamburger mobile --}}
    <header id="site-header" class="site-header relative sticky top-0 z-50 w-full border-b-2 shadow-[0_4px_0_0_#b91c1c] transition-all duration-300 ease-out" style="background-color: var(--color-header-bg); border-color: var(--color-header-border); color: var(--color-header-text);">
        <nav class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-3 sm:px-6 lg:px-8" role="navigation" aria-label="Menu principal">
            <a href="{{ route('accueil') }}" class="flex shrink-0 items-center gap-2 rounded-lg outline-none ring-2 ring-transparent transition focus-visible:ring-red-600">
                <img src="{{ asset('images/Logo carré.png') }}" alt="" class="logo-light h-10 w-10 object-contain sm:h-12 sm:w-12">
                <img src="{{ asset('images/Logo carré blanc.png') }}" alt="" class="logo-dark hidden h-10 w-10 object-contain sm:h-12 sm:w-12">
                <span class="header-logo-text font-display text-lg tracking-widest sm:text-2xl" style="color: var(--color-header-text);">GO<span class="text-red-600">AKADEMI</span></span>
            </a>

            {{-- Hamburger mobile (visible < md) --}}
            <button type="button" id="menu-toggle" class="menu-toggle inline-flex h-10 w-10 items-center justify-center rounded-lg border-2 border-current transition hover:opacity-80 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-600 md:hidden" aria-expanded="false" aria-controls="mobile-menu" aria-label="Ouvrir le menu">
                <span class="sr-only">Menu</span>
                <svg class="h-6 w-6 menu-icon-open" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg class="menu-icon-close hidden h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            {{-- Menu desktop (visible md+) / panneau mobile (ouvert via data-open) --}}
            <div id="mobile-menu" class="mobile-menu hidden flex-col gap-4 data-[open=true]:flex md:flex md:flex-row md:items-center md:gap-1 md:!border-0 md:!py-0 absolute left-0 right-0 top-full z-50 max-h-[calc(100vh-4rem)] overflow-y-auto border-b-2 px-4 pb-4 pt-2 md:relative md:max-h-none md:px-0 md:pb-0" data-open="false" role="navigation" style="background-color: var(--color-header-bg); border-color: var(--color-header-border);">
                <ul class="menu-inline flex flex-col gap-1 py-4 text-xs font-semibold uppercase tracking-wider sm:text-sm md:flex-row md:items-center md:gap-1 md:py-0" aria-label="Navigation principale">
                    <li><a href="{{ route('accueil') }}" class="menu-tile block rounded-lg px-4 py-3 transition md:rounded md:px-3 md:py-2 {{ request()->routeIs('accueil') ? 'bg-neutral-800 text-white md:bg-black' : '' }}">Accueil</a></li>
                    <li><a href="{{ route('presentation') }}" class="menu-tile block rounded-lg px-4 py-3 transition md:rounded md:px-3 md:py-2 {{ request()->routeIs('presentation') ? 'bg-neutral-800 text-white md:bg-black' : '' }}">L'Académie</a></li>
                    <li><a href="{{ route('entrainements') }}" class="menu-tile block rounded-lg px-4 py-3 transition md:rounded md:px-3 md:py-2 {{ request()->routeIs('entrainements') ? 'bg-neutral-800 text-white md:bg-black' : '' }}">Entraînements</a></li>
                    <li><a href="{{ route('rejoindre') }}" class="menu-tile block rounded-lg px-4 py-3 transition md:rounded md:px-3 md:py-2 {{ request()->routeIs('rejoindre') ? 'bg-neutral-800 text-white md:bg-black' : '' }}">Nous rejoindre</a></li>
                    <li><a href="{{ route('actualites') }}" class="menu-tile block rounded-lg px-4 py-3 transition md:rounded md:px-3 md:py-2 {{ request()->routeIs('actualites') ? 'bg-neutral-800 text-white md:bg-black' : '' }}">Actualités</a></li>
                    <li><a href="{{ route('contact') }}" class="menu-tile block rounded-lg px-4 py-3 transition md:rounded md:px-3 md:py-2 {{ request()->routeIs('contact') ? 'bg-neutral-800 text-white md:bg-black' : '' }}">Contact</a></li>
                </ul>
                <div class="flex items-center border-t border-neutral-600 pt-4 md:border-t-0 md:pt-0">
                    <button type="button" id="theme-toggle" class="theme-toggle inline-flex h-9 w-9 items-center justify-center rounded-lg border-2 border-current transition hover:opacity-80 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-600" aria-label="Basculer le thème clair/sombre">
                        <span class="theme-icon-sun" aria-hidden="true"><svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg></span>
                        <span class="theme-icon-moon hidden" aria-hidden="true"><svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg></span>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <main id="main-content" tabindex="-1">
        @yield('content')
    </main>

    {{-- Footer pro : socials + infos + copyright --}}
    <footer class="site-footer mt-24 border-t-2 border-black bg-black py-12 text-white transition-colors duration-300 sm:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center justify-between gap-8 md:flex-row md:gap-12">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/Logo carré blanc.png') }}" alt="" class="h-12 w-12 object-contain sm:h-16 sm:w-16" loading="lazy" width="64" height="64">
                    <span class="font-display text-xl tracking-widest sm:text-2xl">GO<span class="text-red-500">AKADEMI</span></span>
                </div>
                <div class="flex flex-wrap justify-center gap-6 text-sm sm:gap-8">
                    <span class="text-neutral-300">62100 Calais</span>
                    <a href="tel:0627542416" class="transition hover:text-red-400 focus:outline-none focus-visible:underline">06 27 54 24 16</a>
                    <a href="mailto:Acjb62100@gmail.com" class="transition hover:text-red-400 focus:outline-none focus-visible:underline">Acjb62100@gmail.com</a>
                </div>
            </div>
            <p class="mt-8 text-center text-xs text-neutral-400 sm:mt-10">
                © {{ date('Y') }} GO AKADEMI — Tous droits réservés · Mentions légales
                <a href="{{ route('admin.login') }}" class="ml-3 opacity-60 transition hover:opacity-100 focus:outline-none focus-visible:underline">Admin</a>
            </p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
