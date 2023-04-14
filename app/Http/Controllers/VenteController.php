<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vente;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use DB;

class VenteController extends Controller
{
    public function index(): View
    {

       $ventes = DB::table('ventes')
       ->select('ventes.id as id', 'livres.Titre'
       , 'sites.Libelle as LibelleSite', 
       'ventes.NumFacture', 'ventes.Quantite', 'ventes.DateVente', 'auteurs.Nom', 'auteurs.Prenom')
       ->leftJoin('livres', 'livres.id', '=', 'ventes.IdLivre')
       ->leftJoin('auteurs', 'auteurs.id', '=', 'livres.IdAuteur')
       ->leftJoin('sites', 'sites.id', '=', 'ventes.IdSite')
       ->orderBy('ventes.DateVente', 'desc')
       ->get();

         return view ('ventes.index')->with('ventes', $ventes);

    }
 
    public function create(): View
    {
        return view('ventes.create');
    }
 
  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Vente::create($input);
        return redirect('ventes')->with('flash_message', 'vente Addedd!');
    }
 
    public function show(Request $request): View
    {

        $data = DB::table('achats')
        ->select('achats.IdLivre' ,'livres.Titre', 'sites.Libelle as LibelleSite', 'ville.Ville',
        DB::raw("(sum(achats.Quantite)) as QtiteAchat")
        )
         ->leftJoin('livres', 'livres.id', '=', 'achats.IdLivre')
         ->leftJoin('sites', 'sites.id', '=', 'achats.IdSite')
         ->leftJoin('ville', 'sites.IdVille', '=', 'ville.id')
         ->where('IdLivre','=',$request->id)
        // ->where('sites.id','=',$idSite)
         ->groupBy('sites.Libelle','ville.Ville','achats.IdLivre' ,'livres.Titre')
         ->orderBy('livres.Titre')
         ->get();

       //  $NomLivre=Livre::where('id', $id)->first();

       //  $StockLivreSiteChoisi =  $StockLivreSite::find($id);

       //  dd($StockLivreSiteActuel);

       return response()->json($data);

        // return view('ventes.show')->with('StockLivreSiteActuel', $StockLivreSiteActuel);








        $vente = Vente::find($id);
        return view('ventes.show')->with('ventes', $vente);
    }
 
    public function edit(string $id): View
    {
        $vente = Vente::find($id);
        return view('ventes.edit')->with('vente', $vente);
    }
 
    public function update(Request $request, string $id): RedirectResponse
    {
        $vente = Vente::find($id);
        $input = $request->all();
        $vente->update($input);
        return redirect('ventes')->with('flash_message', 'vente Updated!');  
    }
 
    
    public function destroy(string $id): RedirectResponse
    {
        Vente::destroy($id);
        return redirect('ventes')->with('flash_message', 'vente deleted!');
    }
}
