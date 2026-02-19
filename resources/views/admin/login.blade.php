<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Go Akademi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-gradient-to-br from-neutral-100 to-neutral-200 p-4">
    <div class="w-full max-w-md">
        <div class="rounded-2xl border border-neutral-200 bg-white p-8 shadow-xl shadow-neutral-200/50">
            <div class="mb-8 flex justify-center">
                <span class="flex h-14 w-14 items-center justify-center rounded-xl bg-red-700 text-2xl font-bold text-white">G</span>
            </div>
            <h1 class="mb-2 text-center font-display text-2xl tracking-wider text-neutral-800">Espace Admin</h1>
            <p class="mb-8 text-center text-sm text-neutral-500">Go Akademi — Connexion sécurisée</p>
            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="password" class="block text-sm font-medium text-neutral-700">Mot de passe</label>
                    <input type="password" id="password" name="password" required
                        class="admin-input mt-2"
                        placeholder="••••••••"
                        autofocus autocomplete="current-password">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="admin-btn-primary w-full justify-center py-3">
                    Connexion
                </button>
            </form>
            <p class="mt-8 text-center">
                <a href="{{ route('accueil') }}" class="text-sm text-neutral-500 transition hover:text-red-700">← Retour au site</a>
            </p>
        </div>
    </div>
</body>
</html>
