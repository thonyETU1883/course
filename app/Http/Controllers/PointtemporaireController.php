<?php

namespace App\Http\Controllers;

use App\Models\Pointtemporaire;
use Exception;
use Illuminate\Http\Request;

class PointtemporaireController extends Controller
{
    public function importationpoint(){
        try{
            $fichierEtape = request()->file('filepoint');
            $pointtemporaireInstance = new Pointtemporaire();
            $pointtemporaireInstance->importationResultat($fichierEtape);

            return to_route('pointetape.versImportationPoint');
        }catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
