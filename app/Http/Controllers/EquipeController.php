<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Equipe;
use App\Models\Etape;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipeController extends Controller
{

    public function versLogin(){
        return view('authentification.login');
    }

    public function login(LoginRequest $request){
        $login = $request->input('login');
        $pwd = $request->input('pwd');

        $equipeInstance = new Equipe();

        $equipe = $equipeInstance->login($login,$pwd);

        
        if(is_null($equipe)){
            return redirect()->back()->withErrors([
                'errorLogin' => 'Invalide email ou mot de passe.'
             ])->onlyInput('email');
        }
        session()->put('utilisateur',$equipe->id);
        session()->put('name',$equipe->nomequipe);

        if($equipe->profil==0){
            session()->put('typeutilisateur','layoutAdmin');
            return to_route('course.allCourse');
        }
        session()->put('typeutilisateur','welcome');
        return to_route('course.allCourseEquipe');
    }

    public function classementEquipe(){
        $equipeInstance = new Equipe();
        $classement = $equipeInstance->getClassementEquipe();
        $label = [];
        $data = [];
        foreach($classement as $c){
            $label[] = $c->nomequipe;
            $data[] = $c->point;
        }
        $layout = "welcome";
        return view('profilEquipeAdmin.classementequipe',compact(['classement','data','label','layout']));
    }

    public function classementEquipeAdmin(){
        $equipeInstance = new Equipe();
        $classement = $equipeInstance->getClassementEquipe();
        $label = [];
        $data = [];
        foreach($classement as $c){
            $label[] = $c->nomequipe;
            $data[] = $c->point;
        }
        $layout = "layoutAdmin";
        return view('profilEquipeAdmin.classementequipe',compact(['classement','data','label','layout']));
    }


    public function logout(){
        session()->forget('utilisateur');
        return to_route('equipe.versLogin');
    }

    public function genererPdfCertificat(){
        $equipeInstance = new Equipe();
        $premierClassement = $equipeInstance->getPremierClassementEquipe();
        PDF::setPaper('A4', 'landscape');

        if($premierClassement!=null){
            $pdf = Pdf::loadView('profilEquipeAdmin.certificat',compact(['premierClassement']));
            $pdf->set_paper("a4", "landscape" );
            $pdf->render();
            return $pdf->download('certificat.pdf');
        }
    }

    public function reintialisationBaseDeDonnee(){
        $equipeInstance = new Equipe();
        $equipeInstance->reintialisationBaseDeDonnee();
        return to_route('equipe.versLogin');
    }
    

    public function getDetailPointEquipe($equipe){
        $liste = DB::table('v_detail_point_equipe')->where('equipe',$equipe)->get();
        return $liste;
    }

    public function detailPointEquipe(string $equipe){
        $equipeInstance = new Equipe();
        $liste= DB::table('v_detail_point_equipe')->where('equipe',$equipe)->get();
        $layout="layoutAdmin";
        return view('profilEquipeAdmin.detail',compact(['liste','layout']));
    }
}
