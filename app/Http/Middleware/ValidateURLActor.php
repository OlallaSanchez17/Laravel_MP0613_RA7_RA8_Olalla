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
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $year = $request->route('year');

        if ($year !== null) {
            if (!is_numeric($year) || $year < 1900 || $year > 2024) {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
