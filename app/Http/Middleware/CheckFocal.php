<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class CheckFocal
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
      
        // $user = Auth::user();
        // $id = $user->id;
        // $name = $user->name;
        // $usertype = $user->usertype;
        // $email_verified_at = $user->email_verified_at;
        // dd($usertype);
        // // if(!$usertype=='focal'){
        //     return redirect('/userchallenge');
        // }
        // return $next($request);
        // if ($email_verified_at ==null) {
            
        // }
        // return redirect()->route('userchallenge')
        //         ->with('success', 'Some Event');
        if (Auth::check())
        {

            if(Auth::user()->isCheckFocal())
            {
                return $next($request);
            }
        }

        return redirect('login');

    }
}
