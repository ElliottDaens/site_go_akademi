@extends('layouts.admin')

@section('title', 'Nouveau projet')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.projets.index') }}" class="btn btn-secondary btn-sm">← Liste</a>
    </div>
    <h1 class="admin-page-title mb-6">Nouveau projet</h1>
    <div class="admin-card p-6">
        <form action="{{ route('admin.projets.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titre">Titre *</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre') }}" required>
                @error('titre')<span class="error-text">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image (URL ou emoji)</label>
                <input type="text" id="image" name="image" value="{{ old('image') }}" placeholder="ex: https://... ou 🎰">
            </div>
            <div class="form-group">
                <label for="lien_demo">Lien démo</label>
                <input type="url" id="lien_demo" name="lien_demo" value="{{ old('lien_demo') }}">
            </div>
            <div class="form-group">
                <label for="lien_github">Lien GitHub</label>
                <input type="url" id="lien_github" name="lien_github" value="{{ old('lien_github') }}">
            </div>
            <div class="form-group">
                <label for="tags">Tags (séparés par des virgules)</label>
                <input type="text" id="tags" name="tags" value="{{ old('tags') }}" placeholder="Laravel, PHP, Vue.js">
            </div>
            <div class="form-group">
                <label for="ordre">Ordre</label>
                <input type="number" id="ordre" name="ordre" value="{{ old('ordre', 0) }}" min="0">
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="visible" value="1" {{ old('visible', true) ? 'checked' : '' }}>
                    Visible sur le site
                </label>
            </div>
            <div class="flex flex-wrap gap-2">
                <button type="submit" class="btn btn-primary">Créer</button>
                <a href="{{ route('admin.projets.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
