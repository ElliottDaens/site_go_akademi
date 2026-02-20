@extends('base')

@section('title', 'Projets')

@section('content')
{{-- Hero : même structure que Contact / About --}}
<section class="py-20 md:py-28">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="text-muted mb-4 text-sm font-medium uppercase tracking-widest text-slate-400">Projets</p>
            <h1 class="mb-6 text-4xl font-bold leading-tight text-slate-900 dark:text-slate-100 md:text-5xl lg:text-6xl">
                Réalisations<br>
                <span class="subtitle text-slate-400 dark:text-slate-500">et travaux personnels.</span>
            </h1>
            <p class="text-body text-lg leading-relaxed text-slate-600 dark:text-slate-400">
                Sites web, applications et projets réalisés en formation ou en autonomie.
            </p>
        </div>
    </div>
</section>

{{-- Grille projets : même style que Home "Projets récents" + About (cards, tags) --}}
<section class="section-alt border-t border-slate-200 bg-slate-50 py-20 dark:border-slate-700 dark:bg-slate-900/50">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($projets as $projet)
            <article class="card-item group overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md hover:border-slate-300 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600">
                <div class="card-img flex h-40 items-center justify-center overflow-hidden bg-slate-100 dark:bg-slate-700">
                    @if($projet->image && str_starts_with($projet->image ?? '', 'http'))
                        <img src="{{ $projet->image }}" alt="" class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                    @else
                        <span class="text-3xl text-slate-300 dark:text-slate-500" aria-hidden="true">&#9670;</span>
                    @endif
                </div>
                <div class="p-5">
                    <h2 class="mb-1 font-medium text-slate-900 dark:text-slate-100">{{ $projet->titre }}</h2>
                    <p class="text-body mb-4 line-clamp-2 text-sm leading-relaxed text-slate-600 dark:text-slate-400">{{ $projet->description ?? '—' }}</p>
                    @if($projet->tags_array && count($projet->tags_array) > 0)
                    <div class="mb-4 flex flex-wrap gap-2">
                        @foreach($projet->tags_array as $tag)
                        <span class="tag-item rounded-lg border border-slate-200 bg-slate-50 px-2.5 py-0.5 text-xs font-medium text-slate-600 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-300">{{ $tag }}</span>
                        @endforeach
                    </div>
                    @endif
                    <div class="flex flex-wrap gap-3">
                        @if($projet->lien_demo)
                        <a href="{{ $projet->lien_demo }}" target="_blank" rel="noopener" class="text-sm font-medium text-slate-700 underline decoration-slate-300 underline-offset-2 transition hover:text-slate-900 dark:text-slate-300 dark:decoration-slate-500 dark:hover:text-slate-100">Voir le projet</a>
                        @endif
                        @if($projet->lien_github)
                        <a href="{{ $projet->lien_github }}" target="_blank" rel="noopener" class="text-sm font-medium text-slate-700 underline decoration-slate-300 underline-offset-2 transition hover:text-slate-900 dark:text-slate-300 dark:decoration-slate-500 dark:hover:text-slate-100">GitHub</a>
                        @endif
                        @if(!$projet->lien_demo && !$projet->lien_github)
                        <span class="text-muted text-sm text-slate-400 dark:text-slate-500">Pas de lien</span>
                        @endif
                    </div>
                </div>
            </article>
            @empty
            <p class="text-muted col-span-full py-16 text-center text-slate-500 dark:text-slate-400">Aucun projet pour le moment.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
