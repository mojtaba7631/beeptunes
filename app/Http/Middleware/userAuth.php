<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class userAuth
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
        if (auth()->check()) {
            $user_info = User::query()
                ->where('id', auth()->id())
                ->firstOrFail();

            $roles = $user_info->roles;

            $hasRole = false;
            foreach ($roles as $role) {
                if ($role->id == 2) {
                    $hasRole = true;
                    break;
                }
            }

            if ($hasRole) {
                return $next($request);
            } else {
                auth()->logout();
                return redirect()->route('user.login');
            }
        } else {
            auth()->logout();
            return redirect()->route('user.login');
        }
    }
}
