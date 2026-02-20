@push('styles')
<style>
  @keyframes errorFadeIn {
    from { opacity: 0; transform: translateY(12px); }
    to { opacity: 1; transform: translateY(0); }
  }
  @keyframes errorPulse {
    0%, 100% { opacity: .4; }
    50% { opacity: .7; }
  }
  .error-page-wrap {
    min-height: calc(100vh - 12rem);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem 1rem 4rem;
    position: relative;
    overflow: hidden;
  }
  .error-page-wrap::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle at 1px 1px, currentColor 1px, transparent 0);
    background-size: 24px 24px;
    opacity: .06;
    pointer-events: none;
  }
  html.dark .error-page-wrap::before { opacity: .08; }
  .error-card {
    animation: errorFadeIn 0.6s ease-out;
    position: relative;
    width: 100%;
    max-width: 28rem;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    padding: 2.5rem 1.5rem;
    border-radius: 1.5rem;
    border: 1px solid rgba(226, 232, 240, 0.8);
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(12px);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(0, 0, 0, 0.02);
  }
  html.dark .error-card {
    border-color: rgba(51, 65, 85, 0.8);
    background: rgba(30, 41, 59, 0.9);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
  }
  .error-code-bg {
    font-size: clamp(6rem, 18vw, 10rem);
    font-weight: 800;
    line-height: 1;
    letter-spacing: -0.04em;
    color: rgba(148, 163, 184, 0.35);
    user-select: none;
    margin-bottom: -0.25em;
    animation: errorPulse 4s ease-in-out infinite;
  }
  html.dark .error-code-bg { color: rgba(51, 65, 85, 0.6); }
  .error-code {
    font-size: 2rem;
    font-weight: 700;
    letter-spacing: -0.02em;
    color: #0f172a;
    margin-top: -0.5rem;
  }
  html.dark .error-code { color: #f1f5f9; }
  .error-title {
    font-size: 1.35rem;
    font-weight: 600;
    color: #1e293b;
    margin-top: 0.5rem;
  }
  html.dark .error-title { color: #e2e8f0; }
  .error-message {
    font-size: 0.9375rem;
    line-height: 1.6;
    color: #475569;
    margin-top: 0.75rem;
  }
  html.dark .error-message { color: #94a3b8; }
  .error-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
    justify-content: center;
    margin-top: 2rem;
  }
  .error-btn-primary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.625rem 1.25rem;
    font-size: 0.875rem;
    font-weight: 500;
    border-radius: 0.5rem;
    transition: all 0.2s;
    background: #0f172a;
    color: white;
    text-decoration: none;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12);
  }
  .error-btn-primary:hover { background: #1e293b; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
  html.dark .error-btn-primary { background: #f1f5f9; color: #0f172a; }
  html.dark .error-btn-primary:hover { background: #e2e8f0; }
  .error-btn-secondary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.625rem 1.25rem;
    font-size: 0.875rem;
    font-weight: 500;
    border-radius: 0.5rem;
    border: 1px solid #cbd5e1;
    background: transparent;
    color: #334155;
    text-decoration: none;
    transition: all 0.2s;
  }
  .error-btn-secondary:hover { background: #f8fafc; border-color: #94a3b8; }
  html.dark .error-btn-secondary { border-color: #475569; color: #cbd5e1; }
  html.dark .error-btn-secondary:hover { background: #334155; }
</style>
@endpush
<div class="error-page-wrap">
  <div class="error-card">
    <div class="error-code-bg" aria-hidden="true">{{ $code }}</div>
    <p class="error-code">Erreur {{ $code }}</p>
    <h1 class="error-title">{{ $title }}</h1>
    <p class="error-message">{{ $message }}</p>
    <div class="error-actions">
      <a href="{{ route('home') }}" class="error-btn-primary">← Retour à l'accueil</a>
      <a href="{{ route('contact') }}" class="error-btn-secondary">Contact</a>
    </div>
  </div>
</div>
