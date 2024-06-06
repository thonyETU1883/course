<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;
use PhpParser\Node\Expr\Throw_;
use PHPUnit\Framework\Constraint\Count;

class Etapecoureur extends Model
{
    use HasFactory;

    protected $table = 'etapecoureur';
    protected $primaryKey = 'id';
    protected $fillable = ['etape','coureur'];
    public $timestamps = false; 


    public function nombreCoureurRestant($equipe,$etape){
        $etape = DB::table('v_reste_coureur_etape')
        ->where('idetape',$etape)
        ->where('idequipe',$equipe)
        ->first();
        return $etape->reste;
    }

    public function insertionEtapeCoureur($equipe,$etape,$coureur){

            $etapecoureurs = [];
            
            foreach($coureur as $c){
                $etapecoureurs[] = ['etape'=>$etape,'coureur'=>$c];
            }


            $nombreCoureurReste = self::nombreCoureurRestant($equipe,(int)$etape); 

            $verification = $nombreCoureurReste-Count($etapecoureurs);

            if($verification<0){
                throw new Exception("Nombre coureurs déja complet");
            }

            $coureurEtapeExistant = Etapecoureur::where('etape', $etape)
                                             ->whereIn('coureur', $coureur)
                                             ->get();

            if(!$coureurEtapeExistant->isEmpty()){
                throw new Exception("Coureur déjà inscrit");
            }

            Etapecoureur::insert($etapecoureurs);
        
    }

    public function getCoureurEtape($etape){
        try{
            $listeCoureur = DB::table('v_etapecoureur_lib')->where('etape',$etape)->get();
            return $listeCoureur;
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    public function getEtapeCoureur($etape,$coureur){
        try{    
            $etapecoureur = Etapecoureur::where('etape',$etape)->where('coureur',$coureur)->first();
            return $etapecoureur;
        }catch(Exception $e){
            dd($e->getMessage());
        }     
    }

    public function insertionEtapeCoureurImportation(){
        DB::insert('INSERT INTO etapecoureur(etape,coureur)
            SELECT v.idetape,v.idcoureur
            FROM v_resultattemporairecomplet v 
            LEFT JOIN etapecoureur p ON p.etape = v.idetape
            LEFT JOIN etapecoureur p1 ON p1.coureur = v.idcoureur 
            WHERE p.coureur IS NULL OR p1.coureur IS NULL
        ');
    }
}
