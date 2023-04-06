<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\SiteController;

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
    return view('Bienvenue');
});


Route::get('/test/{username}',[TestController::class,'methode1']);

Route::get('/accueil',[TestController::class,'accueil']);

//Route::get('/livres',[LivreController::class,'index']);

Route::resource("/livres", LivreController::class);

Route::resource("/categories", CategorieController::class);

Route::resource("/auteurs", AuteurController::class);

Route::resource("/fournisseurs", FournisseurController::class);

Route::resource("/sites", SiteController::class);

//Route::resource("/", WelcomeController::class);




