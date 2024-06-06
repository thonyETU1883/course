<?php

namespace App\Http\Controllers;

use App\Models\Etape;
use App\Models\ResultatTemporaire;
use Exception;
use Illuminate\Http\Request;

class EtapetemporaireController extends Controller
{
    public function importationEtapeResultat(){
        try{
            $fichierEtape = request()->file('fileetape');
            $etapeInstance = new Etape();
            $etapeInstance->importationEtape($fichierEtape);


            $fichierResultat = request()->file('fileresultat');
            $resultatTemporaire = new ResultatTemporaire();
            $errorResultat = $resultatTemporaire->importationResultat($fichierResultat);
            

            if(count($errorResultat)>0){
                return view('gestionErreur.listeErreur',compact(['errorResultat']));
            }

            return to_route('deroulement.versImportationEtapeResultat');

        }catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
