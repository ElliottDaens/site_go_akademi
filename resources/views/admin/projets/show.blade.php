@extends('layouts.admin')

@section('title', $projet->titre)

@section('content')
    <div class="mb-6 flex flex-wrap items-center gap-3">
        <a href="{{ route('admin.projets.index') }}" class="btn btn-secondary btn-sm">← Liste</a>
        <a href="{{ route('admin.projets.edit', $projet) }}" class="btn btn-primary btn-sm">Modifier</a>
        <a href="{{ route('admin.projets.delete', $projet) }}" class="btn btn-danger btn-sm">Supprimer</a>
    </div>
    <h1 class="admin-page-title mb-6">{{ $projet->titre }}</h1>
    <div class="admin-card p-6">
        <div class="space-y-3">
            <p class="detail-row"><strong>ID :</strong> {{ $projet->id }}</p>
            <p class="detail-row"><strong>Visible :</strong> {{ $projet->visible ? 'Oui' : 'Non' }}</p>
            <p class="detail-row"><strong>Ordre :</strong> {{ $projet->ordre }}</p>
            @if($projet->description)
                <p class="detail-row"><strong>Description :</strong></p>
                <p class="detail-row text-slate-500 dark:text-slate-400">{{ $projet->description }}</p>
            @endif
            @if($projet->image)
                <p class="detail-row"><strong>Image :</strong> {{ $projet->image }}</p>
            @endif
            @if($projet->lien_demo)
                <p class="detail-row"><strong>Lien démo :</strong> <a href="{{ $projet->lien_demo }}" target="_blank" rel="noopener" class="detail-link">{{ $projet->lien_demo }}</a></p>
            @endif
            @if($projet->lien_github)
                <p class="detail-row"><strong>GitHub :</strong> <a href="{{ $projet->lien_github }}" target="_blank" rel="noopener" class="detail-link">{{ $projet->lien_github }}</a></p>
            @endif
            @if($projet->tags)
                <p class="detail-row"><strong>Tags :</strong> {{ $projet->tags }}</p>
            @endif
            <p class="detail-row"><strong>Créé le :</strong> {{ $projet->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
@endsection
