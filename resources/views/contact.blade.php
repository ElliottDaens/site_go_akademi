@extends('base')

@section('title', 'Contact')

@push('styles')
<style>
    /* Floating label animation */
    .float-field { position: relative; }
    .float-field input, .float-field textarea {
        width: 100%; padding: 1.25rem 1rem 0.5rem; border: 1px solid #e2e8f0; border-radius: 0.75rem;
        font-size: 0.95rem; background: #fff; color: #0f172a; transition: border-color .2s, box-shadow .2s;
    }
    .float-field label {
        position: absolute; left: 1rem; top: 50%; transform: translateY(-50%);
        font-size: 0.95rem; color: #94a3b8; pointer-events: none;
        transition: all .2s ease;
    }
    .float-field textarea ~ label { top: 1.25rem; transform: none; }
    .float-field input:focus, .float-field textarea:focus {
        outline: none; border-color: #334155; box-shadow: 0 0 0 3px rgba(51,65,85,.08);
    }
    .float-field input:focus ~ label, .float-field input:not(:placeholder-shown) ~ label,
    .float-field textarea:focus ~ label, .float-field textarea:not(:placeholder-shown) ~ label {
        top: 0.5rem; transform: none; font-size: 0.7rem; font-weight: 600;
        color: #475569; letter-spacing: 0.03em; text-transform: uppercase;
    }
    /* Dark mode */
    html.dark .float-field input, html.dark .float-field textarea {
        background: #0f172a !important; border-color: #334155 !important; color: #f1f5f9 !important;
    }
    html.dark .float-field input:focus, html.dark .float-field textarea:focus {
        border-color: #64748b !important; box-shadow: 0 0 0 3px rgba(100,116,139,.15) !important;
    }
    html.dark .float-field label { color: #64748b !important; }
    html.dark .float-field input:focus ~ label, html.dark .float-field input:not(:placeholder-shown) ~ label,
    html.dark .float-field textarea:focus ~ label, html.dark .float-field textarea:not(:placeholder-shown) ~ label {
        color: #94a3b8 !important;
    }
    /* Contact card hover */
    .contact-card {
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .contact-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px -5px rgba(0,0,0,.08);
    }
    /* Send button animation */
    .send-btn { position: relative; overflow: hidden; }
    .send-btn::after {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,.15), transparent);
        transform: translateX(-100%);
        transition: transform .5s ease;
    }
    .send-btn:hover::after { transform: translateX(100%); }

    /* Glassmorphism formulaire */
    .form-glass {
        background: rgba(255,255,255,.85);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255,255,255,.5);
        box-shadow: 0 8px 32px -8px rgba(0,0,0,.08), inset 0 1px 0 rgba(255,255,255,.8);
    }
    html.dark .form-glass {
        background: rgba(30,41,59,.85);
        border-color: rgba(71,85,105,.4);
        box-shadow: 0 8px 32px -8px rgba(0,0,0,.3), inset 0 1px 0 rgba(255,255,255,.05);
    }

    /* Map hero style */
    .map-hero {
        background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 50%, #94a3b8 100%);
        position: relative;
        overflow: hidden;
    }
    .map-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(15,23,42,.15) 0%, transparent 50%, rgba(15,23,42,.25) 100%);
        pointer-events: none;
    }
    .map-hero .map-content { position: relative; z-index: 1; }
    html.dark .map-hero {
        background: linear-gradient(135deg, #1e293b 0%, #334155 50%, #0f172a 100%);
    }
    html.dark .map-hero::before {
        background: linear-gradient(180deg, rgba(0,0,0,.2) 0%, transparent 50%, rgba(0,0,0,.4) 100%);
    }

    /* Reveal cohérent accueil/CV */
    .contact-reveal { opacity: 0; transform: translateY(16px); transition: opacity .5s ease, transform .5s ease; }
    .contact-reveal.in-view { opacity: 1; transform: translateY(0); }
</style>
@endpush

@section('content')

{{-- Hero : même structure que About / Projets --}}
<section class="py-20 md:py-28">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="text-muted mb-4 text-sm font-medium uppercase tracking-widest text-slate-400 dark:text-slate-500">Contact</p>
            <h1 class="mb-6 text-4xl font-bold leading-tight text-slate-900 dark:text-slate-100 md:text-5xl lg:text-6xl">
                Travaillons<br>
                <span class="subtitle text-slate-400 dark:text-slate-500">ensemble.</span>
            </h1>
            <p class="text-body text-lg leading-relaxed text-slate-600 dark:text-slate-400">
                Un projet, une question ou une opportunité ? N'hésitez pas à me contacter.
                Je réponds généralement sous 24h.
            </p>
        </div>
    </div>
</section>

{{-- Contenu --}}
<section class="pb-20">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[1fr,380px]">

            {{-- Formulaire glassmorphism --}}
            <div class="contact-reveal">
                @if(session('success'))
                    <div class="alert-success mb-6 flex items-center gap-3 rounded-xl border px-5 py-4">
                        <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="form-glass form-card rounded-2xl p-8 sm:p-10">
                    <h2 class="mb-1 text-xl font-semibold text-slate-900 dark:text-slate-100">Envoyer un message</h2>
                    <p class="text-muted mb-8 text-sm text-slate-500 dark:text-slate-400">Tous les champs sont obligatoires.</p>

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid gap-6 sm:grid-cols-2">
                            <div class="float-field">
                                <input type="text" id="name" name="name" required value="{{ old('name') }}" placeholder=" ">
                                <label for="name">Nom complet</label>
                                @error('name')<p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div class="float-field">
                                <input type="email" id="email" name="email" required value="{{ old('email') }}" placeholder=" ">
                                <label for="email">Adresse email</label>
                                @error('email')<p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="float-field">
                            <input type="text" id="subject" name="subject" required value="{{ old('subject') }}" placeholder=" ">
                            <label for="subject">Sujet</label>
                            @error('subject')<p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="float-field">
                            <textarea id="message" name="message" required rows="5" placeholder=" ">{{ old('message') }}</textarea>
                            <label for="message">Votre message</label>
                            @error('message')<p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="send-btn btn-main w-full rounded-xl bg-slate-900 py-3.5 text-sm font-semibold text-white transition hover:bg-slate-700 dark:bg-white dark:text-slate-900 dark:hover:bg-slate-200">
                            Envoyer le message &nbsp;&rarr;
                        </button>
                    </form>
                </div>
            </div>

            {{-- Sidebar infos --}}
            <div class="contact-reveal space-y-6 lg:pt-16">
                {{-- Map hero style --}}
                <div class="contact-reveal map-hero overflow-hidden rounded-2xl shadow-lg" style="height: 220px;">
                    <div class="map-content flex h-full items-center justify-center">
                        <div class="text-center">
                            <p class="text-4xl opacity-90">&#9906;</p>
                            <p class="mt-2 text-lg font-semibold text-slate-800 dark:text-slate-200">Calais, France</p>
                            <p class="text-sm text-slate-600 dark:text-slate-400">Hauts‑de‑France</p>
                        </div>
                    </div>
                </div>

                {{-- Cartes info --}}
                @foreach([
                    ['&#9993;', 'Email', 'daenselliott691@gmail.com', 'mailto:daenselliott691@gmail.com'],
                    ['&#9743;', 'Téléphone', '07 87 76 54 19', 'tel:+33787765419'],
                ] as [$icon, $title, $value, $href])
                <a href="{{ $href }}" class="contact-card card-item flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5 dark:border-slate-700 dark:bg-slate-800">
                    <div class="card-img flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-xl dark:bg-slate-700">
                        {!! $icon !!}
                    </div>
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-400 dark:text-slate-500">{{ $title }}</p>
                        <p class="mt-0.5 font-medium text-slate-900 dark:text-slate-100">{{ $value }}</p>
                    </div>
                </a>
                @endforeach

                {{-- Réseaux --}}
                <div class="card-item rounded-2xl border border-slate-200 bg-white p-5 dark:border-slate-700 dark:bg-slate-800">
                    <p class="mb-3 text-xs font-medium uppercase tracking-wider text-slate-400 dark:text-slate-500">Réseaux</p>
                    <div class="flex gap-3">
                        @foreach([
                            ['GitHub', 'https://github.com/ElliottDaens'],
                            ['LinkedIn', 'https://linkedin.com/in/elliottdaens'],
                            ['Portfolio', 'https://daens-elliott.fr'],
                        ] as [$label, $url])
                        <a href="{{ $url }}" target="_blank" rel="noopener" class="tag-item flex-1 rounded-xl border border-slate-200 bg-slate-50 py-2.5 text-center text-xs font-semibold text-slate-700 transition hover:bg-slate-100 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-300 dark:hover:bg-slate-600">
                            {{ $label }}
                        </a>
                        @endforeach
                    </div>
                </div>

                {{-- Disponibilité --}}
                <div class="card-item flex items-center gap-3 rounded-2xl border border-slate-200 bg-white p-5 dark:border-slate-700 dark:bg-slate-800">
                    <span class="relative flex h-3 w-3">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-amber-400 opacity-75"></span>
                        <span class="relative inline-flex h-3 w-3 rounded-full bg-amber-500"></span>
                    </span>
                    <p class="text-sm text-slate-600 dark:text-slate-400">
                        <strong class="text-slate-900 dark:text-slate-100">En stage</strong> à l'Académie Calaisienne de Jiu-Jitsu Brésilien
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
(function(){
  function inView(el){ var r = el.getBoundingClientRect(); return r.top < (window.innerHeight || document.documentElement.clientHeight) - 80 && r.bottom > 0; }
  function check(){ document.querySelectorAll('.contact-reveal').forEach(function(el){ if(inView(el)) el.classList.add('in-view'); }); }
  window.addEventListener('scroll', check, { passive: true });
  window.addEventListener('load', check);
  check();
})();
</script>
@endpush

@endsection
