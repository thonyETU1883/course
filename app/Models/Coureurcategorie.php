<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coureurcategorie extends Model
{
    use HasFactory;

    protected $table = 'coureurcategorie';
    protected $fillable = ['coureur','categorie'];
    public $timestamps = false; 


    public function importationCoureurCategorie(){
        $coureurs = DB::table('v_coureur_complet')->get();
        $data = [];

        foreach($coureurs as $coureur){

            if($coureur->genre == 1){
                $data[] = ['coureur'=>$coureur->id,'categorie'=>1];
            }
            if($coureur->genre == 2){
                $data[] = ['coureur'=>$coureur->id,'categorie'=>2];
            }
            if($coureur->age <= 18){
                $data[] = ['coureur'=>$coureur->id,'categorie'=>3];
            }
        }

        Coureurcategorie::insert($data);
    }   
}
