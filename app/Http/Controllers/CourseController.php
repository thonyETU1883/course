<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Course;
use App\Models\Equipe;
use App\Models\Etape;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CourseController extends Controller
{
    public function allCourse(){
        $equipeInstance = new Equipe();
        $idEquipe = session()->get('utilisateur');
        $listeChrono =$equipeInstance->getChrono($idEquipe);
        $data = [];
        foreach($listeChrono as $chrono){
            $data[$chrono->etape]["donnee"][] = json_encode($chrono);
            $data[$chrono->etape]["longueur"] = $chrono->longueur;
            $data[$chrono->etape]["nometape"] = $chrono->nometape;
        }
        $layout = "layoutAdmin";
        return view('accueil.listeCourseAdmin',compact(['data','layout']));
    }

    public function allCourseEquipe(){
        $equipeInstance = new Equipe();
        $idEquipe = session()->get('utilisateur');
        $listeChrono =$equipeInstance->getChrono($idEquipe);
        $data = [];
        
       /* foreach($listeChrono as $chrono){
            $data[$chrono->etape]["donnee"][] = json_encode($chrono);
            $data[$chrono->etape]["longueur"] = $chrono->longueur;
            $data[$chrono->etape]["nometape"] = $chrono->nometape;
            $data[$chrono->etape]["reste"] = $chrono->reste;
        }*/

        $listeEtape = Etape::all();
        $val = false;
        foreach($listeEtape as $etape){

            foreach($listeChrono as $chrono){
                if($etape->id == $chrono->etape){
                    $data[$etape->id]["donnee"][] = json_encode($chrono);
                    $data[$etape->id]["longueur"] = $chrono->longueur;
                    $data[$etape->id]["nometape"] = $chrono->nometape;
                    $data[$etape->id]["reste"] = $chrono->reste;
                    $val=true;
                }
            }

            if($val==false){
                $data[$etape->id]["donnee"][] =  json_encode(["etape"=>0]);
                $data[$etape->id]["longueur"] = $etape->longueur;
                $data[$etape->id]["nometape"] = $etape->nom;
                $data[$etape->id]["reste"] = $etape->nbcoureur;
            }
            $val=false;
        }
        $layout = "welcome";
        return view('accueil.listeCourseAdmin',compact(['data','layout']));
    }

    public function versClassementEquipeCategorie(){
        $courseInstance = new Course();
        $classement = $courseInstance->getClassementEquipeParCategorie();
        $categorieInstance = new Categorie();
        $listeCategorie = $categorieInstance->getAllCategorie();
        $layout = "welcome";

        $label = [];
        $data = [];
        $i = 0;
        foreach($listeCategorie as $categorie){
            foreach($classement as $c){
                if($categorie->id == $c->categorie){
                    $label[$i][] = $c->nomequipe;
                    $data[$i][] = $c->point;
                }
            } 
            $i++;
        }


        return view('profilEquipeAdmin.classementGeneralParCategorie',compact(['classement','listeCategorie','layout','label','data']));
    }

    public function versClassementEquipeCategorieAdmin(){
        $courseInstance = new Course();
        $classement = $courseInstance->getClassementEquipeParCategorie();
        $categorieInstance = new Categorie();
        $listeCategorie = $categorieInstance->getAllCategorie();
        $layout = "layoutAdmin";

        $label = [];
        $data = [];
        $i = 0;
        foreach($listeCategorie as $categorie){
            foreach($classement as $c){
                if($categorie->id == $c->categorie){
                    $label[$i][] = $c->nomequipe;
                    $data[$i][] = $c->point;
                }
            } 
            $i++;
        }
        return view('profilEquipeAdmin.classementGeneralParCategorie',compact(['classement','listeCategorie','layout','label','data']));
    }
}
