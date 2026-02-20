@extends('layouts.admin')

@section('title', 'Supprimer le projet')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.projets.index') }}" class="btn btn-secondary btn-sm">← Liste</a>
    </div>
    <h1 class="admin-page-title mb-6">Supprimer le projet</h1>
    <div class="admin-card p-6">
        <p class="detail-row">Vous êtes sur le point de supprimer le projet <strong>{{ $projet->titre }}</strong> (ID {{ $projet->id }}).</p>
        <form action="{{ route('admin.projets.destroy', $projet) }}" method="POST" class="mt-6">
            @csrf
            @method('DELETE')
            <div class="flex flex-wrap gap-2">
                <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                <a href="{{ route('admin.projets.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
