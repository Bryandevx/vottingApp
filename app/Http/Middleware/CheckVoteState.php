<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckVoteState
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$user = Auth::user()->rol;
        //dd($user);
        if(Auth::user()->vote_state == 1){
            return redirect('/');
        }
        
        return $next($request);
    }
}
