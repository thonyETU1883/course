<?php

namespace App\Http\Middleware;

use App\Models\Equipe as ModelsEquipe;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Equipe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = session()->get('utilisateur');
        $utilisateur = ModelsEquipe::where('id',$id)->first();
        if(is_null($utilisateur) || $utilisateur->profil != 1){
            return to_route('equipe.versLogin');
        }
        return $next($request);
    }
}
