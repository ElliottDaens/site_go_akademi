@extends('layouts.admin')

@section('title', 'Nouvelle formation')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.formations.index') }}" class="btn btn-secondary btn-sm">← Liste</a>
    </div>
    <h1 class="admin-page-title mb-6">Nouvelle formation</h1>
    <div class="admin-card p-6">
        <form action="{{ route('admin.formations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titre">Titre *</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre') }}" required>
                @error('titre')<span class="error-text">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="etablissement">Établissement</label>
                <input type="text" id="etablissement" name="etablissement" value="{{ old('etablissement') }}">
            </div>
            <div class="form-group">
                <label for="lieu">Lieu</label>
                <input type="text" id="lieu" name="lieu" value="{{ old('lieu') }}">
            </div>
            <div class="form-group">
                <label for="date_debut">Date de début</label>
                <input type="date" id="date_debut" name="date_debut" value="{{ old('date_debut') }}">
            </div>
            <div class="form-group">
                <label for="date_fin">Date de fin</label>
                <input type="date" id="date_fin" name="date_fin" value="{{ old('date_fin') }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="ordre">Ordre</label>
                <input type="number" id="ordre" name="ordre" value="{{ old('ordre', 0) }}" min="0">
            </div>
            <div class="flex flex-wrap gap-2">
                <button type="submit" class="btn btn-primary">Créer</button>
                <a href="{{ route('admin.formations.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
