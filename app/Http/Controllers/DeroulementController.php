<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeroulementRequest;
use App\Models\Course;
use App\Models\Deroulement;
use App\Models\Etape;
use App\Models\Etapecoureur;
use DateTime;
use Illuminate\Http\Request;

class DeroulementController extends Controller
{
    public function insertionDeroulement(DeroulementRequest $request){
        $coureur = $request->input('coureur');
        $arrive = $request->input('arrive');
        $idetape = $request->input('etape');


        $etapecoureurInstance = new Etapecoureur();
        $etapecoureur = $etapecoureurInstance->getEtapeCoureur($idetape,$coureur);
        $deroulementInstance = new Deroulement();
        $etapeInstance = new Etape();
        $etape = $etapeInstance->getEtapeById($idetape);
        $depart = $etape->depart;
        $deroulementInstance->insertionDeroulement($etapecoureur->id,$arrive,$depart);

        
        return to_route('etape.versListeEtapeAdmin');
    }

    public function verxchoixclassement(){
        $courseInstance = new Course();
        $listeCourse = $courseInstance->getAllCourse();
        $etape = new Etape();
        $listeEtape = $etape->getAllEtapeCourse(1);
        $layout = "welcome";
        return view('profilEquipeAdmin.listeEtape',compact(['listeCourse','listeEtape','layout']));
    }

    public function verxchoixclassementAdmin(){
        $courseInstance = new Course();
        $listeCourse = $courseInstance->getAllCourse();
        $etape = new Etape();
        $listeEtape = $etape->getAllEtapeCourse(1);
        $layout = "layoutAdmin";
        return view('profilEquipeAdmin.listeEtape',compact(['listeCourse','listeEtape','layout']));
    }

    public function verxchoixclassementEquipe(){
        $courseInstance = new Course();
        $listeCourse = $courseInstance->getAllCourse();
        $etape = new Etape();
        $listeEtape = $etape->getAllEtapeCourse(1);
        $layout = "welcome";
        return view('profilEquipeAdmin.listeEtape',compact(['listeCourse','listeEtape','layout']));
    }





    public function versImportationEtapeResultat(){
        return view('profilAdmin.importationEtapeResultat');
    }

}
