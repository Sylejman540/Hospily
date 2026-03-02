<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClinicianMiddleware
{
    /**
     * Ensure user is an admin or clinician
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || (!$request->user()->isAdmin() && !$request->user()->isClinician())) {
            return response()->json(['message' => 'Only admins and clinicians can access this resource'], 403);
        }

        return $next($request);
    }
}
