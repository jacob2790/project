<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param mixed ...$guards
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::guard('admin')->check()) {
            redirect(\Config::get('app.app_route_prefix') . '/dashboard');
        } else {
            return redirect(\Config::get('app.app_route_prefix'));
        }
        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route(\Config::get('app.app_route_prefix'));
        }
    }
}
