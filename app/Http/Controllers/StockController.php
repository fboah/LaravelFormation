<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stock;
use App\Models\Livre;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

use DB;

class StockController extends Controller
{
    //STOCK

    public function SiteByLivre(string $id)
    {
        $siteLivre = DB::table('achats')
        ->select('achats.IdSite',  
              \DB::Raw("SUM(Quantite) as Qtite"))
             // ->leftJoin('sites', 'achats.IdSite', '=', 'sites.id')
              
        ->orderby('Qtite','desc')
        ->groupby('IdSite')
        ->havingRaw('Qtite >  0')
        ->where('IdLivre','=',$id)
        ->get();

        dd($siteLivre);

      return response()->json($siteLivre);//->with('chartData', $chartData);
   
    }


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
        ->select('achats.IdLivre' ,'livres.Titre', 'sites.Libelle as LibelleSite', 'ville.Ville',
        DB::raw("(sum(achats.Quantite)) as QtiteAchat")
        )
         ->leftJoin('livres', 'livres.id', '=', 'achats.IdLivre')
         ->leftJoin('sites', 'sites.id', '=', 'achats.IdSite')
         ->leftJoin('ville', 'sites.IdVille', '=', 'ville.id')
         ->where('IdLivre','=',$id)
         ->groupBy('sites.Libelle','ville.Ville','achats.IdLivre' ,'livres.Titre')
         ->orderBy('livres.Titre')
         ->get();

         $NomLivre=Livre::where('id', $id)->first();

       //  $StockLivreSiteChoisi =  $StockLivreSite::find($id);

         //dd($NomLivre);

         return view('stock.show')->with('StockLivreSite', $StockLivreSite)->with('NomLivre', $NomLivre);

    }
}
