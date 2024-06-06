<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenaliteRequest;
use App\Models\Equipe;
use App\Models\Etape;
use App\Models\Penalite;
use Illuminate\Http\Request;

class PenaliteController extends Controller
{
    public function versListePenalite(){
        $penaliteInstance = new Penalite();
        $listePenalite = $penaliteInstance->getAllPenalite();
        return view('profilAdmin.listePenalite',compact(['listePenalite']));
    }

    public function versAjoutPenalite(){
        $etapeInstance = new Etape();
        $listeEtape = $etapeInstance->getAllEtapeCourse(1);
        $equipeInstance = new Equipe();
        $listeEquipe = $equipeInstance->getAllEquipe();
        return view('profilAdmin.ajoutPenalite',compact(['listeEtape','listeEquipe']));
    }

    public function ajoutPenalite(PenaliteRequest $request){
        $etape = $request->input('etape');
        $equipe = $request->input('equipe');
        $penalite = $request->input('penalite');

        $penaliteInstance = new Penalite();
        $penaliteInstance->ajoutPenalite($etape,$equipe,$penalite);
        return to_route('penalite.versListePenalite');
    }

    public function supprimerPenalite(Request $request){
        $request->validate([
            'idPenalite' => 'required',
        ]);
        $idPenalite = $request->input('idPenalite');
        $penaliteInstance = new Penalite();
        $penaliteInstance->supprimerPenalite($idPenalite);
        return to_route('penalite.versListePenalite');
    }
}
