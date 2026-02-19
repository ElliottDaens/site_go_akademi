@extends('layouts.app')

@section('title', 'Actualités')

@section('content')
    <section class="relative h-[45vh] min-h-[320px] overflow-hidden">
        <img src="{{ $heroImage }}" alt="Actualités" class="absolute inset-0 h-full w-full object-cover" loading="eager" width="1920" height="720">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
        <div class="relative flex h-full items-center justify-center">
            <h1 class="font-display text-4xl tracking-[0.2em] text-white md:text-6xl">ACTUALITÉS</h1>
        </div>
    </section>

    <div class="mx-auto max-w-5xl px-4 py-20 sm:px-6 lg:px-8">
        <h2 class="animate-on-scroll section-title mb-12">Toutes les news</h2>

        <div class="space-y-8">
            @forelse($articles as $article)
            <article class="card-go animate-on-scroll group border-l-4 border-l-red-700 animate-delay-{{ min($loop->iteration, 4) }}">
                <div class="flex flex-wrap items-center gap-3 text-sm">
                    <time class="font-bold uppercase text-neutral-500">{{ $article->date_publication->translatedFormat('d F Y') }}</time>
                    <span class="bg-red-700 px-2 py-0.5 font-bold text-white">{{ ucfirst($article->categorie) }}</span>
                </div>
                <h3 class="mt-6 text-2xl font-bold text-black group-hover:text-red-700">{{ $article->titre }}</h3>
                <p class="mt-4 text-lg leading-relaxed text-neutral-600">{{ $article->extrait }}</p>
            </article>
            @empty
            <p class="text-center text-neutral-500">Aucune actualité pour le moment.</p>
            @endforelse
        </div>
    </div>
@endsection
