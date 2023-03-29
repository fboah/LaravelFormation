<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livre;
use App\Models\Categorie;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

use DB;

class LivreController extends Controller
{
   

    public function index(): View
    {
       // $livres = Livre::all();
      // return view ('livres.index')->with('livres', $livres);

       $livres = DB::table('livres')
       ->select('livres.id as id', 'livres.Titre', 'livres.IdCategorie', 'livres.DateParution',
             'categories.Libelle as Libelle')
       ->leftJoin('categories', 'categories.id', '=', 'livres.IdCategorie')
       ->orderBy('livres.Titre', 'asc')
       ->get();

        //return view ('livres.index',compact('livres','categories'));
         return view ('livres.index')->with('livres', $livres);


      //  $livres = DB::table('livres')->get();
        //$categories = DB::table('categories')->get();

      //  return view ('livres.index',compact('livres','categories'));
    }
 
    public function create(): View
    {
        return view('livres.create');
    }
 
  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Livre::create($input);
        return redirect('livres')->with('flash_message', 'Livre Addedd!');
    }
 
    public function show(string $id): View
    {
        $livre = Livre::find($id);
        return view('livres.show')->with('livres', $livre);
    }
 
    public function edit(string $id): View
    {
        $livre = Livre::find($id);
        return view('livres.edit')->with('livre', $livre);
    }
 
    public function update(Request $request, string $id): RedirectResponse
    {
        $livre = Livre::find($id);
        $input = $request->all();
        $livre->update($input);
        return redirect('livres')->with('flash_message', 'livre Updated!');  
    }
 
    
    public function destroy(string $id): RedirectResponse
    {
        Livre::destroy($id);
        return redirect('livres')->with('flash_message', 'livre deleted!');
    }
}
