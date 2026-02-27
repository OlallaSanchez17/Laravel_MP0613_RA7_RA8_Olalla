<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateURLActor
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
        $year = $request->route('year');

        // Check if year is valid if it is set
        if (isset($year)) {
            if (!is_numeric($year) || $year < 1900 || $year > 2024) {
                \Log::error("Invalid year range accessed in actor middleware: $year");
                return redirect('/');
            }
        }

        return $next($request);
    }
}
