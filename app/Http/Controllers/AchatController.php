<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Achat;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use DB;

class AchatController extends Controller
{
    public function index(): View
    {

       $achats = DB::table('achats')
       ->select('achats.id as id', 'fournisseurs.Libelle as LibelleFournisseur', 'livres.Titre'
       , 'sites.Libelle as LibelleSite', 
       'achats.NumFacture', 'achats.Quantite', 'achats.DateAchat', 'auteurs.Nom', 'auteurs.Prenom')
       ->leftJoin('fournisseurs', 'fournisseurs.id', '=', 'achats.IdFournisseur')
       ->leftJoin('livres', 'livres.id', '=', 'achats.IdLivre')
       ->leftJoin('auteurs', 'auteurs.id', '=', 'livres.IdAuteur')
       ->leftJoin('sites', 'sites.id', '=', 'achats.IdSite')
       ->orderBy('achats.DateAchat', 'desc')
       ->get();

         return view ('achats.index')->with('achats', $achats);

    }
 
    public function create(): View
    {
        return view('achats.create');
    }
 
  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Achat::create($input);
        return redirect('achats')->with('flash_message', 'achat Addedd!');
    }
 
    public function show(string $id): View
    {
        $achat = Achat::find($id);
        return view('achats.show')->with('achats', $site);
    }
 
    public function edit(string $id): View
    {
        $achat = Achat::find($id);
        return view('achats.edit')->with('achat', $achat);
    }
 
    public function update(Request $request, string $id): RedirectResponse
    {
        $achat = Achat::find($id);
        $input = $request->all();
        $achat->update($input);
        return redirect('achats')->with('flash_message', 'achat Updated!');  
    }
 
    
    public function destroy(string $id): RedirectResponse
    {
        Achat::destroy($id);
        return redirect('achats')->with('flash_message', 'achat deleted!');
    }
}
