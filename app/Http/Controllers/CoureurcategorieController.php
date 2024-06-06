<?php

namespace App\Http\Controllers;

use App\Models\Coureurcategorie;
use Illuminate\Http\Request;

class CoureurcategorieController extends Controller
{
    public function genenrationCategorie(){
        $coureurCategorieInstance = new Coureurcategorie();
        $coureurCategorieInstance->importationCoureurCategorie();
        return to_route('course.allCourseEquipe');
    }
}
