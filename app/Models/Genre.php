<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genre';
    protected $primaryKey = 'id';
    protected $fillable = ['nomgenre'];
    public $timestamps = false; 

    public function insertionGenreImportation(){
        DB::insert('INSERT INTO genre(nomgenre)
            SELECT DISTINCT v.genre
            FROM resultattemporaire v 
            LEFT JOIN genre p ON p.nomgenre = v.genre 
            WHERE p.nomgenre IS NULL 
        ');
    }
}
