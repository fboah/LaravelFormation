<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stock;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

use DB;

class StockController extends Controller
{
    //STOCK

    public function index(): View
    {

        $Listeachats = DB::table('achats')
        ->select('achats.IdLivre' ,"livres.Titre",
         DB::raw("(sum(achats.Quantite)) as QtiteAchat"))
         ->leftJoin('livres', 'livres.id', '=', 'achats.IdLivre')
         ->groupBy('achats.IdLivre','livres.Titre')
         ->orderBy('livres.Titre')
         ->get();


         return view ('stock.index')->with('Listeachats', $Listeachats);

    }


    public function show(string $id): View
    {
        $StockLivreSite = DB::table('achats')
        ->select('achats.IdLivre' ,"livres.Titre", 'sites.Libelle as LibelleSite', 'achats.Quantite'
        , 'ville.Ville')
         ->leftJoin('livres', 'livres.id', '=', 'achats.IdLivre')
         ->leftJoin('sites', 'sites.id', '=', 'achats.IdSite')
         ->leftJoin('ville', 'sites.IdVille', '=', 'ville.id')
         ->where('IdLivre','=',$id)
         ->orderBy('livres.Titre')
         ->get();

       //  $StockLivreSiteChoisi =  $StockLivreSite::find($id);

        // dd($StockLivreSite);

         return view('stock.show')->with('StockLivreSite', $StockLivreSite);

    }
}
