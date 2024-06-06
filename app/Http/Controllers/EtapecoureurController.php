<?php

namespace App\Http\Controllers;

use App\Models\Etapecoureur;
use Exception;
use Illuminate\Http\Request;

class EtapecoureurController extends Controller
{
    public function insertionEtapeCoureur(Request $request){
        $request->validate([
            'etape' => 'required',
        ]);
        $listeCoureur = $request->input('coureurs');
        $etape = $request->input('etape');
        $etapeCoureurInstance = new Etapecoureur();
        $idequipe = session()->get('utilisateur');
        try{
            $etapeCoureurInstance->insertionEtapeCoureur($idequipe,$etape,$listeCoureur);
        }catch(Exception $e){
            return to_route('equipe.versAffectationCoureur',$etape)->withErrors([
                'erreur' => $e->getMessage()
             ]);
        }
        return to_route('course.allCourseEquipe');
    }

    public function versinsertionderoulement(string $etape){
        $etapeCoureurInstance = new Etapecoureur();
        $listeCoureur = $etapeCoureurInstance->getCoureurEtape($etape);
        return view('profilAdmin.insertDeroulement',compact(['listeCoureur','etape']));
    }
}
