<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        $companyId = $request->company_id;

        if (!$companyId) {
            return response()->json(['message' => 'No company ID provided'], 400);
        }

        $isAdmin = $user->members()->where('role', 'admin')->where('company_id', $companyId)->exists();

        if (!$isAdmin) {
            return response()->json(['message' => 'Permission denied'], 403);
        }

        return $next($request);
    }
}
