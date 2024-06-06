<?php

namespace App\Models;

use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Deroulement extends Model
{
    use HasFactory;

    protected $table = 'deroulement';
    protected $primaryKey = 'id';
    protected $fillable = ['etapecoureur','arriver','duree'];
    public $timestamps = false; 

    public function insertionDeroulement($etapeCoureur,$arrive,$depart){
        $dateTimeDepart = new DateTime($depart);
        $dateTimeArrive = new DateTime($arrive);
        $diff = $dateTimeArrive->diff($dateTimeDepart); 
        $duree = $diff->d*86400+$diff->h*3600+$diff->i*60+$diff->s;
        try{
            Deroulement::create([
                'etapecoureur'=>$etapeCoureur,
                'arriver'=>$arrive,
                'duree'=>$duree
            ]);
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }


    public function insertionDeroulementImportation(){
        DB::insert('INSERT INTO deroulement(etapecoureur,arriver,duree)
            SELECT DISTINCT v.idetapecoureur,v.arrivee,v.duree
            FROM v_resultattemporaire_deroulement v 
        ');
    }
}
