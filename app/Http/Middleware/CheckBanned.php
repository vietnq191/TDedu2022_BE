<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBanned
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
        $user = null;
        if(auth('api')->user()){
            $user = auth('api')->user();
        }
        if($user && $user->tokenCan('api')){
            $user = auth('api')->user();
        }

        if ($user != null) {
            if($user->status == 'INACTIVE' || $user->banned_at != null) {
                abort(response()->json(['error' => 'Unauthorized'], 401));
            }

            return $next($request);
        }

        return $next($request);
    }
}
