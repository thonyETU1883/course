<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Penalite extends Model
{
    use HasFactory;

    protected $table = 'penalite';
    protected $primaryKey = 'id';
    protected $fillable = ['etape','equipe','penalite'];
    public $timestamps = false;

    public function getAllPenalite(){
        return DB::table('v_penalite_total')->get();
    }

    public function ajoutPenalite($etape,$equipe,$penalite){
        try{
            Penalite::CREATE([
                'etape'=>$etape,
                'equipe'=>$equipe,
                'penalite'=>$penalite
            ]);
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    public function supprimerPenalite($idPenalite){
        try{
            DB::table('penalite')->where('id', $idPenalite)->delete();
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }   
}
