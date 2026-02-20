@extends('layouts.admin')

@section('title', 'Supprimer la formation')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.formations.index') }}" class="btn btn-secondary btn-sm">← Liste</a>
    </div>
    <h1 class="admin-page-title mb-6">Supprimer la formation</h1>
    <div class="admin-card p-6">
        <p class="detail-row">Vous êtes sur le point de supprimer la formation <strong>{{ $formation->titre }}</strong> (ID {{ $formation->id }}).</p>
        <form action="{{ route('admin.formations.destroy', $formation) }}" method="POST" class="mt-6">
            @csrf
            @method('DELETE')
            <div class="flex flex-wrap gap-2">
                <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                <a href="{{ route('admin.formations.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
