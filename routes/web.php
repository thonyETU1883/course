<?php

use App\Http\Controllers\CoureurcategorieController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DeroulementController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\EtapeController;
use App\Http\Controllers\EtapecoureurController;
use App\Http\Controllers\EtapetemporaireController;
use App\Http\Controllers\PenaliteController;
use App\Http\Controllers\PointetapeController;
use App\Http\Controllers\PointtemporaireController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('authentification.login');
});


Route::get('/accueilAdmin', [CourseController::class, 'allCourse'])->name('course.allCourse')->middleware('admin');
Route::get('/accueil', [CourseController::class, 'allCourseEquipe'])->name('course.allCourseEquipe')->middleware('equipe');

Route::get('/versLogin', [EquipeController::class, 'versLogin'])->name('equipe.versLogin');
Route::post('/login', [EquipeController::class, 'login'])->name('equipe.login');
Route::get('/classementEquipe', [EquipeController::class, 'classementEquipe'])->name('equipe.classementEquipe');
Route::get('/classementEquipeAdmin', [EquipeController::class, 'classementEquipeAdmin'])->name('equipe.classementEquipeAdmin');
Route::get('/logout', [EquipeController::class, 'logout'])->name('equipe.logout');

Route::get('/verslisteEtape', [EtapeController::class, 'versListeEtape'])->name('equipe.versListeEtape')->middleware('equipe');
Route::get('/listeEtape', [EtapeController::class, 'listeEtape'])->name('equipe.listeEtape')->middleware('equipe');
Route::get('/affecatationCoureur/{etape}', [EtapeController::class, 'versAffectationCoureur'])->name('equipe.versAffectationCoureur')->middleware('equipe');
Route::get('/versListeEtapeAdmin', [EtapeController::class, 'versListeEtapeAdmin'])->name('etape.versListeEtapeAdmin')->middleware('admin');
Route::get('/listeEtapeAdmin', [EtapeController::class, 'listeEtapeAdmin'])->name('etape.listeEtapeAdmin')->middleware('admin');
Route::get('/classementEtape/{etape}', [EtapeController::class, 'classementEtape'])->name('etape.classementEtape');
Route::get('/voirlisteetapeclassement', [EtapeController::class, 'voirlisteetapeclassement'])->name('etape.voirlisteetapeclassement');
Route::get('/listeEtapeAccueilEquipe/{course}', [EtapeController::class, 'listeEtapeAccueilEquipe'])->name('etape.listeEtapeAccueilEquipe');

Route::post('/ajoutCoureur', [EtapecoureurController::class, 'insertionEtapeCoureur'])->name('equipe.insertionEtapeCoureur')->middleware('equipe');
Route::get('/versinsertionderoulement/{etape}', [EtapecoureurController::class, 'versinsertionderoulement'])->name('equipe.versinsertionderoulement')->middleware('admin');


Route::post('/insertionDeroulement', [DeroulementController::class, 'insertionDeroulement'])->name('deroulement.insertionDeroulement')->middleware('admin');
Route::get('/verxchoixclassement', [DeroulementController::class, 'verxchoixclassement'])->name('deroulement.verxchoixclassement');
Route::get('/verxchoixclassementAdmin', [DeroulementController::class, 'verxchoixclassementAdmin'])->name('deroulement.verxchoixclassementAdmin');
Route::get('/verxchoixclassementEquipe', [DeroulementController::class, 'verxchoixclassementEquipe'])->name('deroulement.verxchoixclassementEquipe');



Route::get('/teste', function () {
    return view('layoutAdmin');
})->middleware('admin');




//admin
    Route::get('/versImportationEtapeResultat', [DeroulementController::class, 'versImportationEtapeResultat'])->name('deroulement.versImportationEtapeResultat')->middleware('admin');

    Route::post('/importationEtapeResultat', [EtapetemporaireController::class, 'importationEtapeResultat'])->name('etapetemporaire.importationEtapeResultat')->middleware('admin');

    Route::get('/versImportationPoint', [PointetapeController::class, 'versImportationPoint'])->name('pointetape.versImportationPoint')->middleware('admin');
   
    Route::post('/importationpoint', [PointtemporaireController::class, 'importationpoint'])->name('pointtemporaire.importationpoint')->middleware('admin');

    Route::get('/genenrationCategorie', [CoureurcategorieController::class, 'genenrationCategorie'])->name('coureurcategorie.genenrationCategorie')->middleware('admin');

    Route::get('/listePenalite', [PenaliteController::class, 'versListePenalite'])->name('penalite.versListePenalite')->middleware('admin');
    Route::get('/versAjoutPenalite', [PenaliteController::class, 'versAjoutPenalite'])->name('penalite.versAjoutPenalite')->middleware('admin');
    Route::post('/ajoutPenalite', [PenaliteController::class, 'ajoutPenalite'])->name('penalite.ajoutPenalite')->middleware('admin');
    Route::post('/supprimerPenalite', [PenaliteController::class, 'supprimerPenalite'])->name('penalite.supprimerPenalite')->middleware('admin');


    Route::get('/reintialisationBaseDeDonnee', [EquipeController::class, 'reintialisationBaseDeDonnee'])->name('penalite.reintialisationBaseDeDonnee')->middleware('admin');
//admin


//equipe
    Route::get('/versImportationPoint', [PointetapeController::class, 'versImportationPoint'])->name('pointetape.versImportationPoint')->middleware('admin');
//equipe


//admin equipe//
Route::get('/versClassementEquipeCategorie', [CourseController::class, 'versClassementEquipeCategorie'])->name('course.versClassementEquipeCategorie');
Route::get('/versClassementEquipeCategorieAdmin', [CourseController::class, 'versClassementEquipeCategorieAdmin'])->name('course.versClassementEquipeCategorieAdmin');

Route::get('/genererPdfCertificat', [EquipeController::class, 'genererPdfCertificat'])->name('equipe.genererPdfCertificat');
Route::get('/detailPointEquipe/{equipe}', [EquipeController::class, 'detailPointEquipe'])->name('equipe.detailPointEquipe');

//admin equipe//





Route::get('/testefotsiny', function () {
   return view('profilEquipeAdmin.certificat');
});



