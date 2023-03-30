<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Auteur;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

use Illuminate\Support\Facades\File;

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

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $input = $request->all();

      //  $file= file('$request->Image');
        //dd("$file");

        $toto=$request->Image;

        if($img=file("D:\EBENYX.png")){

            $destination_path='images/';
            $profileImage=date('YmdHi').".".$toto;

            $img->move($destination_path,$profileImage);

          // $img->store('Image', 'public\images');

             $input['Image']= $profileImage;

            //$file= $request->file("Image")->store('Image', 'public\images');
            //$filename= date('YmdHi').$file->extension();
            //$file-> move(public_path('public/images'), date('YmdHi').$filename);
           // $input['Image']= $filename;
        }
       // $file= $request->Image;
        //dd($file);

        //$image_path = $request->file('Image')->store('Image', 'public\images');
        Auteur::create($input);
        return redirect('auteurs')->with('flash_message', 'auteur Addedd!');
    }
 
    public function show(string $id): View
    {
        $auteur = Auteur::find($id);
      
        return view('auteurs.show')->with('auteurs', $auteur);
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
        $auteur->update($input);
        return redirect('auteurs')->with('flash_message', 'auteur Updated!');  
    }
 
    
    public function destroy(string $id): RedirectResponse
    {
        Auteur::destroy($id);
        return redirect('auteurs')->with('flash_message', 'auteur deleted!');
    }
}
