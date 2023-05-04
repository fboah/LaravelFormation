<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auteur;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

use Illuminate\Providers;

use DB;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index(): View
    {
       // $categories = Categorie::all();

        $auteurs = Auteur::orderBy('Nom','asc')->get();

       // $categories = DB::table('categories')
        //->orderBy('Libelle', 'asc')
        //->get();
       
        return view ('auteurs.index')->with('auteurs', $auteurs);
       
      
    }
 
    public function create(): View
    {
        return view('auteurs.create');
    }
 
  
    public function store(Request $request): RedirectResponse
    {
        //dd($request);

        $input = $request->all();

        $img=$request->file('Image');
    

        if($img){

           // $destination_path='images/';
           // $profileImage=date('YmdHi').".".$toto;

           // $img->move($destination_path,$profileImage);

         // // $img->store('Image', 'public\images');

           // // $input['Image']= $profileImage;

          //  $file= $request->file('Image');
            //$filename= date('YmdHi').$file->getClientOriginalExtension();
            //$file-> move(public_path('/images'), date('YmdHi').$filename);
           
            
            $filename= $request->getschemeAndHttpHost().'/images/'.time().'.'.$request->Image->extension();
           
            $nomImage=time().'.'.$request->Image->extension();
            //uploader l'image
            $img-> move(public_path('images'),$filename);

            $input['Image']= $nomImage;
        }
     
        Auteur::create($input);
        return redirect('auteurs')->with('flash_message', 'auteur Addedd!');
    }
 
    public function show(string $id): View
    {
        $auteur = Auteur::find($id);

       // $livreauteur = DB::table('posts')->where('id','=',1)

        $livreauteur = DB::table('livres')
        ->select('livres.id as id', 'livres.Titre', 'livres.IdCategorie', 'livres.DateParution',
              'categories.Libelle as Libelle', 'auteurs.Nom', 'auteurs.Prenom')
        ->leftJoin('categories', 'categories.id', '=', 'livres.IdCategorie')
        ->leftJoin('auteurs', 'auteurs.id', '=', 'livres.IdAuteur')
        ->where('IdAuteur','=',$id)
        ->orderBy('livres.Titre', 'asc')
        ->get();

        return view('auteurs.show')->with('auteurs', $auteur)->with('livreauteur', $livreauteur);
    }
 
    public function edit(string $id): View
    {
        $auteur = Auteur::find($id);
        return view('auteurs.edit')->with('auteur', $auteur);
    }
 
    public function update(Request $request, string $id): RedirectResponse
    {
        $auteur = Auteur::find($id);
        $input = $request->all();
      

        //Télécharger image
        $img=$request->file('Image');
    

        if($img){

            $filename= $request->getschemeAndHttpHost().'/images/'.time().'.'.$request->Image->extension();
           
            $nomImage=time().'.'.$request->Image->extension();
            //uploader l'image
            $img-> move(public_path('images'),$filename);

            $input['Image']= $nomImage;
        }
        else
        {
            //Utiliser l'image déjà sauvegardée au cas où on en a pas défini
            
             $imgsauv=$auteur['Image'];
             $input['Image']= $imgsauv;

        }
     
        $auteur->update($input);
        return redirect('auteurs')->with('flash_message', 'auteur Updated!');  
    }
 
    
    public function destroy(string $id): RedirectResponse
    {
        Auteur::destroy($id);
        return redirect('auteurs')->with('flash_message', 'auteur deleted!');
    }
}
