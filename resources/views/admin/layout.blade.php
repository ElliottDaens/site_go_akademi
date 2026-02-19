<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Go Akademi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-neutral-50 text-neutral-800 antialiased">
    <header class="border-b border-neutral-200 bg-white shadow-sm">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4 sm:px-6">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-red-700 text-sm font-bold text-white">G</span>
                <span class="font-display text-lg tracking-wider text-neutral-800">Admin</span>
            </a>
            <div class="flex items-center gap-4">
                <a href="{{ route('accueil') }}" target="_blank" class="hidden text-sm text-neutral-500 transition hover:text-red-700 sm:inline">Voir le site →</a>
                <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="admin-btn-secondary text-neutral-600">Déconnexion</button>
                </form>
            </div>
        </div>
    </header>
    <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6">
        @if(session('success'))
            <div class="mb-6 flex items-center gap-3 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800">
                <svg class="h-5 w-5 shrink-0 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>
