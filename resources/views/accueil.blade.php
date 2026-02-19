@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    {{-- Hero pleine hauteur : gradient + CTA sticky --}}
    <section class="relative min-h-[85vh] overflow-hidden">
        <img src="{{ $heroImage }}" alt="Go Akademi - Jiu Jitsu Brésilien" class="absolute inset-0 h-full w-full object-cover" loading="eager" width="1920" height="1080">
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-transparent to-black/70"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
        <div class="animate-hero relative flex min-h-[85vh] flex-col items-center justify-center px-4 text-center text-white">
            <img src="{{ asset('images/Logo carré blanc.png') }}" alt="" class="animate-hero-item mb-6 h-24 w-24 object-contain drop-shadow-lg" width="96" height="96" loading="eager">
            <h1 class="animate-hero-item font-display text-6xl tracking-[0.3em] md:text-8xl">GO AKADEMI</h1>
            <p class="animate-hero-item mt-6 max-w-2xl text-lg font-medium tracking-widest text-red-400 md:text-xl">L'Académie Calaisienne</p>
            <p class="animate-hero-item mt-2 text-xl tracking-[0.2em] text-white/90">JJB · Kosen Judo · Luta Livre</p>
            <a href="{{ route('presentation') }}" class="animate-hero-item mt-12 inline-block rounded-lg border-2 border-white px-8 py-3 font-display text-lg tracking-wider text-white transition hover:bg-white hover:text-black focus:outline-none focus-visible:ring-2 focus-visible:ring-white">Découvrir</a>
        </div>
    </section>

    {{-- Intro bande rouge --}}
    <section class="animate-on-scroll border-y-2 border-black bg-red-700 py-16 text-white sm:py-20">
        <div class="mx-auto max-w-5xl px-4 text-center">
            <h2 class="font-display text-2xl tracking-[0.15em] md:text-3xl">{{ $introTitre }}</h2>
            @if($introTexte)
            <p class="mt-6 text-lg leading-relaxed text-white/95">
                {{ $introTexte }}
            </p>
            @endif
            <a href="{{ route('presentation') }}" class="mt-8 inline-block rounded-lg border-2 border-white px-8 py-3 font-display text-lg tracking-wider text-white transition hover:bg-white hover:text-black focus:outline-none focus-visible:ring-2 focus-visible:ring-white">Découvrir l'académie</a>
        </div>
    </section>

    {{-- 3 cartes : entraînements, rejoindre, contact --}}
    @php
        $cartesAccueil = [
            ['image' => asset('images/Post 15-02 (1).png'), 'titre' => 'Nos entraînements', 'texte' => 'Horaires et lieux pour rejoindre le tatami.', 'route' => 'entrainements', 'lien' => 'Voir les horaires'],
            ['image' => asset('images/Post 15-02 (2).png'), 'titre' => 'Nous rejoindre', 'texte' => 'Modalités d\'inscription et tarifs.', 'route' => 'rejoindre', 'lien' => 'S\'inscrire'],
            ['image' => asset('images/cesar-millan-F2PTHpyMGGY-unsplash.jpg'), 'titre' => 'Contact', 'texte' => 'Une question ? Écrivez-nous.', 'route' => 'contact', 'lien' => 'Nous contacter'],
        ];
    @endphp
    <section class="bg-neutral-100 py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="animate-on-scroll section-title mb-16 text-center">Rejoignez le tatami</h2>
            <div class="grid gap-8 md:grid-cols-3">
                @foreach($cartesAccueil as $carte)
                <a href="{{ route($carte['route']) }}" class="group card-go animate-on-scroll block overflow-hidden rounded-xl p-0 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-600">
                    <div class="aspect-[4/3] overflow-hidden border-b-2 border-black">
                        <img src="{{ $carte['image'] }}" alt="{{ $carte['titre'] }}" loading="lazy" class="h-full w-full object-cover transition duration-300 group-hover:scale-105" width="800" height="600">
                    </div>
                    <div class="p-6">
                        <h3 class="font-display text-xl tracking-wider text-red-700">{{ $carte['titre'] }}</h3>
                        <p class="mt-2 text-sm font-medium text-neutral-600">{{ $carte['texte'] }}</p>
                        <span class="mt-4 inline-block font-semibold text-red-700 transition group-hover:underline">→ {{ $carte['lien'] }}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Bande CTA image --}}
    <section class="animate-on-scroll relative h-[50vh] min-h-[350px] overflow-hidden">
        <img src="{{ asset('images/jonathan-borba-Yf1SegAI84o-unsplash.jpg') }}" alt="BJJ" loading="lazy" decoding="async" class="absolute inset-0 h-full w-full object-cover" width="1920" height="600">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="relative flex h-full flex-col items-center justify-center px-4 text-center text-white">
            <p class="font-display text-3xl tracking-[0.2em] md:text-4xl">Sur le tatami, tous les genres se rejoignent</p>
            <a href="{{ route('rejoindre') }}" class="mt-8 inline-block rounded-lg border-2 border-white px-8 py-3 font-display text-lg tracking-wider text-white transition hover:bg-white hover:text-black focus:outline-none focus-visible:ring-2 focus-visible:ring-white">Rejoindre l'académie</a>
        </div>
    </section>
@endsection
