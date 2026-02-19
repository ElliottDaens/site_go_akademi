@extends('admin.layout')

@section('title', $label)

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <a href="{{ route('admin.dashboard') }}" class="text-sm text-neutral-500 transition hover:text-red-700">← Dashboard</a>
            <h1 class="mt-2 font-display text-2xl tracking-wider text-neutral-800">{{ $label }}</h1>
            <p class="mt-1 text-sm text-neutral-500">{{ $items->count() }} enregistrement(s)</p>
        </div>
        <a href="{{ route('admin.table.create', $table) }}" class="admin-btn-primary">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nouveau
        </a>
    </div>

    @if($items->isEmpty())
        <div class="admin-card flex flex-col items-center justify-center p-12 text-center">
            <span class="mb-4 text-4xl opacity-40">📋</span>
            <p class="text-neutral-500">Aucun enregistrement pour le moment.</p>
            <a href="{{ route('admin.table.create', $table) }}" class="admin-btn-primary mt-4">Créer le premier</a>
        </div>
    @else
        <div class="admin-card overflow-hidden p-0">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="border-b border-neutral-200 bg-neutral-50">
                        <tr>
                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-500">#</th>
                            @foreach($columns as $col)
                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600">{{ ucfirst(str_replace('_', ' ', $col)) }}</th>
                            @endforeach
                            <th class="px-5 py-4 text-right text-xs font-semibold uppercase tracking-wider text-neutral-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-100">
                        @foreach($items as $item)
                        <tr class="transition hover:bg-neutral-50/80">
                            <td class="px-5 py-4 text-sm font-medium text-neutral-400">{{ $item->getKey() }}</td>
                            @foreach($columns as $col)
                            <td class="max-w-[220px] px-5 py-4 text-sm text-neutral-700">
                                @if($col === 'publie' || $col === 'lu')
                                    <span class="admin-badge {{ $item->$col ? 'bg-green-100 text-green-800' : 'bg-neutral-100 text-neutral-600' }}">
                                        {{ $item->$col ? 'Oui' : 'Non' }}
                                    </span>
                                @elseif($col === 'date_publication' || $col === 'created_at' || $col === 'updated_at')
                                    {{ $item->$col?->format('d/m/Y') ?? '-' }}
                                @else
                                    <span class="truncate block" title="{{ $item->$col ?? '-' }}">{{ Str::limit($item->$col ?? '-', 45) }}</span>
                                @endif
                            </td>
                            @endforeach
                            <td class="px-5 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.table.edit', [$table, $item->getKey()]) }}"
                                        class="rounded-lg px-3 py-1.5 text-sm font-medium text-neutral-600 transition hover:bg-neutral-100 hover:text-red-700">
                                        Modifier
                                    </a>
                                    <form action="{{ route('admin.table.destroy', [$table, $item->getKey()]) }}" method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Supprimer cet enregistrement ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-lg px-3 py-1.5 text-sm font-medium text-red-600 transition hover:bg-red-50">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
