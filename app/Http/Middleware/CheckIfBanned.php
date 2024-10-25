<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfBanned
{
    public function handle(Request $request, Closure $next)
    {
        \Log::info('CheckIfBanned middleware is running');
    
        if (Auth::check()) {
            \Log::info('User checked: ' . Auth::user()->email);
            if (Auth::user()->is_ban) {
                \Log::info('User is banned: ' . Auth::user()->email);
                Auth::logout();
                $request->session()->flash('banned', 'Your account has been banned.'); // Set message in session
                return redirect()->route('login');
            } else {
                \Log::info('User is not banned: ' . Auth::user()->email);
            }
        }
    
        return $next($request);
    }
    
}
