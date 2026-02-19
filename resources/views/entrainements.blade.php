@extends('layouts.app')

@section('title', 'Nos entraînements')

@section('content')
    <section class="relative h-[45vh] min-h-[320px] overflow-hidden">
        <img src="{{ $heroImage }}" alt="Entraînements" class="absolute inset-0 h-full w-full object-cover" loading="eager" width="1920" height="720">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
        <div class="relative flex h-full items-center justify-center">
            <h1 class="font-display text-4xl tracking-[0.2em] text-white md:text-6xl">NOS ENTRAÎNEMENTS</h1>
        </div>
    </section>

    <div class="mx-auto max-w-5xl px-4 py-20 sm:px-6 lg:px-8">
        <p class="mb-16 text-center text-xl font-medium text-neutral-600">Tous nos entraînements sont assurés par des professeurs diplômés d'état (DEJEPS Judo-ju-jitsu, CQP, F2 Lutte).</p>

        {{-- Horaires --}}
        <section class="animate-on-scroll mb-20">
            <h2 class="section-title">Les horaires</h2>
            <div class="mt-8 grid gap-6 md:grid-cols-2">
                @foreach($horaires as $h)
                <div class="card-go animate-on-scroll animate-delay-{{ min($loop->iteration, 4) }}">
                    <h3 class="font-display text-xl tracking-wider text-red-700">{{ $h->label }}</h3>
                    <p class="mt-2 text-2xl font-bold">{{ $h->jour }} {{ $h->heure_debut }} – {{ $h->heure_fin }}</p>
                </div>
                @endforeach
            </div>
        </section>

        {{-- Lieux --}}
        <section class="animate-on-scroll mb-20 border-t-2 border-black bg-neutral-100 py-16">
            <h2 class="section-title mb-12 text-center">Nos lieux d'entraînement</h2>
            <div class="grid gap-8 md:grid-cols-2">
                @foreach($lieux as $i => $lieu)
                <div class="card-go animate-on-scroll animate-delay-{{ min($loop->iteration, 4) }}">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="flex h-12 w-12 items-center justify-center bg-red-700 text-white">{{ $i + 1 }}</span>
                        <h3 class="font-display text-xl tracking-wider text-red-700">{{ $lieu->nom }}</h3>
                    </div>
                    <p class="text-neutral-600">{{ $lieu->description }}</p>
                </div>
                @endforeach
            </div>
        </section>

        {{-- Au programme + image Stock --}}
        <section class="animate-on-scroll grid gap-12 lg:grid-cols-2 lg:items-center">
            <div>
                <h2 class="section-title">Au programme</h2>
                <div class="mt-8 space-y-4 text-lg leading-relaxed text-neutral-700">
                    <p>Les cours sont adaptés suivant votre niveau et vos objectifs. Projeter, contrôler et soumettre.</p>
                    <p>Dès la première séance, l'adrénaline du combat s'associe à une activité de stratège.</p>
                    <p class="font-bold text-black">Nos encadrants cumulent à eux 3 près de 140 années de tatamis !</p>
                </div>
            </div>
            <img src="{{ $programmeImage }}" alt="BJJ" loading="lazy" class="w-full rounded-lg border-2 border-black object-cover shadow-[8px_8px_0_0_#000]" width="800" height="600">
        </section>
    </div>
@endsection
