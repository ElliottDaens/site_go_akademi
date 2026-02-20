@extends('layouts.app')

@section('title', 'Connexion admin')

@section('content')
<section class="flex min-h-[calc(100vh-6rem)] items-center justify-center px-4 py-16">
    <div class="w-full max-w-sm rounded-2xl border border-slate-200 bg-white p-8 shadow-lg dark:border-slate-700 dark:bg-slate-800 sm:p-10">
        <p class="mb-2 text-center text-xs font-semibold uppercase tracking-widest text-slate-400 dark:text-slate-500">Espace admin</p>
        <h1 class="mb-8 text-center text-2xl font-bold text-slate-900 dark:text-white">Connexion</h1>

        @if(session('error'))
            <div class="alert-error mb-6 rounded-xl border px-4 py-3">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert-error mb-6 rounded-xl border px-4 py-3">
                <ul class="space-y-1 text-sm">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="username" class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300">Identifiant</label>
                <input type="text" id="username" name="username" value="{{ old('username', 'admin') }}" required autofocus placeholder="admin"
                    class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-900 placeholder-slate-400 transition focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-400/20 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100 dark:placeholder-slate-500">
            </div>
            <div>
                <label for="password" class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300">Mot de passe</label>
                <input type="password" id="password" name="password" required placeholder="••••••••"
                    class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-900 placeholder-slate-400 transition focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-400/20 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100 dark:placeholder-slate-500">
            </div>
            <button type="submit" class="btn btn-primary w-full">Se connecter</button>
        </form>

        <p class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-xs text-slate-500 transition hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-300">← Retour au site</a>
        </p>
    </div>
</section>
@endsection
