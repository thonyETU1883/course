<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coureur extends Model
{
    use HasFactory;

    protected $table = 'coureur';
    protected $primaryKey = 'id';
    protected $fillable = ['nom','numero','equipe','genre','datedenaissance'];
    public $timestamps = false; 

    public function getAllCoureur($idEquipe){
        return Coureur::where('equipe',$idEquipe)->get();
    }

    public function insertionCoureurImportation(){
        DB::insert('INSERT INTO coureur(nom,numero,equipe,genre,datedenaissance)
            SELECT DISTINCT v.nom,v.numerodossard,equipe.id as idequipe,genre.id as idgenre,v.datedenaissance
            FROM resultattemporaire v 
            JOIN equipe ON equipe.nomequipe = v.equipe
            JOIN genre ON genre.nomgenre = v.genre
            LEFT JOIN coureur p ON p.numero = v.numerodossard 
            WHERE p.numero IS NULL 
        ');
    }


    public function verificationDoublon(){
        $liste = DB::table('controlle_numero_dossard')->where('nombre','>=',2)->get();
        return $liste;
    } 

}
