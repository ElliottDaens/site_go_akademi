@extends('layouts.admin')

@section('title', 'Modifier : ' . $formation->titre)

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.formations.index') }}" class="btn btn-secondary btn-sm">← Liste</a>
    </div>
    <h1 class="admin-page-title mb-6">Modifier : {{ $formation->titre }}</h1>
    <div class="admin-card p-6">
        <form action="{{ route('admin.formations.update', $formation) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titre">Titre *</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre', $formation->titre) }}" required>
                @error('titre')<span class="error-text">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="etablissement">Établissement</label>
                <input type="text" id="etablissement" name="etablissement" value="{{ old('etablissement', $formation->etablissement) }}">
            </div>
            <div class="form-group">
                <label for="lieu">Lieu</label>
                <input type="text" id="lieu" name="lieu" value="{{ old('lieu', $formation->lieu) }}">
            </div>
            <div class="form-group">
                <label for="date_debut">Date de début</label>
                <input type="date" id="date_debut" name="date_debut" value="{{ old('date_debut', $formation->date_debut?->format('Y-m-d')) }}">
            </div>
            <div class="form-group">
                <label for="date_fin">Date de fin</label>
                <input type="date" id="date_fin" name="date_fin" value="{{ old('date_fin', $formation->date_fin?->format('Y-m-d')) }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description', $formation->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="ordre">Ordre</label>
                <input type="number" id="ordre" name="ordre" value="{{ old('ordre', $formation->ordre) }}" min="0">
            </div>
            <div class="flex flex-wrap gap-2">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('admin.formations.show', $formation) }}" class="btn btn-secondary">Voir</a>
                <a href="{{ route('admin.formations.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
