<?php

namespace App\Http\Controllers;
use App\Models\Auteur;
use DB;

use Illuminate\Http\Request;

class StatistiquesController extends Controller
{
    //StatByAuteur


    public function StatByAuteur(string $idauteur)
    {
         $StatAuteur =DB::select('select A.IdLivre,A.Titre, A.Nom,A.Prenom, (IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0)) as QtiteStock from 
         (select achats.IdLivre,livres.Titre,auteurs.Nom,auteurs.Prenom,(sum(IFNULL(achats.Quantite,0)) )as QtiteAchat
         from achats 
            left Join livres ON livres.id=achats.IdLivre
         left Join auteurs ON auteurs.id=livres.IdAuteur
         where auteurs.id='.$idauteur.' 
         group By achats.IdLivre,livres.Titre,auteurs.Nom,auteurs.Prenom)A
         Left join 
         (select ventes.IdLivre,livres.Titre,auteurs.Nom,auteurs.Prenom,(sum(IFNULL(ventes.Quantite,0)))as QtiteVente
         from ventes 
         left Join livres ON livres.id=ventes.IdLivre
         left Join auteurs ON auteurs.id=livres.IdAuteur
         where auteurs.id='.$idauteur.' 
         group By ventes.IdLivre,livres.Titre,auteurs.Nom,auteurs.Prenom)B on A.IdLivre=B.IdLivre
         where (IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0))>0');

         $Titre=array();
         $QtiteStock=array();

          foreach($StatAuteur as $item){
             // dd($item->Titre);
           // $html.='<option value="'.$item->IdSite.'">'.$item->Libelle.'</option>';
           $Titre[]=$item->Titre;
           $QtiteStock[]=$item->QtiteStock;
            //data[0].QtiteStock
          }


         //dd($QtiteStock);
         //$html=' <option id="IdLivre" value="0">Choisir un Site</option>';

        return response()->json($StatAuteur)->with($Titre, $QtiteStock);

        // return view('StatAuteur.show')->with('StatAuteur', $StatAuteur);

    }

    public function afficher()
    {
      //   $StockLivreSite =DB::select('');
      $auteurs = Auteur::orderBy('Nom','asc')->get();

         //dd($StockLivreSite);

         return view('StatAuteur.show')->with('auteurs', $auteurs);

    }

}
