<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->get('is_admin', false)) {
            return redirect()
                ->route('admin.login')
                ->with('error', 'Accès réservé. Merci de vous connecter en tant qu’admin.');
        }

        return $next($request);
    }
}

