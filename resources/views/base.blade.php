<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
@include('head')
<body class="min-h-screen bg-white text-slate-800 antialiased">
    @include('header')
    <main>
        @yield('content')
    </main>
    @include('footer')
</body>
</html>
