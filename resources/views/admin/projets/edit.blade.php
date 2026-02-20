@extends('layouts.admin')

@section('title', 'Modifier : ' . $projet->titre)

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.projets.index') }}" class="btn btn-secondary btn-sm">← Liste</a>
    </div>
    <h1 class="admin-page-title mb-6">Modifier : {{ $projet->titre }}</h1>
    <div class="admin-card p-6">
        <form action="{{ route('admin.projets.update', $projet) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titre">Titre *</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre', $projet->titre) }}" required>
                @error('titre')<span class="error-text">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description', $projet->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image (URL ou emoji)</label>
                <input type="text" id="image" name="image" value="{{ old('image', $projet->image) }}">
            </div>
            <div class="form-group">
                <label for="lien_demo">Lien démo</label>
                <input type="url" id="lien_demo" name="lien_demo" value="{{ old('lien_demo', $projet->lien_demo) }}">
            </div>
            <div class="form-group">
                <label for="lien_github">Lien GitHub</label>
                <input type="url" id="lien_github" name="lien_github" value="{{ old('lien_github', $projet->lien_github) }}">
            </div>
            <div class="form-group">
                <label for="tags">Tags (séparés par des virgules)</label>
                <input type="text" id="tags" name="tags" value="{{ old('tags', $projet->tags) }}">
            </div>
            <div class="form-group">
                <label for="ordre">Ordre</label>
                <input type="number" id="ordre" name="ordre" value="{{ old('ordre', $projet->ordre) }}" min="0">
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="visible" value="1" {{ old('visible', $projet->visible) ? 'checked' : '' }}>
                    Visible sur le site
                </label>
            </div>
            <div class="flex flex-wrap gap-2">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('admin.projets.show', $projet) }}" class="btn btn-secondary">Voir</a>
                <a href="{{ route('admin.projets.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
