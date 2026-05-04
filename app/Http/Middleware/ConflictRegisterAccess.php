<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ConflictRegisterAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $personnel = Auth::guard('personnel')->user();

        if (!$personnel) {
            return redirect()->route('admin.login');
        }

        $fullName = trim(($personnel->prenom_personnel ?? '') . ' ' . ($personnel->nom_personnel ?? ''));
        $role = $personnel->posteOccupe->intitule_poste ?? '';

        if ($fullName === 'Romaric AKOTON' && $role === 'Scientific Officer') {
            return $next($request);
        }

        return redirect()->route('admin.dashboard')->with('error', 'Access denied.');
    }
}
