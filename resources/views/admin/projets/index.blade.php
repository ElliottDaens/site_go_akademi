@extends('layouts.admin')

@section('title', 'Projets')

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <h1 class="admin-page-title">Projets</h1>
        <a href="{{ route('admin.projets.create') }}" class="btn btn-primary">Ajouter un projet</a>
    </div>
    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Visible</th>
                        <th>Ordre</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projets as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->titre }}</td>
                            <td>
                                @if($p->visible)
                                    <span class="badge-success">Oui</span>
                                @else
                                    <span class="badge-muted">Non</span>
                                @endif
                            </td>
                            <td>{{ $p->ordre }}</td>
                            <td class="actions">
                                <a href="{{ route('admin.projets.show', $p) }}" class="btn btn-secondary btn-sm">Voir</a>
                                <a href="{{ route('admin.projets.edit', $p) }}" class="btn btn-secondary btn-sm">Modifier</a>
                                <a href="{{ route('admin.projets.delete', $p) }}" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-500 dark:text-slate-400">Aucun projet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($projets->hasPages())
            <div class="border-t border-slate-200 px-4 py-3 dark:border-slate-700">
                {{ $projets->links() }}
            </div>
        @endif
    </div>
@endsection
