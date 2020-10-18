<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Users;
use App\Models\Boards;
use App\Models\Projects;
use App\Models\Modules;

class IsLoggedIn
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
        if (session('isLoggedIn', false) == true) {
            $menus = [];

            foreach(Modules::where('is_active', 1)->orderBy('name')->get() as $e) {
                $menus[$e['name']] = $e['manage_url'];
            }

            view()->share('menuModules', $menus);

            return $next($request);
        }

        return redirect()->route('login');
    }
}
