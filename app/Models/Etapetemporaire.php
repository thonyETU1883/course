<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etapetemporaire extends Model
{
    use HasFactory;

    protected $table = 'etapetemporaire';
    protected $fillable = ['etape','longueur','nbcoureur','rang','datedepart'];
    public $timestamps = false; 

    public function insertionMultipleEtapeTemporaire($listeEtatetemporaire){
        Etapetemporaire::insert($listeEtatetemporaire);
    }

}
