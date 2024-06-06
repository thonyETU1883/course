<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pointetape extends Model
{
    use HasFactory;

    protected $table = 'pointetape';
    protected $fillable = ['rang','point'];
    public $timestamps = false;


    public function insertionPointEtapeImportation(){
        DB::insert('INSERT INTO pointetape(rang,point)
            SELECT DISTINCT v.classements,v.points
            FROM pointtemporaire v 
            LEFT JOIN pointetape p ON p.rang = v.classements 
            WHERE p.rang IS NULL 
        ');
    }

}
