@extends('layouts.admin')

@section('title', 'Données (tables BDD)')

@section('content')
    <h1 class="admin-page-title mb-2">Données</h1>
    <p class="mb-8 text-sm text-slate-500 dark:text-slate-400">Résumé des tables de la base de données. Liste et création depuis l’admin.</p>

    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Table</th>
                    <th>Nombre d’entrées</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tables as $t)
                <tr>
                    <td class="font-medium text-slate-900 dark:text-slate-100">{{ $t['label'] }}</td>
                    <td>{{ $t['count'] }}</td>
                    <td class="actions">
                        <a href="{{ $t['index'] }}" class="btn btn-secondary btn-sm">Liste</a>
                        @if($t['create'])
                            <a href="{{ $t['create'] }}" class="btn btn-primary btn-sm">Créer</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
