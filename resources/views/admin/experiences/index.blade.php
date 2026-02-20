@extends('layouts.admin')

@section('title', 'Expériences')

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <h1 class="admin-page-title">Expériences</h1>
        <a href="{{ route('admin.experiences.create') }}" class="btn btn-primary">Ajouter une expérience</a>
    </div>
    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Entreprise</th>
                        <th>Période</th>
                        <th>Ordre</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($experiences as $e)
                        <tr>
                            <td>{{ $e->id }}</td>
                            <td>{{ $e->titre }}</td>
                            <td>{{ $e->entreprise ?? '—' }}</td>
                            <td>
                                {{ $e->date_debut?->format('Y') ?? '?' }}
                                @if($e->en_cours)
                                    — Présent
                                @else
                                    — {{ $e->date_fin?->format('Y') ?? '?' }}
                                @endif
                            </td>
                            <td>{{ $e->ordre }}</td>
                            <td class="actions">
                                <a href="{{ route('admin.experiences.show', $e) }}" class="btn btn-secondary btn-sm">Voir</a>
                                <a href="{{ route('admin.experiences.edit', $e) }}" class="btn btn-secondary btn-sm">Modifier</a>
                                <a href="{{ route('admin.experiences.delete', $e) }}" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-500 dark:text-slate-400">Aucune expérience.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($experiences->hasPages())
            <div class="border-t border-slate-200 px-4 py-3 dark:border-slate-700">
                {{ $experiences->links() }}
            </div>
        @endif
    </div>
@endsection
