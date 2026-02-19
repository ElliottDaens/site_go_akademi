@extends('admin.layout')

@section('title', ($edit ?? false) ? 'Modifier' : 'Créer')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.table.index', $table) }}" class="text-sm text-neutral-500 transition hover:text-red-700">← {{ $label }}</a>
        <h1 class="mt-2 font-display text-2xl tracking-wider text-neutral-800">
            {{ ($edit ?? false) ? 'Modifier' : 'Créer' }} — {{ $label }}
        </h1>
    </div>

    @php
        $hasFileUpload = !empty($file_columns ?? []);
    @endphp
    <form action="{{ ($edit ?? false) ? route('admin.table.update', [$table, $item->getKey()]) : route('admin.table.store', $table) }}"
        method="POST" class="admin-card max-w-2xl space-y-6 p-6 sm:p-8"
        enctype="{{ $hasFileUpload ? 'multipart/form-data' : 'application/x-www-form-urlencoded' }}">
        @csrf
        @if($edit ?? false) @method('PUT') @endif

        <div class="space-y-5">
            @foreach($columns as $col)
            <div>
                @php
                    $value = old($col, $item->$col ?? '');
                    $isTextarea = in_array($col, ['extrait', 'contenu', 'bio', 'description', 'message', 'valeur']);
                    $isBoolean = in_array($col, ['publie', 'lu']);
                    $isDate = in_array($col, ['date_publication']);
                    $isFile = in_array($col, $file_columns ?? []);
                @endphp
                <label for="{{ $col }}" class="block text-sm font-medium text-neutral-700">{{ ucfirst(str_replace('_', ' ', $col)) }}</label>

                @if($isFile)
                    <div class="mt-2 space-y-3">
                        @if(($edit ?? false) && $value)
                            <div class="flex items-center gap-4 rounded-lg border border-neutral-200 bg-neutral-50 p-4">
                                @if(in_array(strtolower(pathinfo($value, PATHINFO_EXTENSION)), ['jpg','jpeg','png','gif','webp']))
                                    <img src="{{ asset('images/' . $value) }}" alt="" class="h-20 w-20 rounded-lg object-cover">
                                @endif
                                <div>
                                    <p class="text-sm font-medium text-neutral-600">Image actuelle</p>
                                    <p class="text-xs text-neutral-500">{{ $value }}</p>
                                </div>
                            </div>
                            <p class="text-xs text-neutral-500">Choisir un nouveau fichier pour remplacer (sinon l'actuel est conservé)</p>
                        @endif
                        <input type="file" id="{{ $col }}" name="{{ $col }}" accept="image/*"
                            class="block w-full text-sm text-neutral-600 file:mr-4 file:rounded-lg file:border-0 file:bg-red-100 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-red-700 hover:file:bg-red-200">
                    </div>
                @elseif($isTextarea)
                    <textarea id="{{ $col }}" name="{{ $col }}" rows="4"
                        class="admin-input mt-2 min-h-[100px] resize-y">{{ $value }}</textarea>
                @elseif($isBoolean)
                    <select id="{{ $col }}" name="{{ $col }}" class="admin-input mt-2">
                        <option value="0" {{ !$value ? 'selected' : '' }}>Non</option>
                        <option value="1" {{ $value ? 'selected' : '' }}>Oui</option>
                    </select>
                @elseif($isDate)
                    <input type="date" id="{{ $col }}" name="{{ $col }}" value="{{ $value ? $item->$col?->format('Y-m-d') : '' }}"
                        class="admin-input mt-2">
                @else
                    <input type="text" id="{{ $col }}" name="{{ $col }}" value="{{ $value }}"
                        class="admin-input mt-2"
                        @if($col === 'slug') placeholder="Laissez vide pour générer depuis le titre" @endif>
                @endif
                @error($col)
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            @endforeach
        </div>

        <div class="flex flex-wrap gap-3 border-t border-neutral-200 pt-6">
            <button type="submit" class="admin-btn-primary">
                {{ ($edit ?? false) ? 'Enregistrer les modifications' : 'Créer' }}
            </button>
            <a href="{{ route('admin.table.index', $table) }}" class="admin-btn-secondary">
                Annuler
            </a>
        </div>
    </form>
@endsection
