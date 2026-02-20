@extends('layouts.admin')

@section('title', $experience->titre)

@section('content')
    <div class="mb-6 flex flex-wrap items-center gap-3">
        <a href="{{ route('admin.experiences.index') }}" class="btn btn-secondary btn-sm">← Liste</a>
        <a href="{{ route('admin.experiences.edit', $experience) }}" class="btn btn-primary btn-sm">Modifier</a>
        <a href="{{ route('admin.experiences.delete', $experience) }}" class="btn btn-danger btn-sm">Supprimer</a>
    </div>
    <h1 class="admin-page-title mb-6">{{ $experience->titre }}</h1>
    <div class="admin-card p-6">
        <div class="space-y-3">
            <p class="detail-row"><strong>ID :</strong> {{ $experience->id }}</p>
            <p class="detail-row"><strong>Entreprise :</strong> {{ $experience->entreprise ?? '—' }}</p>
            <p class="detail-row"><strong>Lieu :</strong> {{ $experience->lieu ?? '—' }}</p>
            <p class="detail-row"><strong>Période :</strong>
                {{ $experience->date_debut?->format('m/Y') ?? '?' }}
                @if($experience->en_cours)
                    — Présent
                @else
                    — {{ $experience->date_fin?->format('m/Y') ?? '?' }}
                @endif
            </p>
            <p class="detail-row"><strong>Ordre :</strong> {{ $experience->ordre }}</p>
            @if($experience->description)
                <p class="detail-row"><strong>Description :</strong></p>
                <p class="detail-row whitespace-pre-wrap text-slate-500 dark:text-slate-400">{{ $experience->description }}</p>
            @endif
            <p class="detail-row"><strong>Créé le :</strong> {{ $experience->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
@endsection
