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
Route::get('/SiteByLivre/{id}',[StockController::class,'SiteByLivre']);



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
