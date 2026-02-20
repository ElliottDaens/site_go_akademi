@extends('base')

@section('title', 'À propos')

@section('content')

{{-- Hero : même structure que Contact / Projets --}}
<section class="py-20 md:py-28">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="text-muted mb-4 text-sm font-medium uppercase tracking-widest text-slate-400 dark:text-slate-500">À propos</p>
            <h1 class="mb-6 text-4xl font-bold leading-tight text-slate-900 dark:text-slate-100 md:text-5xl lg:text-6xl">
                Je crée des expériences<br>
                <span class="subtitle text-slate-400 dark:text-slate-500">web &amp; communication.</span>
            </h1>
            <p class="text-body text-lg leading-relaxed text-slate-600 dark:text-slate-400">
                Étudiant en DEUST Webmaster et métiers de l'Internet à Calais,
                je développe des sites web et gère la communication digitale pour des structures variées.
            </p>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="section-alt border-y border-slate-200 py-20 dark:border-slate-700">
    <div class="mx-auto grid max-w-5xl grid-cols-2 divide-x divide-slate-200 dark:divide-slate-700 md:grid-cols-4">
        @foreach([['2+', 'Années de formation'], ['5+', 'Projets réalisés'], ['2', 'Stages en entreprise'], ['10+', 'Technologies maîtrisées']] as [$val, $label])
        <div class="stat-item px-6 py-10 text-center">
            <p class="stat-value text-3xl font-bold text-slate-900 dark:text-slate-100">{{ $val }}</p>
            <p class="stat-label mt-1 text-sm text-slate-500 dark:text-slate-400">{{ $label }}</p>
        </div>
        @endforeach
    </div>
</section>

<section class="py-20">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-16 lg:grid-cols-2">
            <div>
                <h2 class="mb-6 text-2xl font-bold text-slate-900 dark:text-slate-100">Mon parcours</h2>
                <div class="text-body space-y-4 leading-relaxed text-slate-600 dark:text-slate-400">
                    <p>Passionné par le web et la communication depuis plusieurs années, j'ai choisi de me former au développement web et à la gestion de projets digitaux.</p>
                    <p>Mes stages — à la <strong>Mairie de Calais</strong> et à l'<strong>Académie Calaisienne de Jiu Jitsu Brésilien</strong> — m'ont permis de travailler sur des projets concrets alliant code et stratégie de communication.</p>
                    <p>Autonome et curieux, je suis toujours à la recherche de nouveaux défis.</p>
                </div>
            </div>
            <div>
                <h2 class="mb-6 text-2xl font-bold text-slate-900 dark:text-slate-100">Ce que je fais</h2>
                <div class="space-y-6">
                    @foreach([['&#9997;', 'Développement web', 'Sites vitrines, applications, back-ends en PHP/Laravel'], ['&#9733;', 'Design & intégration', 'Maquettes, responsive, HTML/CSS/Tailwind'], ['&#9881;', 'Communication digitale', 'Réseaux sociaux, supports print, Suite Adobe']] as [$icon, $title, $desc])
                    <div class="flex gap-4">
                        <div class="card-img flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-lg dark:bg-slate-700">{!! $icon !!}</div>
                        <div>
                            <h3 class="font-medium text-slate-900 dark:text-slate-100">{{ $title }}</h3>
                            <p class="text-muted mt-1 text-sm text-slate-500 dark:text-slate-400">{{ $desc }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-alt border-t border-slate-200 bg-slate-50 py-20 dark:border-slate-700 dark:bg-slate-900/50">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <h2 class="mb-10 text-center text-2xl font-bold text-slate-900 dark:text-slate-100">Technologies</h2>
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-4">
            @foreach(['HTML / CSS', 'JavaScript', 'PHP', 'Laravel', 'Vue.js', 'WordPress', 'MySQL', 'Git', 'Docker', 'Tailwind CSS', 'Suite Adobe', 'VS Code'] as $tech)
            <div class="tag-item flex items-center gap-3 rounded-xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-800">
                <span class="text-sm font-medium text-slate-700 dark:text-slate-300">{{ $tech }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20">
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
        <h2 class="mb-12 text-center text-2xl font-bold text-slate-900 dark:text-slate-100">Expériences &amp; formations</h2>
        <div class="relative">
            <div class="timeline-line absolute left-4 top-0 bottom-0 w-px bg-slate-200 dark:bg-slate-700 md:left-1/2"></div>
            @php $index = 0; @endphp
            @foreach($experiences as $e)
            <div class="relative mb-12 flex items-start gap-8">
                <div class="timeline-dot absolute left-4 z-10 -ml-1.5 h-3 w-3 rounded-full border-2 border-white bg-slate-900 dark:border-slate-800 dark:bg-slate-100 md:left-1/2"></div>
                <div class="timeline-card ml-12 w-full rounded-xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-800 md:ml-0 md:w-[calc(50%-2rem)] {{ $index % 2 === 0 ? '' : 'md:ml-auto' }}">
                    <p class="text-muted mb-1 text-xs font-medium uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        {{ $e->date_debut?->format('m/Y') ?? '?' }}@if($e->en_cours) — Présent @else — {{ $e->date_fin?->format('m/Y') ?? '?' }}@endif
                    </p>
                    <h3 class="font-semibold text-slate-900 dark:text-slate-100">{{ $e->titre }}</h3>
                    @if($e->entreprise)<p class="text-muted mt-1 text-sm text-slate-500 dark:text-slate-400">{{ $e->entreprise }}@if($e->lieu) · {{ $e->lieu }}@endif</p>@endif
                    @if($e->description)<p class="text-body mt-2 text-sm leading-relaxed text-slate-600 dark:text-slate-400">{{ $e->description }}</p>@endif
                </div>
            </div>
            @php $index++; @endphp
            @endforeach
            @foreach($formations as $f)
            <div class="relative mb-12 flex items-start gap-8">
                <div class="timeline-dot absolute left-4 z-10 -ml-1.5 h-3 w-3 rounded-full border-2 border-white bg-slate-400 dark:border-slate-800 dark:bg-slate-400 md:left-1/2"></div>
                <div class="timeline-card ml-12 w-full rounded-xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-800 md:ml-0 md:w-[calc(50%-2rem)] {{ $index % 2 === 0 ? '' : 'md:ml-auto' }}">
                    <p class="text-muted mb-1 text-xs font-medium uppercase tracking-wider text-slate-400 dark:text-slate-500">{{ $f->date_debut?->format('Y') ?? '?' }} — {{ $f->date_fin?->format('Y') ?? '?' }}</p>
                    <h3 class="font-semibold text-slate-900 dark:text-slate-100">{{ $f->titre }}</h3>
                    @if($f->etablissement)<p class="text-muted mt-1 text-sm text-slate-500 dark:text-slate-400">{{ $f->etablissement }}@if($f->lieu) · {{ $f->lieu }}@endif</p>@endif
                    @if($f->description)<p class="text-body mt-2 text-sm leading-relaxed text-slate-600 dark:text-slate-400">{{ $f->description }}</p>@endif
                </div>
            </div>
            @php $index++; @endphp
            @endforeach
        </div>
    </div>
</section>

<section class="section-alt border-t border-slate-200 bg-slate-50 py-20 text-center dark:border-slate-700 dark:bg-slate-900/50">
    <p class="text-body mb-6 text-lg text-slate-600 dark:text-slate-400">Envie de travailler ensemble ?</p>
    <a href="{{ route('contact') }}" class="btn-main inline-flex rounded-lg bg-slate-900 px-6 py-3 text-sm font-medium text-white transition hover:bg-slate-700 dark:bg-white dark:text-slate-900 dark:hover:bg-slate-200">
        Me contacter
    </a>
</section>
@endsection
