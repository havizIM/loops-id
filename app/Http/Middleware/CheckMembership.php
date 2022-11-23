<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserMembership;
use Illuminate\Support\Facades\Auth;

class CheckMembership
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
        if(Auth::check()) {
            $activeMember = UserMembership::where(
                'user_id',
                Auth::user()->id
            )->where(
                'status',
                'Active'
            )->first();

            if(!empty($activeMember)) {
                abort(404);
            }
        }
        
        return $next($request);
    }
}
