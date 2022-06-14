<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KepalaMiddleware
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
        if(Auth::check())
        {
            if(request()->user()->hasRole('kepala'))
            {
                return $next($request);
            }
            elseif(request()->user()->hasRole('admin'))
            {
                return redirect('admin')->with('status','Anda bukan kepala');
            }
            elseif(request()->user()->hasRole('pegawai'))
            {
                return redirect('pegawai')->with('status','Anda bukan kepala');
            }
        }
        return redirect('/')->with('status','Anda belum login');
    }
}
