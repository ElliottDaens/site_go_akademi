@extends('layouts.admin')

@section('title', 'Messages de contact')

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <h1 class="admin-page-title">Messages de contact</h1>
    </div>
    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Sujet</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->email }}</td>
                            <td>{{ Str::limit($c->subject, 40) }}</td>
                            <td>{{ $c->created_at->format('d/m/Y H:i') }}</td>
                            <td class="actions">
                                <a href="{{ route('admin.contacts.show', $c) }}" class="btn btn-secondary btn-sm">Voir</a>
                                <a href="{{ route('admin.contacts.delete', $c) }}" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-500 dark:text-slate-400">Aucun message.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($contacts->hasPages())
            <div class="border-t border-slate-200 px-4 py-3 dark:border-slate-700">
                {{ $contacts->links() }}
            </div>
        @endif
    </div>
@endsection
