@extends('layouts.admin')

@section('title', $formation->titre)

@section('content')
    <div class="mb-6 flex flex-wrap items-center gap-3">
        <a href="{{ route('admin.formations.index') }}" class="btn btn-secondary btn-sm">← Liste</a>
        <a href="{{ route('admin.formations.edit', $formation) }}" class="btn btn-primary btn-sm">Modifier</a>
        <a href="{{ route('admin.formations.delete', $formation) }}" class="btn btn-danger btn-sm">Supprimer</a>
    </div>
    <h1 class="admin-page-title mb-6">{{ $formation->titre }}</h1>
    <div class="admin-card p-6">
        <div class="space-y-3">
            <p class="detail-row"><strong>ID :</strong> {{ $formation->id }}</p>
            <p class="detail-row"><strong>Établissement :</strong> {{ $formation->etablissement ?? '—' }}</p>
            <p class="detail-row"><strong>Lieu :</strong> {{ $formation->lieu ?? '—' }}</p>
            <p class="detail-row"><strong>Période :</strong> {{ $formation->date_debut?->format('m/Y') ?? '?' }} — {{ $formation->date_fin?->format('m/Y') ?? '?' }}</p>
            <p class="detail-row"><strong>Ordre :</strong> {{ $formation->ordre }}</p>
            @if($formation->description)
                <p class="detail-row"><strong>Description :</strong></p>
                <p class="detail-row whitespace-pre-wrap text-slate-500 dark:text-slate-400">{{ $formation->description }}</p>
            @endif
            <p class="detail-row"><strong>Créé le :</strong> {{ $formation->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
@endsection
