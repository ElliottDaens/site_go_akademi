@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <section class="relative h-[45vh] min-h-[320px] overflow-hidden">
        <img src="{{ $heroImage }}" alt="Contact" class="absolute inset-0 h-full w-full object-cover" loading="eager" width="1920" height="720">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
        <div class="relative flex h-full items-center justify-center">
            <h1 class="font-display text-4xl tracking-[0.2em] text-white md:text-6xl">CONTACT</h1>
        </div>
    </section>

    <div class="mx-auto max-w-5xl px-4 py-20 sm:px-6 lg:px-8">
        @if(session('success'))
        <div class="mb-8 border-2 border-green-600 bg-green-50 p-4 font-semibold text-green-800">
            {{ session('success') }}
        </div>
        @endif

        <div class="grid gap-16 lg:grid-cols-2">
            <div class="animate-on-scroll">
                <h2 class="section-title">Des questions ?</h2>
                <div class="mt-8 card-go">
                    <div class="space-y-6">
                        <p class="flex items-center gap-4 text-lg">
                            <span class="flex h-12 w-12 shrink-0 items-center justify-center bg-red-700 text-white">📍</span>
                            <span class="font-semibold">62100 Calais</span>
                        </p>
                        <a href="tel:0627542416" class="flex items-center gap-4 text-lg transition hover:text-red-700">
                            <span class="flex h-12 w-12 shrink-0 items-center justify-center border-2 border-black text-xl">📞</span>
                            <span class="font-semibold">06 27 54 24 16</span>
                        </a>
                        <a href="mailto:Acjb62100@gmail.com" class="flex items-center gap-4 text-lg transition hover:text-red-700">
                            <span class="flex h-12 w-12 shrink-0 items-center justify-center border-2 border-black text-xl">✉</span>
                            <span class="font-semibold">Acjb62100@gmail.com</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="animate-on-scroll animate-delay-2">
                <h2 class="section-title">Écrivez-nous</h2>
                <form action="{{ route('contact.store') }}" method="POST" class="mt-8 space-y-6">
                    @csrf
                    <div>
                        <label for="nom" class="block font-semibold text-black">Votre nom *</label>
                        <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required class="mt-2 w-full rounded-lg border-2 border-black px-4 py-3 transition focus:border-red-700 focus:outline-none focus:ring-2 focus:ring-red-700/30">
                        @error('nom')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="email" class="block font-semibold text-black">Votre email *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="mt-2 w-full rounded-lg border-2 border-black px-4 py-3 transition focus:border-red-700 focus:outline-none focus:ring-2 focus:ring-red-700/30">
                        @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="sujet" class="block font-semibold text-black">Sujet</label>
                        <input type="text" id="sujet" name="sujet" value="{{ old('sujet') }}" class="mt-2 w-full rounded-lg border-2 border-black px-4 py-3 transition focus:border-red-700 focus:outline-none focus:ring-2 focus:ring-red-700/30">
                    </div>
                    <div>
                        <label for="message" class="block font-semibold text-black">Votre demande</label>
                        <textarea id="message" name="message" rows="4" required class="mt-2 w-full rounded-lg border-2 border-black px-4 py-3 transition focus:border-red-700 focus:outline-none focus:ring-2 focus:ring-red-700/30">{{ old('message') }}</textarea>
                        @error('message')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="btn-go">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
