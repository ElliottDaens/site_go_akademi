@extends('base')

@section('title', 'Accueil')

@push('styles')
<style>
  /* Hero fullscreen + gradient animé */
  .hero-wrap {
    min-height: calc(100vh - 5rem);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 2rem 1rem 4rem;
    position: relative;
    overflow: hidden;
  }
  .hero-bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 25%, #f1f5f9 50%, #e2e8f0 75%, #f8fafc 100%);
    background-size: 400% 400%;
    animation: heroGradient 12s ease infinite;
    z-index: 0;
  }
  html.dark .hero-bg {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 25%, #0f172a 50%, #1e293b 75%, #0f172a 100%);
    background-size: 400% 400%;
  }
  @keyframes heroGradient {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
  }
  .hero-content { position: relative; z-index: 1; text-align: center; width: 100%; max-width: 36rem; }
  /* Typewriter */
  .typewriter-wrap {
    display: inline-block;
    margin-bottom: 1rem;
    min-height: 1.75rem;
  }
  .typewriter {
    overflow: hidden;
    white-space: nowrap;
    border-right: 3px solid #0f172a;
    animation: typing 2.8s steps(42) 0.3s 1 normal both, blink 0.5s step-end 5;
    display: inline-block;
    max-width: 0;
  }
  html.dark .typewriter { border-color: #f1f5f9; }
  @keyframes typing { to { max-width: 100%; } }
  @keyframes blink { 50% { border-color: transparent; } }
  /* Stats counter */
  .hero-stats {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 2rem 3rem;
    margin-top: 2.5rem;
    padding-top: 2rem;
    border-top: 1px solid rgba(148, 163, 184, 0.3);
  }
  html.dark .hero-stats { border-top-color: rgba(71, 85, 105, 0.5); }
  .hero-stat-value { font-size: 1.75rem; font-weight: 700; color: #0f172a; line-height: 1; }
  html.dark .hero-stat-value { color: #f1f5f9; }
  .hero-stat-label { font-size: 0.75rem; font-weight: 500; text-transform: uppercase; letter-spacing: 0.05em; color: #64748b; margin-top: 0.25rem; }
  html.dark .hero-stat-label { color: #94a3b8; }
  /* CTA 3D hover */
  .cta-3d {
    display: inline-flex;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    transform: perspective(800px) rotateX(0deg);
  }
  .cta-3d:hover {
    transform: perspective(800px) rotateX(-4deg) translateY(-2px);
    box-shadow: 0 12px 28px -8px rgba(0,0,0,0.2);
  }
  /* Scroll reveal */
  .reveal { opacity: 0; transform: translateY(24px); transition: opacity 0.6s ease, transform 0.6s ease; }
  .reveal.in-view { opacity: 1; transform: translateY(0); }
</style>
@endpush

@section('content')

{{-- Hero MASSIF : fullscreen, gradient animé, typewriter, stats, CTA 3D --}}
<section class="hero-wrap">
  <div class="hero-bg" aria-hidden="true"></div>
  <div class="hero-content">
    <p class="text-muted mb-3 text-sm font-medium uppercase tracking-widest text-slate-500 dark:text-slate-400">
      Bienvenue
    </p>
    <h1 class="mb-6 text-4xl font-bold leading-tight text-slate-900 dark:text-slate-100 md:text-5xl lg:text-6xl">
      Je suis Daens Elliott
    </h1>
    <div class="typewriter-wrap">
      <span class="typewriter text-lg font-medium text-slate-600 dark:text-slate-400">Développeur web &amp; communication · 2026</span>
    </div>
    <p class="text-body mx-auto mb-8 max-w-lg text-base leading-relaxed text-slate-600 dark:text-slate-400">
      Je crée des sites web et j'accompagne les projets en communication digitale.
      Basé à Calais, actuellement en stage à l'Académie Calaisienne de Jiu-Jitsu Brésilien.
    </p>

    {{-- Stats counter --}}
    <div class="hero-stats">
      <div class="text-center">
        <div class="hero-stat-value" data-count="{{ $projets_count ?? 0 }}">0</div>
        <div class="hero-stat-label">Projets</div>
      </div>
      <div class="text-center">
        <div class="hero-stat-value" data-count="15">0</div>
        <div class="hero-stat-label">k+ lignes de code</div>
      </div>
      <div class="text-center">
        <div class="hero-stat-value" data-count="2">0</div>
        <div class="hero-stat-label">Années de formation</div>
      </div>
    </div>

    <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
      <a href="{{ route('projets') }}" class="cta-3d btn-main rounded-lg bg-slate-900 px-6 py-3 text-sm font-medium text-white shadow-sm dark:bg-white dark:text-slate-900 dark:hover:bg-slate-200">
        Découvrir mes projets
      </a>
      <a href="{{ route('contact') }}" class="cta-3d btn-outline rounded-lg border border-slate-300 px-6 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100 dark:border-slate-600 dark:text-slate-300 dark:hover:bg-slate-700">
        Me contacter
      </a>
    </div>
  </div>
</section>

{{-- Compétences : section reveal --}}
<section class="reveal section-alt border-t border-slate-200 bg-slate-50 py-20 dark:border-slate-700 dark:bg-slate-900/50">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <h2 class="mb-12 text-center text-2xl font-bold text-slate-900 dark:text-slate-100">Compétences</h2>
        <div class="grid gap-6 sm:grid-cols-3">
            <div class="card-item rounded-xl border border-slate-200 bg-white p-6 text-center shadow-sm transition hover:shadow-md hover:-translate-y-0.5 dark:border-slate-700 dark:bg-slate-800">
                <h3 class="mb-2 font-medium text-slate-900 dark:text-slate-100">Frontend</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">HTML, CSS, JavaScript, Vue.js, React, Tailwind</p>
            </div>
            <div class="card-item rounded-xl border border-slate-200 bg-white p-6 text-center shadow-sm transition hover:shadow-md hover:-translate-y-0.5 dark:border-slate-700 dark:bg-slate-800">
                <h3 class="mb-2 font-medium text-slate-900 dark:text-slate-100">Backend</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">PHP, Laravel, Node.js, MySQL, API REST</p>
            </div>
            <div class="card-item rounded-xl border border-slate-200 bg-white p-6 text-center shadow-sm transition hover:shadow-md hover:-translate-y-0.5 dark:border-slate-700 dark:bg-slate-800">
                <h3 class="mb-2 font-medium text-slate-900 dark:text-slate-100">Outils</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">Git, Docker, VS Code, CI/CD</p>
            </div>
        </div>
    </div>
</section>

{{-- Projets récents --}}
<section class="reveal py-20">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <h2 class="mb-12 text-center text-2xl font-bold text-slate-900 dark:text-slate-100">Projets récents</h2>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($projets_preview ?? [] as $p)
            <a href="{{ route('projets') }}" class="card-item group overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md dark:border-slate-700 dark:bg-slate-800">
                <div class="card-img flex h-40 items-center justify-center overflow-hidden bg-slate-100 dark:bg-slate-700">
                    @if($p->image && str_starts_with($p->image ?? '', 'http'))
                        <img src="{{ $p->image }}" alt="" class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                    @else
                        <span class="text-3xl text-slate-300 dark:text-slate-500" aria-hidden="true">&#9670;</span>
                    @endif
                </div>
                <div class="p-5">
                    <h3 class="mb-1 font-medium text-slate-900 dark:text-slate-100">{{ $p->titre }}</h3>
                    <p class="mb-3 line-clamp-2 text-sm text-slate-500 dark:text-slate-400">{{ $p->description ?? 'Voir le projet.' }}</p>
                    <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Voir &rarr;</span>
                </div>
            </a>
            @endforeach

            @if(empty($projets_preview))
            @foreach([['Portfolio', 'Laravel & Tailwind.'], ['Blackjack', 'Jeu avec mise et leaderboard.'], ['API REST', 'JWT, Swagger.']] as [$titre, $desc])
            <a href="{{ route('projets') }}" class="card-item group overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md dark:border-slate-700 dark:bg-slate-800">
                <div class="card-img flex h-40 items-center justify-center bg-slate-100 dark:bg-slate-700"><span class="text-3xl text-slate-300 dark:text-slate-500">&#9670;</span></div>
                <div class="p-5">
                    <h3 class="mb-1 font-medium text-slate-900 dark:text-slate-100">{{ $titre }}</h3>
                    <p class="mb-3 text-sm text-slate-500 dark:text-slate-400">{{ $desc }}</p>
                    <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Voir &rarr;</span>
                </div>
            </a>
            @endforeach
            @endif
        </div>
        <div class="mt-10 text-center">
            <a href="{{ route('projets') }}" class="btn-outline inline-flex rounded-lg border border-slate-300 px-6 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100 dark:border-slate-600 dark:text-slate-300 dark:hover:bg-slate-700">
                Tous les projets
            </a>
        </div>
    </div>
</section>

<script>
(function() {
  /* Count-up stats */
  function animateValue(el, end, duration) {
    var start = 0;
    var startTime = null;
    function step(timestamp) {
      if (!startTime) startTime = timestamp;
      var progress = Math.min((timestamp - startTime) / duration, 1);
      var easeOut = 1 - Math.pow(1 - progress, 2);
      var current = Math.floor(easeOut * end);
      el.textContent = current;
      if (progress < 1) requestAnimationFrame(step);
      else el.textContent = end;
    }
    requestAnimationFrame(step);
  }
  function runCounters() {
    document.querySelectorAll('.hero-stat-value[data-count]').forEach(function(el) {
      var end = parseInt(el.getAttribute('data-count'), 10);
      if (isNaN(end)) return;
      animateValue(el, end, 1800);
    });
  }
  /* Scroll reveal */
  function reveal() {
    document.querySelectorAll('.reveal').forEach(function(el) {
      var rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight - 80) el.classList.add('in-view');
    });
  }
  window.addEventListener('scroll', reveal);
  window.addEventListener('load', function() {
    reveal();
    runCounters();
  });
})();
</script>
@endsection
