@extends('layouts.app')

@section('title', 'Nous rejoindre')

@section('content')
    <section class="relative h-[45vh] min-h-[320px] overflow-hidden">
        <img src="{{ $heroImage }}" alt="Rejoignez-nous" class="absolute inset-0 h-full w-full object-cover" loading="eager" width="1920" height="720">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
        <div class="relative flex h-full items-center justify-center">
            <h1 class="font-display text-4xl tracking-[0.2em] text-white md:text-6xl">NOUS REJOINDRE</h1>
        </div>
    </section>

    <div class="mx-auto max-w-5xl px-4 py-20 sm:px-6 lg:px-8">
        <section class="animate-on-scroll mb-20">
            <h2 class="section-title">Les modalités d'inscription</h2>
            <div class="mt-8 space-y-6 text-lg leading-relaxed text-neutral-700">
                <p>Les cours de JJB débutent à partir de 14 ans.</p>
                <p>Le coût global couvre la cotisation club, l'assurance et la licence CFJJB. Possibilité de licence FFJDA pour le circuit Ne Waza et le passage de grades judo.</p>
                <p>Chaque adhérent s'engage à respecter le règlement et engage sa responsabilité vis-à-vis de ses partenaires.</p>
                <div class="flex flex-wrap gap-4 pt-6">
                    <a href="#" class="btn-go !px-6 !py-2 !text-base">Fiche d'inscription ACJB</a>
                    <a href="https://cfjjb.com/docs/reglement_CFJJB_v5.2_2021.pdf" target="_blank" rel="noopener" class="inline-block border-2 border-black px-6 py-2 font-semibold transition hover:bg-black hover:text-white">Règlement CFJJB</a>
                    <a href="https://www.grappling-france.com/competition/r%C3%A8gles/" target="_blank" rel="noopener" class="inline-block border-2 border-black px-6 py-2 font-semibold transition hover:bg-black hover:text-white">Règles Grappling</a>
                </div>
            </div>
        </section>

        {{-- Tarifs --}}
        <section class="animate-on-scroll">
            <h2 class="section-title">Nos tarifs</h2>
            <div class="mt-12 grid gap-8 md:grid-cols-2">
                @foreach($tarifs as $tarif)
                <div class="card-go animate-on-scroll border-red-700 bg-red-50 animate-delay-{{ min($loop->iteration, 4) }}">
                    <h3 class="font-display text-2xl tracking-wider text-red-700">{{ $tarif->label }}</h3>
                    <ul class="mt-6 space-y-3 border-t-2 border-black pt-6 text-neutral-700">
                        <li class="flex justify-between"><span>Cours d'essai</span><strong class="text-black">{{ $tarif->cours_essai }}</strong></li>
                        <li class="flex justify-between"><span>Trimestre</span><strong>{{ $tarif->trimestre }}</strong></li>
                        <li class="flex justify-between"><span>Année</span><strong>{{ $tarif->annee }}</strong></li>
                        @if($tarif->licence_ffjda)
                        <li class="flex justify-between"><span>Licence FFJDA</span><strong>{{ $tarif->licence_ffjda }}</strong></li>
                        @endif
                    </ul>
                </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
