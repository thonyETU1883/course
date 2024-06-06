<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PointetapeController extends Controller
{
    public function versImportationPoint(){
        return view('profilAdmin.importationPoint');
    }

}
