@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('content')
    <h1 class="admin-page-title mb-8">Tableau de bord</h1>
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <a href="{{ route('admin.projets.index') }}" class="admin-card admin-stat-card block p-6 transition duration-200 hover:-translate-y-0.5 hover:shadow-md">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Projets</p>
            <p class="mt-1 text-3xl font-bold text-slate-900 dark:text-white">{{ $projetsCount }}</p>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Gérer les projets</p>
        </a>
        <a href="{{ route('admin.contacts.index') }}" class="admin-card admin-stat-card block p-6 transition duration-200 hover:-translate-y-0.5 hover:shadow-md">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Contacts</p>
            <p class="mt-1 text-3xl font-bold text-slate-900 dark:text-white">{{ $contactsCount }}</p>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Messages reçus</p>
        </a>
        <a href="{{ route('admin.experiences.index') }}" class="admin-card admin-stat-card block p-6 transition duration-200 hover:-translate-y-0.5 hover:shadow-md">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Expériences</p>
            <p class="mt-1 text-3xl font-bold text-slate-900 dark:text-white">{{ $experiencesCount }}</p>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Gérer les expériences</p>
        </a>
        <a href="{{ route('admin.formations.index') }}" class="admin-card admin-stat-card block p-6 transition duration-200 hover:-translate-y-0.5 hover:shadow-md">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Formations</p>
            <p class="mt-1 text-3xl font-bold text-slate-900 dark:text-white">{{ $formationsCount }}</p>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Gérer les formations</p>
        </a>
    </div>
@endsection
