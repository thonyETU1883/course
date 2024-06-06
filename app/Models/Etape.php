<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Etape extends Model
{
    use HasFactory;

    protected $table = 'etape';
    protected $primaryKey = 'id';
    protected $fillable = ['nbcoureur','nom','longueur','rang','course','depart'];
    public $timestamps = false; 

    public function getAllEtapeCourse($course){
        $listeEtape = Etape::where('course',$course)->get();
        return $listeEtape;
    }

    public function getEtapeById($etape){
        try{
            return Etape::where('id',$etape)->first();
        }catch(Exception $e){}
    }
    
    public function getClassementEtape($course,$etape){
        $classement = DB::table('classement_point')
        ->where('course',$course)
        ->where('etape',$etape)
        ->orderByRaw('rang ASC')
        ->get()
        ;
        return $classement;
    }

    public function insertionEtapeImportation(){
        DB::insert('INSERT INTO etape(nbcoureur,nom,longueur,rang,course,depart)
            SELECT DISTINCT v.nbcoureur,v.etape,v.longueur,v.rang,1,v.datedepart
            FROM etapetemporaire v 
            LEFT JOIN etape p ON p.nom = v.etape 
            WHERE p.nom IS NULL 
        ');
    }

    public function importationEtape($file){
        try{
            $rows = Excel::toArray([], $file);
            $listeEtapeTemporaire = [];
            DB::beginTransaction();
            for ($i = 1; $i < count($rows[0]); $i++) {
                $etape = trim($rows[0][$i][0]);
                $longueur = trim($rows[0][$i][1]);
                $nbcoureur = trim($rows[0][$i][2]);
                $rang = trim($rows[0][$i][3]);
                $datedepart = trim($rows[0][$i][4]);
                $heuredepart = trim($rows[0][$i][5]);
                
                
                $longueur = str_replace(",", ".", $longueur);
                $longueur = floatval($longueur);
                $dateheuredepart = $datedepart ." ".$heuredepart;
                $listeEtapeTemporaire[] = ['etape'=>$etape,'longueur'=>$longueur,'nbcoureur'=>$nbcoureur,'rang'=>$rang,'datedepart'=>$dateheuredepart,'ligne'=>$i];
            }

            $etapetemporaireInstance = new Etapetemporaire();
            $etapetemporaireInstance->insertionMultipleEtapeTemporaire($listeEtapeTemporaire);
    
            self::insertionEtapeImportation();
            DB::commit();
            DB::table('etapetemporaire')->truncate();
            return 'success';
        }catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
        return 'false';
    }
}
