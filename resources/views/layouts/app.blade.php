<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio de Daens Elliott - Web & Communication">
    <title>@yield('title', 'Portfolio') - Daens Elliott</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- 1. Thème : appliquer dark AVANT tout rendu --}}
    <script>
        (function(){
            try {
                if (localStorage.getItem('theme') === 'dark') {
                    document.documentElement.classList.add('dark');
                }
            } catch(e) {}
        })();

        function toggleTheme() {
            var html = document.documentElement;
            var isDark = html.classList.contains('dark');
            html.classList.toggle('dark');
            try { localStorage.setItem('theme', isDark ? 'light' : 'dark'); } catch(e) {}
            var l = document.getElementById('theme-label');
            if (l) l.textContent = isDark ? 'Mode sombre' : 'Mode clair';
        }
    </script>

    {{-- 2. Dark mode complet en CSS pur --}}
    <style>
        body { font-family: 'Inter', sans-serif; }

        /* ============================================
           DARK MODE — Override TOUTES les couleurs
           Piloté par html.dark sur <html>
           ============================================ */

        /* --- Base --- */
        html.dark body { background: #0f172a !important; color: #e2e8f0 !important; }

        /* --- Override des fonds Tailwind --- */
        html.dark .bg-white { background-color: #1e293b !important; }
        html.dark .bg-slate-50 { background-color: #1e293b !important; }
        html.dark .bg-slate-100 { background-color: #334155 !important; }

        /* --- Override des couleurs de texte Tailwind --- */
        html.dark .text-slate-900 { color: #f1f5f9 !important; }
        html.dark .text-slate-800 { color: #e2e8f0 !important; }
        html.dark .text-slate-700 { color: #cbd5e1 !important; }
        html.dark .text-slate-600 { color: #cbd5e1 !important; }
        html.dark .text-slate-500 { color: #94a3b8 !important; }
        html.dark .text-slate-400 { color: #94a3b8 !important; }

        /* --- Override des bordures Tailwind --- */
        html.dark .border-slate-200 { border-color: #334155 !important; }
        html.dark .border-slate-300 { border-color: #475569 !important; }
        html.dark .divide-slate-200 > * + * { border-color: #334155 !important; }

        /* --- Override des ombres --- */
        html.dark .shadow-sm { box-shadow: 0 1px 3px 0 rgba(0,0,0,.4), 0 1px 2px -1px rgba(0,0,0,.4) !important; }

        /* --- Override placeholder --- */
        html.dark .placeholder-slate-400::placeholder { color: #64748b !important; }

        /* --- Header --- */
        .header-glass.header-scrolled { background: rgba(255,255,255,.97) !important; }
        html.dark .header-glass { background: rgba(15,23,42,.8) !important; border-color: #334155 !important; }
        html.dark .header-glass.header-scrolled { background: rgba(15,23,42,.98) !important; }
        html.dark header a { color: #e2e8f0 !important; }
        html.dark header a:hover { background: #1e293b !important; color: #fff !important; }
        html.dark header .nav-active { background: #1e293b !important; color: #fff !important; }

        /* --- Bouton toggle --- */
        html.dark .theme-btn { background: #1e293b !important; border-color: #475569 !important; color: #e2e8f0 !important; }
        html.dark .theme-btn:hover { background: #334155 !important; }

        /* --- Footer --- */
        html.dark footer { border-color: #334155 !important; }
        html.dark footer p { color: #94a3b8 !important; }
        html.dark footer a { color: #94a3b8 !important; }
        html.dark footer a:hover { color: #fff !important; }

        /* --- Sections alternées --- */
        html.dark .section-alt { background: #0f172a !important; border-color: #334155 !important; }

        /* --- Cartes --- */
        html.dark .card-item { background: #1e293b !important; border-color: #334155 !important; }
        html.dark .card-item h3 { color: #fff !important; }
        html.dark .card-item p { color: #cbd5e1 !important; }
        html.dark .card-item a { color: #e2e8f0 !important; }
        html.dark .card-item a:hover { color: #fff !important; }
        html.dark .card-img { background: #334155 !important; }

        /* --- Tags / badges --- */
        html.dark .tag-item { background: #334155 !important; border-color: #475569 !important; color: #e2e8f0 !important; }

        /* --- Titres --- */
        html.dark h1, html.dark h2, html.dark h3, html.dark h4 { color: #f1f5f9 !important; }
        html.dark .subtitle { color: #64748b !important; }

        /* --- Textes --- */
        html.dark .text-body { color: #cbd5e1 !important; }
        html.dark .text-muted { color: #94a3b8 !important; }
        html.dark strong { color: #f1f5f9 !important; }

        /* --- Formulaire --- */
        html.dark .form-card { background: #1e293b !important; border-color: #334155 !important; }
        html.dark input, html.dark textarea, html.dark select {
            background: #0f172a !important; border-color: #475569 !important; color: #f1f5f9 !important;
        }
        html.dark input::placeholder, html.dark textarea::placeholder { color: #64748b !important; }
        html.dark input:focus, html.dark textarea:focus { border-color: #64748b !important; box-shadow: 0 0 0 1px #64748b !important; }
        html.dark label { color: #e2e8f0 !important; }

        /* --- Boutons --- */
        html.dark .btn-main { background: #f1f5f9 !important; color: #0f172a !important; }
        html.dark .btn-main:hover { background: #e2e8f0 !important; }
        html.dark .btn-outline { border-color: #475569 !important; color: #e2e8f0 !important; background: transparent !important; }
        html.dark .btn-outline:hover { background: #1e293b !important; }

        /* --- Séparateurs --- */
        html.dark .divider { border-color: #334155 !important; }
        html.dark hr { border-color: #334155 !important; }
        html.dark .border-line { background: #334155 !important; }

        /* --- Timeline --- */
        html.dark .timeline-line { background: #334155 !important; }
        html.dark .timeline-dot { background: #f1f5f9 !important; border-color: #0f172a !important; }
        html.dark .timeline-card { background: #1e293b !important; border-color: #334155 !important; }
        html.dark .timeline-card p { color: #cbd5e1 !important; }

        /* --- Stats --- */
        html.dark .stat-item { color: #e2e8f0 !important; }
        html.dark .stat-value { color: #fff !important; }
        html.dark .stat-label { color: #94a3b8 !important; }

        /* --- Progress bars --- */
        html.dark .progress-bg { background: #334155 !important; }
        html.dark .progress-bar { background: #f1f5f9 !important; }

        /* --- Sidebar cards (CV) --- */
        html.dark .sidebar-card { background: #1e293b !important; border-color: #334155 !important; }
        html.dark .sidebar-card h3 { color: #94a3b8 !important; }
        html.dark .sidebar-card span { color: #e2e8f0 !important; }
        html.dark .sidebar-card li { color: #e2e8f0 !important; }

        /* --- Liens admin --- */
        html.dark .admin-link { color: #64748b !important; }
        html.dark .admin-link:hover { color: #94a3b8 !important; }

        /* --- Alertes --- */
        html.dark .alert-success { background: #064e3b !important; border-color: #065f46 !important; color: #6ee7b7 !important; }
        html.dark .alert-error { background: #450a0a !important; border-color: #7f1d1d !important; color: #fca5a5 !important; }

        /* --- Composants Tailwind (.card, .btn, etc. définis dans site-theme.css) --- */
        html.dark .card { background: #1e293b !important; border-color: #334155 !important; color: #e2e8f0 !important; }
        html.dark .btn-primary { background: #f1f5f9 !important; color: #0f172a !important; }
        html.dark .btn-primary:hover { background: #e2e8f0 !important; }
        html.dark .btn-secondary { background: #1e293b !important; border-color: #475569 !important; color: #e2e8f0 !important; }
        html.dark .btn-secondary:hover { background: #334155 !important; }
        html.dark .btn-danger { background: #1e293b !important; border-color: #991b1b !important; color: #fca5a5 !important; }
        html.dark .btn-danger:hover { background: #334155 !important; }
        html.dark .badge-success { background: #064e3b !important; color: #6ee7b7 !important; }
        html.dark .badge-muted { background: #334155 !important; color: #94a3b8 !important; }
        html.dark .page-title { color: #f1f5f9 !important; }

        /* --- Liens globaux --- */
        html.dark a.underline { color: #e2e8f0 !important; }
        html.dark a.underline:hover { color: #fff !important; }
        html.dark .detail-link { color: #60a5fa !important; }
    </style>

    @vite(['resources/css/site-theme.css', 'resources/js/site-ui.js'])
    @stack('styles')
</head>
<body class="min-h-screen bg-white text-slate-800 antialiased">

    @include('header')

    <main>
        @yield('content')
    </main>

    @include('footer')
</body>
</html>
