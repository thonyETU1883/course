<?php

namespace App\Http\Controllers;

use App\Models\Coureur;
use App\Models\Course;
use App\Models\Equipe;
use App\Models\Etape;
use Illuminate\Http\Request;

class EtapeController extends Controller
{
    public function versListeEtape(){
        $courseInstance = new Course();
        $listeCourse = $courseInstance->getAllCourse();
        $listeEtape = [];
        return view('profilEquipe.listeEtape',compact(['listeCourse','listeEtape']));
    }


    public function versListeEtapeAdmin(){
        $etape = new Etape();
        $listeEtape = $etape->getAllEtapeCourse(1);
        $courseInstance = new Course();
        return view('profilAdmin.listeEtape',compact(['listeEtape']));
    }

    public function listeEtape(Request $request){
        $request->validate([
            'course' => 'required',
        ]);
        $course = $request->input('course');
        $etape = new Etape();
        $listeEtape = $etape->getAllEtapeCourse($course);
        $courseInstance = new Course();
        $listeCourse = $courseInstance->getAllCourse();
        return view('profilEquipe.listeEtape',compact(['listeCourse','listeEtape']));
    }

    public function listeEtapeAdmin(Request $request){
        $request->validate([
            'course' => 'required',
        ]);
        $course = $request->input('course');
        $etape = new Etape();
        $listeEtape = $etape->getAllEtapeCourse($course);
        $courseInstance = new Course();
        $listeCourse = $courseInstance->getAllCourse();
        return view('profilAdmin.listeEtape',compact(['listeCourse','listeEtape']));
    }

    public function versAffectationCoureur(string $etape){
        $coureurInstance = new Coureur();
        $idEquipe = session()->get('utilisateur');
        $listeCoureur = $coureurInstance->getAllCoureur($idEquipe);
        return view('profilEquipe.etapeCoureur',compact(['listeCoureur','etape']));
        
    }

    public function voirlisteetapeclassement(Request $request){
        $request->validate([
            'course' => 'required',
        ]);
        $course = $request->input('course');
        $etape = new Etape();
        $listeEtape = $etape->getAllEtapeCourse($course);
        $courseInstance = new Course();
        $listeCourse = $courseInstance->getAllCourse();
        return view('profilEquipeAdmin.listeEtape',compact(['listeCourse','listeEtape']));
    }

    public function classementEtape(string $etape){
        $etapeInstance = new Etape();
        $classement = $etapeInstance->getClassementEtape(1,$etape);
        $layout = session()->get('typeutilisateur');
        return view('profilEquipeAdmin.classementCoureur',compact(['classement','layout']));
    }

    public function listeEtapeAccueilEquipe(string $course){
        $etapeInstance = new Etape();
        $listeEtape = $etapeInstance->getAllEtapeCourse($course);
        $idEquipe = session()->get('utilisateur');
        $utilisateur = Equipe::where('id',$idEquipe)->first();
        $course = Course::where('id',$course)->first();
        $layout = 'welcome';

        if($utilisateur->profil==0){
            $layout = 'layoutAdmin';
        }

        return view('accueil.listeEtape',compact(['listeEtape','layout','course']));
    }

}

