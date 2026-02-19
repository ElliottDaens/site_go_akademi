@extends('layouts.app')

@section('title', "L'Académie Calaisienne de JJB")

@section('content')
    <section class="relative h-[50vh] min-h-[350px] overflow-hidden">
        <img src="{{ $heroImage }}" alt="L'Académie" class="absolute inset-0 h-full w-full object-cover" loading="eager" width="1920" height="720">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
        <div class="relative flex h-full flex-col items-center justify-center px-4 text-center">
            <h1 class="font-display text-4xl tracking-[0.2em] text-white md:text-6xl lg:text-7xl">L'ACADÉMIE</h1>
            <p class="mt-2 font-display text-2xl tracking-[0.15em] text-red-400 md:text-3xl">CALAISIENNE DE JJB</p>
        </div>
    </section>

    <div class="mx-auto max-w-5xl px-4 py-20 sm:px-6 lg:px-8">
        <section class="mb-20">
            <h2 class="animate-on-scroll section-title">Le Jiu Jitsu Brésilien, c'est quoi ?</h2>
            <div class="mt-8 grid gap-8 lg:grid-cols-2 lg:items-center">
                <img src="{{ $jjbImage }}" alt="JJB" loading="lazy" class="animate-on-scroll order-2 w-full rounded-lg border-2 border-black object-cover shadow-[6px_6px_0_0_#000] lg:order-1 animate-delay-1" width="1024" height="768">
                <div class="animate-on-scroll order-1 space-y-4 text-lg leading-relaxed text-neutral-700 lg:order-2 animate-delay-2">
                    <p>Le jiu jitsu brésilien (JJB) est un art martial, un système de défense personnel et un sport de combat. Il associe le judo et la lutte dans sa phase debout. L'activité principale se concentre au sol où il s'agit de prendre une position dominante pour contrôler, soumettre par clé ou étrangler son adversaire.</p>
                    <p>C'est en 1904 que MAEDA, disciple de JIGORO KANO, fondateur du Judo, part pour le continent américain. Il finit par poser ses valises au Brésil en 1917 où il se lie à une riche famille : les GRACIE.</p>
                </div>
            </div>
        </section>

        <section class="animate-on-scroll mb-20 border-t-2 border-black bg-neutral-100 py-16">
            <div class="mx-auto max-w-4xl text-center">
                <h2 class="section-title">Le JJB sportif en plein essor en Europe</h2>
                <p class="mt-6 text-lg leading-relaxed text-neutral-700">Le JJB est très populaire au Brésil, aux Etats-Unis, au Japon et commence à prendre de l'ampleur en Europe. L'une des raisons tient au développement du combat libre, autrement dit le Mixed Martial Arts ou MMA.</p>
            </div>
        </section>

        <section class="animate-on-scroll mb-20">
            <h2 class="section-title">Pourquoi la Go Akademi ?</h2>
            <div class="mt-8 space-y-6 text-lg leading-relaxed text-neutral-700">
                <p>Une vitrine très JJB, nous en reprenons la culture et ses codes. Une culture que nous avons appris à connaître avec mes deux complices Helmut et Fabrice que vous croiserez assurément. Cette académie sent bon le Japon : <strong class="text-red-700">GO</strong> ! Ce cinq et sa symbolique bouddhique — nombre de la perfection, symbole d'union et de force.</p>
                <p>L'Union des trois arts martiaux au sein de nos clubs, l'ACJB et le KJC : sur notre tatami tous les genres se rejoignent pour pratiquer les arts du sol.</p>
            </div>
        </section>

        <section class="animate-on-scroll mb-16">
            <h2 class="section-title">Nos encadrants</h2>
            <p class="mt-4 text-lg font-medium text-neutral-600">Les cours sont encadrés par des professeurs diplômés d'état (DEJEPS).</p>

            <div class="mt-12 grid gap-8 md:grid-cols-3">
                @foreach($encadrants as $e)
                @php
                    $initiales = collect(explode(' ', $e->nom))->map(fn($p) => mb_substr($p, 0, 1))->take(2)->implode('');
                @endphp
                <div class="card-go animate-on-scroll animate-delay-{{ min($loop->iteration, 4) }}">
                    <div class="flex aspect-square items-center justify-center border-2 border-black {{ $loop->first ? 'bg-red-700 text-white' : 'bg-black text-red-500' }} text-6xl font-display font-bold">
                        {{ $initiales }}
                    </div>
                    <h3 class="mt-6 font-display text-xl tracking-wider text-red-700">{{ $e->nom }}</h3>
                    <p class="text-sm font-bold uppercase text-black">{{ str_replace('_', ' ', $e->role) }}</p>
                    <ul class="mt-4 space-y-2 border-t-2 border-black pt-4 text-sm text-neutral-600">
                        @foreach($e->qualifications as $q)
                        @if($q)
                        <li>• {{ $q }}</li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </section>

        <div class="text-center">
            <a href="{{ route('rejoindre') }}" class="btn-go">Consultez les modalités d'inscription</a>
        </div>
    </div>
@endsection
