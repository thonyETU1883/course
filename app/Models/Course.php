<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';
    protected $primaryKey = 'id';
    protected $fillable = ['nomcourse','daty'];
    public $timestamps = false; 

    public function getAllCourse(){
        return Course::all();
    }

    public function getClassementEquipeParCategorie(){
        return DB::table('classement_general_par_categorie8with_color')->get();
    }
}
