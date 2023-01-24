<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class IsGuru
{
  
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->is_guru) {
            abort(403);
        }
        return $next($request);
    }
}
