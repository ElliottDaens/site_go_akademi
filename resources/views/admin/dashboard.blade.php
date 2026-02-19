@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <h1 class="font-display text-2xl tracking-wider text-neutral-800 sm:text-3xl">Gestion du site</h1>
        <p class="mt-1 text-sm text-neutral-500">Sélectionnez une table pour gérer les données</p>
    </div>
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @php
            $icons = [
                'articles' => '📰',
                'encadrants' => '👤',
                'horaires' => '🕐',
                'lieux' => '📍',
                'tarifs' => '💰',
                'site_settings' => '⚙️',
                'contact_messages' => '✉️',
                'images' => '🖼️',
            ];
        @endphp
        @foreach(config('admin.tables') as $table => $config)
        <a href="{{ route('admin.table.index', $table) }}"
            class="admin-card group flex items-center gap-4 p-6">
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-neutral-100 text-xl transition group-hover:bg-red-100">
                {{ $icons[$table] ?? '📋' }}
            </span>
            <div class="min-w-0 flex-1">
                <span class="block font-semibold text-neutral-800 group-hover:text-red-700">{{ $config['label'] }}</span>
                <span class="block text-xs text-neutral-500">Gérer les enregistrements</span>
            </div>
            <svg class="h-5 w-5 shrink-0 text-neutral-400 transition group-hover:translate-x-1 group-hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
        @endforeach
    </div>
    <p class="mt-10">
        <a href="{{ route('accueil') }}" class="text-sm text-neutral-500 transition hover:text-red-700">← Retour au site</a>
    </p>
@endsection
