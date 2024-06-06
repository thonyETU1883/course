<?php

namespace App\Http\Middleware;

use App\Models\Equipe;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Utilisateur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = session()->get('utilisateur');
        $utilisateur = Equipe::where('id',$id)->first();
        if(is_null($utilisateur)){
            return to_route('equipe.versLogin');
        }
        return $next($request);
    }
}
