<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Pointtemporaire extends Model
{
    use HasFactory;

    protected $table = 'pointtemporaire';
    protected $fillable = ['classements','points'];
    public $timestamps = false;

    public function insertionMultiplePointEtapeTemporaire($listePointEtape){
        Pointtemporaire::insert($listePointEtape);
    }

    public function importationResultat($file){
        try{
            $rows = Excel::toArray([], $file);
            $listePointEtape = [];
            DB::beginTransaction();
            for ($i = 1; $i < count($rows[0]); $i++) {
                $classements = trim($rows[0][$i][0]);
                $points = trim($rows[0][$i][1]);
                
                
                $listePointEtape[] = ['classements'=>$classements,
                'points'=>$points
                ];
            }


            self::insertionMultiplePointEtapeTemporaire($listePointEtape);
    
            $pointetapeInstance = new Pointetape();
            $pointetapeInstance->insertionPointEtapeImportation(); 
            DB::commit();
            DB::table('pointtemporaire')->truncate();
            return 'success';
        }catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
        return 'false';
    }
}
