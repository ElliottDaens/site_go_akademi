@extends('base')

@section('title', 'CV')

@push('styles')
<style>
    /* Dot rating system */
    .dot-rating { display: flex; gap: 4px; }
    .dot-rating .dot {
        width: 10px; height: 10px; border-radius: 50%;
        background: #e2e8f0; transition: background .2s;
    }
    .dot-rating .dot.filled { background: #0f172a; }
    html.dark .dot-rating .dot { background: #334155 !important; }
    html.dark .dot-rating .dot.filled { background: #f1f5f9 !important; }

    /* Skill card hover */
    .skill-card {
        transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
    }
    .skill-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px -5px rgba(0,0,0,.06);
        border-color: #94a3b8;
    }
    html.dark .skill-card:hover { border-color: #64748b !important; }

    /* Experience card with left accent */
    .exp-card {
        position: relative;
        padding-left: 1.5rem;
        border-left: 3px solid #e2e8f0;
        transition: border-color .2s ease;
    }
    .exp-card:hover { border-left-color: #0f172a; }
    html.dark .exp-card { border-left-color: #334155 !important; }
    html.dark .exp-card:hover { border-left-color: #f1f5f9 !important; }

    /* Section number */
    .section-num {
        font-size: 5rem; font-weight: 800; line-height: 1;
        color: #f1f5f9; position: absolute; top: -0.5rem; left: 0;
        user-select: none; pointer-events: none;
    }
    html.dark .section-num { color: #1e293b !important; }

    /* Competence tag pill */
    .comp-pill {
        display: inline-flex; align-items: center; gap: 0.5rem;
        padding: 0.5rem 1rem; border-radius: 9999px;
        border: 1px solid #e2e8f0; background: #fff;
        font-size: 0.8125rem; font-weight: 500; color: #334155;
        transition: all .2s ease;
    }
    .comp-pill:hover { background: #f1f5f9; border-color: #cbd5e1; }
    html.dark .comp-pill { background: #1e293b !important; border-color: #334155 !important; color: #e2e8f0 !important; }
    html.dark .comp-pill:hover { background: #334155 !important; }

    /* Quality badge */
    .quality-badge {
        display: flex; align-items: center; gap: 0.625rem;
        padding: 0.75rem 1rem; border-radius: 0.75rem;
        border: 1px solid #f1f5f9; background: #fafafa;
        font-size: 0.8125rem; color: #475569;
        transition: background .2s ease;
    }
    .quality-badge:hover { background: #f1f5f9; }
    .quality-icon {
        width: 28px; height: 28px; border-radius: 0.5rem;
        background: #f1f5f9; display: flex; align-items: center; justify-content: center;
        font-size: 0.8rem;
    }
    html.dark .quality-badge { background: #1e293b !important; border-color: #334155 !important; color: #e2e8f0 !important; }
    html.dark .quality-badge:hover { background: #334155 !important; }
    html.dark .quality-icon { background: #334155 !important; }

    /* CV cards grille (style projets) */
    .cv-exp-card {
        transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
    }
    .cv-exp-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px -8px rgba(0,0,0,.08);
        border-color: #94a3b8;
    }
    html.dark .cv-exp-card:hover { border-color: #64748b !important; }

    /* Stagger fade-in (style cohérent accueil) */
    .cv-reveal { opacity: 0; transform: translateY(16px); transition: opacity .5s ease, transform .5s ease; }
    .cv-reveal.in-view { opacity: 1; transform: translateY(0); }
</style>
@endpush

@section('content')

{{-- Hero CV : même structure que Contact / About --}}
<section class="py-20 md:py-28">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-end gap-8 md:grid-cols-[1fr,auto]">
            <div>
                <p class="text-muted mb-4 text-sm font-medium uppercase tracking-widest text-slate-400 dark:text-slate-500">Curriculum Vitae</p>
                <h1 class="mb-6 text-4xl font-bold leading-tight text-slate-900 dark:text-slate-100 md:text-5xl lg:text-6xl">
                    Daens <span class="subtitle text-slate-400 dark:text-slate-500">Elliott</span>
                </h1>
                <p class="text-body text-lg leading-relaxed text-slate-600 dark:text-slate-400">Étudiant — DEUST Webmaster & métiers de l'Internet</p>
                <div class="mt-6 flex flex-wrap gap-3">
                    @foreach(['Calais', 'daenselliott691@gmail.com', '07 87 76 54 19'] as $info)
                    <span class="tag-item rounded-full border border-slate-200 bg-slate-50 px-4 py-1.5 text-xs font-medium text-slate-600 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-300">{{ $info }}</span>
                    @endforeach
                </div>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('contact') }}" class="btn-main inline-flex rounded-xl bg-slate-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-700 dark:bg-white dark:text-slate-900 dark:hover:bg-slate-200">Me contacter</a>
                <a href="{{ route('projets') }}" class="btn-outline inline-flex rounded-xl border border-slate-300 px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100 dark:border-slate-600 dark:text-slate-300 dark:hover:bg-slate-700">Projets</a>
            </div>
        </div>
    </div>
</section>

{{-- Compétences techniques — Grille style projets --}}
<section class="cv-reveal section-alt border-t border-slate-200 bg-slate-50 py-20 dark:border-slate-700 dark:bg-slate-900/50">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="mb-12 text-center">
            <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Compétences techniques</h2>
            <p class="text-muted mt-2 text-sm text-slate-500 dark:text-slate-400">Niveau évalué sur 5</p>
        </div>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach([
                ['HTML / CSS', 5, '&#9998;'],
                ['PHP / Laravel', 4, '&#9881;'],
                ['JavaScript', 4, '&#9889;'],
                ['WordPress', 4, '&#9733;'],
                ['MySQL', 3, '&#9776;'],
                ['Git', 3, '&#10562;'],
                ['Tailwind CSS', 4, '&#10024;'],
                ['Vue.js', 3, '&#9670;'],
                ['API REST', 3, '&#8644;'],
            ] as [$skill, $dots, $icon])
            <div class="skill-card card-item flex items-center justify-between rounded-xl border border-slate-200 bg-white px-5 py-4 dark:border-slate-700 dark:bg-slate-800">
                <div class="flex items-center gap-3">
                    <span class="text-lg text-slate-400 dark:text-slate-500">{!! $icon !!}</span>
                    <span class="text-sm font-semibold text-slate-900 dark:text-slate-100">{{ $skill }}</span>
                </div>
                <div class="dot-rating">
                    @for($i = 1; $i <= 5; $i++)
                    <span class="dot {{ $i <= $dots ? 'filled' : '' }}"></span>
                    @endfor
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Expériences : grille cards style projets --}}
<section class="cv-reveal relative py-20">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <h2 class="mb-12 text-2xl font-bold text-slate-900 dark:text-slate-100">Expériences professionnelles</h2>
        <div class="grid gap-6 sm:grid-cols-2">
            @forelse($experiences as $e)
            <div class="cv-exp-card card-item rounded-xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-800">
                <p class="text-muted mb-2 text-xs font-medium uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    {{ $e->date_debut?->format('m/Y') ?? '?' }}@if($e->en_cours) — Présent @else — {{ $e->date_fin?->format('m/Y') ?? '?' }}@endif
                </p>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">{{ $e->titre }}</h3>
                @if($e->entreprise)
                <p class="text-muted mt-1 text-sm font-medium text-slate-500 dark:text-slate-400">{{ $e->entreprise }}@if($e->lieu) · {{ $e->lieu }}@endif</p>
                @endif
                @if($e->description)
                <p class="text-body mt-3 text-sm leading-relaxed text-slate-600 dark:text-slate-400">{{ $e->description }}</p>
                @endif
            </div>
            @empty
            <p class="text-muted col-span-full text-sm text-slate-500 dark:text-slate-400">Aucune expérience renseignée.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- Formations : grille cards --}}
<section class="cv-reveal section-alt border-t border-slate-200 bg-slate-50 py-20 dark:border-slate-700 dark:bg-slate-900/50">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <h2 class="mb-12 text-2xl font-bold text-slate-900 dark:text-slate-100">Formations</h2>
        <div class="grid gap-6 sm:grid-cols-2">
            @forelse($formations as $f)
            <div class="cv-exp-card card-item rounded-xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-800">
                <p class="text-muted mb-2 text-xs font-medium uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    {{ $f->date_debut?->format('Y') ?? '?' }} — {{ $f->date_fin?->format('Y') ?? '?' }}
                </p>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">{{ $f->titre }}</h3>
                @if($f->etablissement)
                <p class="text-muted mt-1 text-sm font-medium text-slate-500 dark:text-slate-400">{{ $f->etablissement }}@if($f->lieu) · {{ $f->lieu }}@endif</p>
                @endif
                @if($f->description)
                <p class="text-body mt-3 text-sm leading-relaxed text-slate-600 dark:text-slate-400">{{ $f->description }}</p>
                @endif
            </div>
            @empty
            <p class="text-muted col-span-full text-sm text-slate-500 dark:text-slate-400">Aucune formation renseignée.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- Outils & Qualités — 2 colonnes --}}
<section class="cv-reveal py-20">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-16 md:grid-cols-2">
            {{-- Outils --}}
            <div>
                <h2 class="mb-6 text-2xl font-bold text-slate-900 dark:text-slate-100">Outils & logiciels</h2>
                <div class="flex flex-wrap gap-2">
                    @foreach([
                        ['VS Code', '&#9998;'], ['Docker', '&#9881;'], ['Figma', '&#9670;'],
                        ['Suite Adobe', '&#10024;'], ['Git', '&#10562;'], ['Linux', '&#9654;'],
                        ['Trello', '&#9776;'], ['Postman', '&#8644;'], ['phpMyAdmin', '&#9776;'],
                    ] as [$tool, $icon])
                    <span class="comp-pill">{!! $icon !!} {{ $tool }}</span>
                    @endforeach
                </div>
            </div>
            {{-- Qualités --}}
            <div>
                <h2 class="mb-6 text-2xl font-bold text-slate-900 dark:text-slate-100">Qualités</h2>
                <div class="grid grid-cols-2 gap-3">
                    @foreach([
                        ['Autonomie', '&#9733;'], ['Travail en équipe', '&#9734;'],
                        ['Curiosité technique', '&#9889;'], ['Communication', '&#9993;'],
                        ['Rigueur', '&#10003;'], ['Adaptabilité', '&#8644;'],
                    ] as [$qual, $icon])
                    <div class="quality-badge">
                        <span class="quality-icon">{!! $icon !!}</span>
                        {{ $qual }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Langues --}}
<section class="cv-reveal section-alt border-t border-slate-200 bg-slate-50 py-20 dark:border-slate-700 dark:bg-slate-900/50">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <h2 class="mb-8 text-center text-2xl font-bold text-slate-900 dark:text-slate-100">Langues</h2>
        <div class="mx-auto flex max-w-md justify-center gap-8">
            @foreach([['Français', 'Natif', 5], ['Anglais', 'Intermédiaire', 3]] as [$lang, $level, $dots])
            <div class="text-center">
                <p class="text-lg font-semibold text-slate-900 dark:text-slate-100">{{ $lang }}</p>
                <p class="text-muted mt-1 text-sm text-slate-500 dark:text-slate-400">{{ $level }}</p>
                <div class="dot-rating mt-2 justify-center">
                    @for($i = 1; $i <= 5; $i++)
                    <span class="dot {{ $i <= $dots ? 'filled' : '' }}"></span>
                    @endfor
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA : même style que About --}}
<section class="section-alt border-t border-slate-200 bg-slate-50 py-20 text-center dark:border-slate-700 dark:bg-slate-900/50">
    <p class="text-body mb-6 text-lg text-slate-600 dark:text-slate-400">Intéressé par mon profil ?</p>
    <a href="{{ route('contact') }}" class="btn-main inline-flex rounded-lg bg-slate-900 px-6 py-3 text-sm font-medium text-white transition hover:bg-slate-700 dark:bg-white dark:text-slate-900 dark:hover:bg-slate-200">
        Me contacter &nbsp;&rarr;
    </a>
</section>

@push('scripts')
<script>
(function(){
  function inView(el){ var r = el.getBoundingClientRect(); return r.top < (window.innerHeight || document.documentElement.clientHeight) - 80 && r.bottom > 0; }
  function check(){ document.querySelectorAll('.cv-reveal').forEach(function(el){ if(inView(el)) el.classList.add('in-view'); }); }
  window.addEventListener('scroll', check, { passive: true });
  window.addEventListener('load', check);
  check();
})();
</script>
@endpush

@endsection
