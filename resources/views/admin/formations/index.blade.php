@extends('layouts.admin')

@section('title', 'Formations')

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <h1 class="admin-page-title">Formations</h1>
        <a href="{{ route('admin.formations.create') }}" class="btn btn-primary">Ajouter une formation</a>
    </div>
    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Établissement</th>
                        <th>Période</th>
                        <th>Ordre</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($formations as $f)
                        <tr>
                            <td>{{ $f->id }}</td>
                            <td>{{ $f->titre }}</td>
                            <td>{{ $f->etablissement ?? '—' }}</td>
                            <td>{{ $f->date_debut?->format('Y') ?? '?' }} — {{ $f->date_fin?->format('Y') ?? '?' }}</td>
                            <td>{{ $f->ordre }}</td>
                            <td class="actions">
                                <a href="{{ route('admin.formations.show', $f) }}" class="btn btn-secondary btn-sm">Voir</a>
                                <a href="{{ route('admin.formations.edit', $f) }}" class="btn btn-secondary btn-sm">Modifier</a>
                                <a href="{{ route('admin.formations.delete', $f) }}" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-500 dark:text-slate-400">Aucune formation.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($formations->hasPages())
            <div class="border-t border-slate-200 px-4 py-3 dark:border-slate-700">
                {{ $formations->links() }}
            </div>
        @endif
    </div>
@endsection
