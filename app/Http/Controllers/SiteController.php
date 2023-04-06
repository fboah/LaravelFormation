<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Site;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

use DB;

class SiteController extends Controller
{
    
    public function index(): View
    {
       // $livres = Livre::all();
      // return view ('livres.index')->with('livres', $livres);

       $sites = DB::table('sites')
       ->select('sites.id as id', 'sites.Libelle', 'ville.Ville')
       ->leftJoin('ville', 'ville.id', '=', 'sites.IdVille')
       ->orderBy('sites.Libelle', 'asc')
       ->get();

        //return view ('livres.index',compact('livres','categories'));
         return view ('sites.index')->with('sites', $sites);

    }
 
    public function create(): View
    {
        return view('sites.create');
    }
 
  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Site::create($input);
        return redirect('sites')->with('flash_message', 'site Addedd!');
    }
 
    public function show(string $id): View
    {
        $site = Site::find($id);
        return view('sites.show')->with('sites', $site);
    }
 
    public function edit(string $id): View
    {
        $site = Site::find($id);
        return view('sites.edit')->with('site', $site);
    }
 
    public function update(Request $request, string $id): RedirectResponse
    {
        $site = Site::find($id);
        $input = $request->all();
        $site->update($input);
        return redirect('sites')->with('flash_message', 'site Updated!');  
    }
 
    
    public function destroy(string $id): RedirectResponse
    {
        Site::destroy($id);
        return redirect('sites')->with('flash_message', 'site deleted!');
    }
}
