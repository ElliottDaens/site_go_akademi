<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Portfolio Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        (function(){ try { if (localStorage.getItem('theme') === 'dark') document.documentElement.classList.add('dark'); } catch(e){} })();
        function toggleTheme() {
            var html = document.documentElement;
            html.classList.toggle('dark');
            try { localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light'); } catch(e) {}
            var l = document.getElementById('theme-label');
            if (l) l.textContent = html.classList.contains('dark') ? 'Mode clair' : 'Mode sombre';
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .admin-table { width: 100%; border-collapse: collapse; font-size: 0.875rem; }
        .admin-table th { text-align: left; padding: 0.75rem 1.25rem; font-weight: 600; font-size: 0.6875rem; text-transform: uppercase; letter-spacing: 0.08em; color: #64748b; border-bottom: 1px solid #e2e8f0; background: #f8fafc; }
        .admin-table td { padding: 0.875rem 1.25rem; border-bottom: 1px solid #f1f5f9; color: #334155; }
        .admin-table tbody tr { transition: background .15s ease; }
        .admin-table tbody tr:hover td { background: #f8fafc; }
        .admin-table .actions { white-space: nowrap; }
        .form-group { margin-bottom: 1.25rem; }
        .form-group label { display: block; margin-bottom: 0.375rem; font-size: 0.875rem; font-weight: 500; color: #374151; }
        .form-group input, .form-group textarea, .form-group select { width: 100%; padding: 0.625rem 0.875rem; border: 1px solid #e2e8f0; border-radius: 0.75rem; font-size: 0.875rem; color: #0f172a; background: #fff; transition: border-color .2s, box-shadow .2s; }
        .form-group input:focus, .form-group textarea:focus, .form-group select:focus { outline: none; border-color: #64748b; box-shadow: 0 0 0 3px rgba(100,116,139,.12); }
        .form-group textarea { min-height: 100px; resize: vertical; }
        .form-group input[type="checkbox"] { width: auto; margin-right: 0.5rem; }
        .detail-row { padding: 0.5rem 0; font-size: 0.875rem; color: #334155; }
        .detail-row strong { color: #0f172a; }
        .detail-link { color: #2563eb; text-decoration: none; }
        .detail-link:hover { text-decoration: underline; }
        .error-text { color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem; }
        .admin-card { border-radius: 0.75rem; border: 1px solid #e2e8f0; background: #fff; box-shadow: 0 1px 3px 0 rgba(0,0,0,.06); }
        .admin-page-title { font-size: 1.5rem; font-weight: 700; color: #0f172a; margin-bottom: 0; }
        /* Dark — tout en sombre, zéro carré blanc */
        html.dark body,
        html.dark .admin-body { background: #0f172a !important; color: #e2e8f0 !important; }
        html.dark .admin-sidebar { background: #0f172a; border-color: #334155; }
        html.dark .admin-sidebar a { color: #94a3b8; }
        html.dark .admin-sidebar a:hover { background: #1e293b; color: #fff; }
        html.dark .admin-sidebar .admin-nav-active { background: #1e293b; color: #fff; }
        html.dark .admin-main { background: #0f172a; }
        html.dark .admin-table th { color: #94a3b8; border-color: #334155; background: #0f172a; }
        html.dark .admin-table td { color: #e2e8f0; border-color: #1e293b; }
        html.dark .admin-table tbody tr:hover td { background: #1e293b; }
        html.dark .form-group label { color: #e2e8f0; }
        html.dark .form-group input, html.dark .form-group textarea, html.dark .form-group select { background: #0f172a; border-color: #475569; color: #f1f5f9; }
        html.dark .form-group input:focus, html.dark .form-group textarea:focus { border-color: #64748b; box-shadow: 0 0 0 3px rgba(100,116,139,.2); }
        html.dark .detail-row { color: #cbd5e1; }
        html.dark .detail-row strong { color: #f1f5f9; }
        html.dark .detail-link { color: #60a5fa; }
        html.dark .error-text { color: #f87171; }
        html.dark .admin-card { background: #1e293b; border-color: #334155; }
        html.dark .admin-card h2, html.dark .admin-card h3 { color: #f1f5f9; }
        html.dark .admin-card p { color: #cbd5e1; }
        html.dark .admin-page-title { color: #f1f5f9; }
        html.dark .theme-btn { background: #1e293b; border-color: #475569; color: #e2e8f0; }
        html.dark .theme-btn:hover { background: #334155; }
        html.dark .alert-success { background: #064e3b; border-color: #065f46; color: #6ee7b7; }
        html.dark .alert-error { background: #450a0a; border-color: #7f1d1d; color: #fca5a5; }
        html.dark .btn-primary { background: #f1f5f9; color: #0f172a; }
        html.dark .btn-primary:hover { background: #e2e8f0; }
        html.dark .btn-secondary { background: #1e293b; border-color: #475569; color: #e2e8f0; }
        html.dark .btn-secondary:hover { background: #334155; }
        html.dark .btn-danger { background: #1e293b; border-color: #991b1b; color: #fca5a5; }
        html.dark .btn-danger:hover { background: #334155; }
        html.dark .badge-success { background: #064e3b; color: #6ee7b7; }
        html.dark .badge-muted { background: #334155; color: #94a3b8; }
        /* Force fonds sombres (éviter carrés blancs) */
        html.dark .admin-sidebar { background: #0f172a !important; }
        html.dark .admin-main > header { background: rgba(15,23,42,.98) !important; border-color: #334155 !important; }
        html.dark .admin-main > footer { background: #0f172a !important; border-color: #334155 !important; }
        html.dark .admin-main main { background: #0f172a !important; }
        html.dark .admin-card { background: #1e293b !important; border-color: #334155 !important; }
        html.dark .admin-table th { background: #1e293b !important; }
        html.dark .admin-table td { background: #1e293b !important; }
        html.dark .admin-table tbody tr:hover td { background: #334155 !important; }
        html.dark input, html.dark textarea, html.dark select { background: #0f172a !important; border-color: #475569 !important; color: #f1f5f9 !important; }
        html.dark .theme-btn { background: #1e293b !important; border-color: #475569 !important; color: #e2e8f0 !important; }
        html.dark .btn-secondary { background: #1e293b !important; border-color: #475569 !important; color: #e2e8f0 !important; }
        @media (max-width: 767px) {
            .admin-sidebar { transform: translateX(-100%); transition: transform .2s ease; }
            .admin-sidebar.open { transform: translateX(0); }
            .admin-overlay { opacity: 0; pointer-events: none; transition: opacity .2s; }
            .admin-overlay.open { opacity: 1; pointer-events: auto; }
        }
    </style>
    @vite(['resources/css/site-theme.css', 'resources/js/site-ui.js'])
</head>
<body class="admin-body min-h-screen bg-slate-50 text-slate-800 antialiased">
    <div class="admin-overlay fixed inset-0 z-40 bg-black/50 md:hidden" id="admin-overlay" aria-hidden="true" onclick="document.getElementById('admin-sidebar').classList.remove('open'); this.classList.remove('open');"></div>
    <aside class="admin-sidebar fixed left-0 top-0 z-50 flex h-full w-64 flex-col border-r border-slate-200 bg-white" id="admin-sidebar">
        <div class="flex items-center justify-between border-b border-slate-200 p-4 dark:border-slate-800">
            <a href="{{ route('admin.dashboard') }}" class="text-lg font-bold text-slate-900 dark:text-white">Admin</a>
            <button type="button" class="md:hidden rounded-lg p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800" onclick="document.getElementById('admin-sidebar').classList.remove('open'); document.getElementById('admin-overlay').classList.remove('open');" aria-label="Fermer le menu">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <nav class="flex-1 overflow-y-auto p-3">
            <ul class="space-y-0.5">
                <li><a href="{{ route('admin.dashboard') }}" class="block rounded-lg px-3 py-2.5 text-sm font-medium transition {{ request()->routeIs('admin.dashboard') ? 'admin-nav-active bg-slate-100 text-slate-900 dark:bg-slate-800 dark:text-white' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400' }}">Tableau de bord</a></li>
                <li><a href="{{ route('admin.donnees') }}" class="block rounded-lg px-3 py-2.5 text-sm font-medium transition {{ request()->routeIs('admin.donnees') ? 'admin-nav-active bg-slate-100 text-slate-900 dark:bg-slate-800 dark:text-white' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400' }}">Données</a></li>
                <li><a href="{{ route('admin.projets.index') }}" class="block rounded-lg px-3 py-2.5 text-sm font-medium transition {{ request()->routeIs('admin.projets.*') ? 'admin-nav-active bg-slate-100 text-slate-900 dark:bg-slate-800 dark:text-white' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400' }}">Projets</a></li>
                <li><a href="{{ route('admin.contacts.index') }}" class="block rounded-lg px-3 py-2.5 text-sm font-medium transition {{ request()->routeIs('admin.contacts.*') ? 'admin-nav-active bg-slate-100 text-slate-900 dark:bg-slate-800 dark:text-white' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400' }}">Contacts</a></li>
                <li><a href="{{ route('admin.experiences.index') }}" class="block rounded-lg px-3 py-2.5 text-sm font-medium transition {{ request()->routeIs('admin.experiences.*') ? 'admin-nav-active bg-slate-100 text-slate-900 dark:bg-slate-800 dark:text-white' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400' }}">Expériences</a></li>
                <li><a href="{{ route('admin.formations.index') }}" class="block rounded-lg px-3 py-2.5 text-sm font-medium transition {{ request()->routeIs('admin.formations.*') ? 'admin-nav-active bg-slate-100 text-slate-900 dark:bg-slate-800 dark:text-white' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400' }}">Formations</a></li>
            </ul>
        </nav>
        <div class="border-t border-slate-200 p-3 dark:border-slate-800">
            <a href="{{ route('home') }}" class="mb-2 block rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-white">Voir le site</a>
            <button type="button" onclick="toggleTheme()" class="theme-btn w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-left text-sm font-medium text-slate-700 transition hover:bg-slate-100 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-700">
                <span id="theme-label">Mode sombre</span>
            </button>
            <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">
                @csrf
                <button type="submit" class="btn btn-secondary btn-sm w-full">Déconnexion</button>
            </form>
        </div>
    </aside>
    <div class="admin-main min-h-screen pl-0 md:pl-64">
        <header class="admin-header sticky top-0 z-30 flex items-center justify-between border-b border-slate-200 bg-white px-4 py-3 md:px-8">
            <button type="button" class="md:hidden rounded-lg p-2 text-slate-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800" onclick="document.getElementById('admin-sidebar').classList.add('open'); document.getElementById('admin-overlay').classList.add('open');" aria-label="Ouvrir le menu">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <span class="text-sm font-medium text-slate-500 dark:text-slate-400 md:ml-0">@yield('title', 'Admin')</span>
        </header>
        <main class="min-h-[60vh] p-4 md:p-8">
            @if(session('success'))
                <div class="alert-success mb-6 rounded-xl border px-4 py-3">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert-error mb-6 rounded-xl border px-4 py-3">{{ session('error') }}</div>
            @endif
            @yield('content')
        </main>
        <footer class="admin-footer border-t border-slate-200 bg-white py-6">
            <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-wrap items-center justify-between gap-4 text-sm text-slate-500 dark:text-slate-400">
                    <span>Admin Portfolio</span>
                    <a href="{{ route('home') }}" class="transition hover:text-slate-700 dark:hover:text-slate-300">Voir le site</a>
                </div>
            </div>
        </footer>
    </div>
    <script>
        var l = document.getElementById('theme-label');
        if (l) l.textContent = document.documentElement.classList.contains('dark') ? 'Mode clair' : 'Mode sombre';
    </script>
</body>
</html>
