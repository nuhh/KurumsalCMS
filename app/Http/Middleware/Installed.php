<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Users;
use App\Models\Boards;
use App\Models\Projects;

class Installed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (file_exists(base_path('isInstalled'))) {
            return $next($request);
        }

        return redirect()->route('install');
    }
}
