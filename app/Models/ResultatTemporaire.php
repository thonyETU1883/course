<?php

namespace App\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ResultatTemporaire extends Model
{
    use HasFactory;

    protected $table = 'resultattemporaire';
    protected $fillable = ['etape_rang','numerodossard','nom','genre','datedenaissance','equipe','arrivee','emailequipe','ligne'];
    public $timestamps = false; 

    public function insertionMultipleResultatTemporaire($listeResultatTemporaire){
        ResultatTemporaire::insert($listeResultatTemporaire);
    }

    public function importationResultat($file){
        $errors = [];
        try{
            $rows = Excel::toArray([], $file);
            $listeResultatTemporaire = [];
            DB::beginTransaction();
            for ($i = 1; $i < count($rows[0]); $i++) {
                $etape_rang = trim($rows[0][$i][0]);
                $nomdossard = trim($rows[0][$i][1]);
                $nom = trim($rows[0][$i][2]);
                $genre = trim($rows[0][$i][3]);
                $datedenaissance = trim($rows[0][$i][4]);
                $equipe = trim($rows[0][$i][5]);
                $arrivee = trim($rows[0][$i][6]);
                
                $emailequipe = $equipe."@gmail.com";
                $datedenaissance = Carbon::createFromFormat('d/m/Y', $datedenaissance)->format('Y-m-d');
                $listeResultatTemporaire[] = ['etape_rang'=>$etape_rang,
                    'numerodossard' => $nomdossard,
                    'nom' => $nom,
                    'genre' => $genre,
                    'datedenaissance' => $datedenaissance,
                    'equipe' => $equipe,
                    'arrivee' => $arrivee,
                    'emailequipe'=>$emailequipe,
                    'ligne'=>$i
                ];
            }
            $coureurInstance = new Coureur();
            
            $listeErreurDoublon = $coureurInstance->verificationDoublon();
            foreach($listeErreurDoublon as $erreur){
                $errors[] = "il y a un doublon sur le numero ".$erreur->numerodossard;
            }
        
            if(count($errors)>0){
                throw new Exception("erreur de donnée");
            }

            self::insertionMultipleResultatTemporaire($listeResultatTemporaire);
    
            $genreInstance = new Genre();
            $genreInstance->insertionGenreImportation();

            $equipeInstance = new Equipe();
            $equipeInstance->insertionEquipeImportation();

            $coureurInstance->insertionCoureurImportation();

            $etapeCoureurInstance = new Etapecoureur();
            $etapeCoureurInstance->insertionEtapeCoureurImportation();

            $deroulementInstance = new Deroulement();
            $deroulementInstance->insertionDeroulementImportation();

            DB::commit();
            DB::table('resultattemporaire')->truncate();
        }catch (Exception $e) {
            DB::rollBack();
        }
        return $errors;
    }
}
