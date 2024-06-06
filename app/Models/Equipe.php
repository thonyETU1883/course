<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Equipe extends Model
{
    use HasFactory;

    protected $table = 'equipe';
    protected $primaryKey = 'id';
    protected $fillable = ['nomequipe','login','pwd'];
    public $timestamps = false; 

    public function login($login,$pwd){
        $equipe = Equipe::where('nomequipe',$login)->where('pwd',$pwd)->first();
        return $equipe;
    }

    public function getClassementEquipe(){
        $classement = DB::table('v_classement_equipe')->get();
        return $classement;
    }

    public function insertionEquipeImportation(){
        DB::insert('INSERT INTO equipe(nomequipe,login,profil,pwd)
            SELECT DISTINCT v.equipe,v.emailequipe,1,v.equipe
            FROM resultattemporaire v 
            LEFT JOIN equipe p ON p.nomequipe = v.equipe 
            WHERE p.nomequipe IS NULL 
        ');
    }

    public function getChrono($equipe){
        $liste = DB::table('v_deroulement_complet_all_coureur')->where('equipe',$equipe)->get();
        return $liste;
    }

    public function getAllEquipe(){
        return Equipe::where('profil','!=',0)->get();
    }

    public function getPremierClassementEquipe(){
        $equipe = DB::table('v_classement_equipe')->orderByRaw('rang ASC')->first();
        return $equipe;
    }

    public function getPremierCoureurEquipe($idEquipe){

    }


    public function reintialisationBaseDeDonnee(){
        try{
            DB::statement('SELECT reinitialisation()');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
