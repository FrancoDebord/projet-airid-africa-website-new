<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConflictAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $granted = $request->session()->get('conflict_access_granted') === true;
        $used = $request->session()->get('conflict_access_used') === true;

        if (!$granted) {
            return redirect()->route('conflict.access.form');
        }

        // First access must be through the access form (GET /conflict).
        if ($request->isMethod('get')) {
            if ($used) {
                // Show form with success or error message after submit.
                if ($request->session()->get('conflict_access_success') === true) {
                    $request->session()->put('conflict_access_success', false);
                    $request->session()->forget(['conflict_access_granted', 'conflict_access_used']);
                }
                return $next($request);
            }
            $request->session()->put('conflict_access_used', true);
            return $next($request);
        }

        // Allow POST only after the form has been opened once.
        if ($request->isMethod('post') && $used) {
            return $next($request);
        }

        return redirect()->route('conflict.access.form');
    }
}
