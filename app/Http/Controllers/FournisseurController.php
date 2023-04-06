<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;



use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class FournisseurController extends Controller
{
    
    public function index(): View
    {
       // $categories = Categorie::all();

        $fournisseurs = Fournisseur::orderBy('Libelle','asc')->get();

       // $categories = DB::table('categories')
        //->orderBy('Libelle', 'asc')
        //->get();
       
        return view ('fournisseurs.index')->with('fournisseurs', $fournisseurs);
       
      
    }
 
    public function create(): View
    {
        return view('fournisseurs.create');
    }
 
  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Fournisseur::create($input);
        return redirect('fournisseurs')->with('flash_message', 'fournisseur Addedd!');
    }
 
    public function show(string $id): View
    {
        $fournisseur = Fournisseur::find($id);
      
        return view('fournisseurs.show')->with('fournisseurs', $fournisseur);
    }
 
    public function edit(string $id): View
    {
        $fournisseur = Fournisseur::find($id);
        return view('fournisseurs.edit')->with('fournisseur', $fournisseur);
    }
 
    public function update(Request $request, string $id): RedirectResponse
    {
        $fournisseur = Fournisseur::find($id);
        $input = $request->all();
        $fournisseur->update($input);
        return redirect('fournisseurs')->with('flash_message', 'fournisseur Updated!');  
    }
 
    
    public function destroy(string $id): RedirectResponse
    {
        Fournisseur::destroy($id);
        return redirect('fournisseurs')->with('flash_message', 'fournisseur deleted!');
    }
}
