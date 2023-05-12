<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\HightChartController;
use App\Http\Controllers\StatistiquesController;
use App\Http\Controllers\AuthManager;
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

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//AVANT AUTHENTIFICATION+++++++++++++++++++++++++++


//Route::get('/', function () {
  //  return view('Bienvenue');
//});




Route::middleware('auth')->group(function () {

  Route::get('/',[HightChartController::class,'donutChart']);
   
Route::get('/test/{username}',[TestController::class,'methode1']);

Route::get('/accueil',[TestController::class,'accueil']);

//Route::get('/livres',[LivreController::class,'index']);

Route::resource("/livres", LivreController::class);

Route::resource("/categories", CategorieController::class);

Route::resource("/auteurs", AuteurController::class);

Route::resource("/fournisseurs", FournisseurController::class);

Route::resource("/sites", SiteController::class);


Route::get('/findstock',[VenteController::class,'show']);
Route::resource("/achats", AchatController::class);

Route::resource("/stock", StockController::class);

Route::resource("/ventes", VenteController::class);

//Ramener les sites où se trouve le livre
Route::get('/ventes/createfromstock/{id}',[VenteController::class,'createfromstock']);

//Ramener les sites où se trouve le livre
Route::get('/SiteByLivre/{id}',[StockController::class,'SiteByLivre']);

//Ramener les qtité en fction du livre et du site
Route::get('/SiteByLivreStock/{id}/{idSite}',[StockController::class,'SiteByLivreStock']);

//Statistiques Auteur
Route::get('/StatByAuteur',[StatistiquesController::class,'afficher']);

Route::get('/StatByAuteur/{id}',[StatistiquesController::class,'StatByAuteur']);
Route::get('/StatByAuteurImage/{id}',[StatistiquesController::class,'StatByAuteurImage']);
Route::get('/afficherAgenceByAuteur/{id}',[StatistiquesController::class,'afficherAgenceByAuteur']);


//Statistiques Agence
Route::get('/StatByAgence',[StatistiquesController::class,'afficherAgence']);

Route::get('/StatByAgence/{id}',[StatistiquesController::class,'StatByAgence']);

//Statistiques Livre
Route::get('/StatByLivre',[StatistiquesController::class,'afficherLivre']);

Route::get('/StatByLivre/{id}',[StatistiquesController::class,'StatByLivre']);
Route::get('/afficherAgenceByLivre/{id}',[StatistiquesController::class,'afficherAgenceByLivre']);


//Statistiques Achats
Route::get('/StatByAchat',[StatistiquesController::class,'afficherAchat']);

//Statistiques Ventes
Route::get('/StatByVente',[StatistiquesController::class,'afficherVente']);








Route::get('/home', function () {
    return view('Bienvenue');
});

});




Route::get('/login',[AuthManager::class,'login']);
Route::post('/login',[AuthManager::class,'loginPost']);

Route::get('/registration',[AuthManager::class,'registration']);
Route::post('/registration',[AuthManager::class,'registrationPost']);

Route::get('/logout',[AuthManager::class,'logout']);





require __DIR__.'/auth.php';
