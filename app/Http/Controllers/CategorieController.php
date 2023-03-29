<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use DB;



class CategorieController extends Controller
{
     

    public function index(): View
    {
       // $categories = Categorie::all();

        $categories = Categorie::orderBy('Libelle','asc')->get();

       // $categories = DB::table('categories')
        //->orderBy('Libelle', 'asc')
        //->get();
       
        return view ('categories.index')->with('categories', $categories);
       
      
    }
 
    public function create(): View
    {
        return view('categories.create');
    }
 
  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Categorie::create($input);
        return redirect('categories')->with('flash_message', 'categorie Addedd!');
    }
 
    public function show(string $id): View
    {
        $categorie = Categorie::find($id);
      
        return view('categories.show')->with('categories', $categorie);
    }
 
    public function edit(string $id): View
    {
        $categorie = Categorie::find($id);
        return view('categories.edit')->with('categorie', $categorie);
    }
 
    public function update(Request $request, string $id): RedirectResponse
    {
        $categorie = Categorie::find($id);
        $input = $request->all();
        $categorie->update($input);
        return redirect('categories')->with('flash_message', 'categorie Updated!');  
    }
 
    
    public function destroy(string $id): RedirectResponse
    {
        Categorie::destroy($id);
        return redirect('categories')->with('flash_message', 'categorie deleted!');
    }
}
