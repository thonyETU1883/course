<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categorie';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nomcategorie'];
    public $timestamps = false; 

    public function getAllCategorie(){
        return Categorie::all();
    }
}
