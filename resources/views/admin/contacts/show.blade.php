@extends('layouts.admin')

@section('title', 'Message #' . $contact->id)

@section('content')
    <div class="mb-6 flex flex-wrap items-center gap-3">
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary btn-sm">← Liste</a>
        <a href="{{ route('admin.contacts.delete', $contact) }}" class="btn btn-danger btn-sm">Supprimer</a>
    </div>
    <h1 class="admin-page-title mb-6">Message #{{ $contact->id }}</h1>
    <div class="admin-card p-6">
        <div class="space-y-3">
            <p class="detail-row"><strong>Nom :</strong> {{ $contact->name }}</p>
            <p class="detail-row"><strong>Email :</strong> <a href="mailto:{{ $contact->email }}" class="detail-link">{{ $contact->email }}</a></p>
            <p class="detail-row"><strong>Sujet :</strong> {{ $contact->subject }}</p>
            <p class="detail-row"><strong>Reçu le :</strong> {{ $contact->created_at->format('d/m/Y à H:i') }}</p>
            <hr class="my-4 border-slate-200 dark:border-slate-700">
            <p class="detail-row"><strong>Message :</strong></p>
            <p class="whitespace-pre-wrap text-slate-500 dark:text-slate-400">{{ $contact->message }}</p>
        </div>
    </div>
@endsection
