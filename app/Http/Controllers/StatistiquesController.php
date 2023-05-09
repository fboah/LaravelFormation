<?php

namespace App\Http\Controllers;
use App\Models\Auteur;
use App\Models\Site;
use DB;

use Illuminate\Http\Request;

class StatistiquesController extends Controller
{
    //StatByAuteur

    

    public function StatByAuteurImage(string $idauteur)
    {
         $auteur = Auteur::find($idauteur);

        //dd($QtiteStock);
         ////$html=' <option id="IdLivre" value="0">Choisir un Site</option>';

       return response()->json($auteur);

       //  return response()->json(['Titre' => $Titre,'QtiteStock' => $QtiteStock]);

        // return view('StatAuteur.show')->with($QtiteStock);

    }

    public function StatByAuteur(string $idauteur)
    {
         $StatAuteur =DB::select('select A.IdLivre,A.Titre, A.Nom,A.Prenom,A.Image, (IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0)) as QtiteStock from 
         (select achats.IdLivre,livres.Titre,auteurs.Nom,auteurs.Prenom,(sum(IFNULL(achats.Quantite,0)) )as QtiteAchat,auteurs.Image
         from achats 
            left Join livres ON livres.id=achats.IdLivre
         left Join auteurs ON auteurs.id=livres.IdAuteur
         where auteurs.id='.$idauteur.' 
         group By achats.IdLivre,livres.Titre,auteurs.Nom,auteurs.Prenom,auteurs.Image)A
         Left join 
         (select ventes.IdLivre,livres.Titre,auteurs.Nom,auteurs.Prenom,(sum(IFNULL(ventes.Quantite,0)))as QtiteVente,auteurs.Image
         from ventes 
         left Join livres ON livres.id=ventes.IdLivre
         left Join auteurs ON auteurs.id=livres.IdAuteur
         where auteurs.id='.$idauteur.' 
         group By ventes.IdLivre,livres.Titre,auteurs.Nom,auteurs.Prenom,auteurs.Image)B on A.IdLivre=B.IdLivre
         where (IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0))>0');

         $Titre=array();
         $QtiteStock=array();
         $img="";

          foreach($StatAuteur as $item){
             // dd($item->Titre);
           // $html.='<option value="'.$item->IdSite.'">'.$item->Libelle.'</option>';
           $Titre[]=$item->Titre;
           $QtiteStock[]=$item->QtiteStock;
           $img=$item->Image;
            //data[0].QtiteStock
          }
        //dd($img);
         ////$html=' <option id="IdLivre" value="0">Choisir un Site</option>';

      // return response()->json($QtiteStock);

         return response()->json(['Titre' => $Titre,'QtiteStock' => $QtiteStock,'img' => $img]);

        // return view('StatAuteur.show')->with($QtiteStock);

    }

    public function afficher()
    {
      //   $StockLivreSite =DB::select('');
      $auteurs = Auteur::orderBy('Nom','asc')->get();

         //dd($StockLivreSite);

         return view('StatAuteur.show')->with('auteurs', $auteurs);

    }

    public function afficherAgence()
    {
      
      $agences = Site::orderBy('Libelle','asc')->get();

      $AgenceStock =DB::select(' select  A.Libelle, (IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0)) as QtiteStock from 
      (select sites.id,sites.Libelle,(sum(IFNULL(achats.Quantite,0)) )as QtiteAchat
      from achats 
         left Join livres ON livres.id=achats.IdLivre
      left Join sites ON sites.id=achats.IdSite
      group By sites.id,sites.Libelle)A
      Left join 
      (select sites.id,sites.Libelle,(sum(IFNULL(ventes.Quantite,0)))as QtiteVente
      from ventes 
      left Join livres ON livres.id=ventes.IdLivre
         left Join sites ON sites.id=ventes.IdSite
      group By sites.id,sites.Libelle)B on A.id=B.id
      where (IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0))>0');

      $dataAutAgence="";
      foreach($AgenceStock as $val){
       $dataAutAgence.="['".$val->Libelle."',".$val->QtiteStock."],";
      }
     

       //  dd($AgenceStock);
         return view('StatAgence.show')->with('agences', $agences)->with('dataAutAgence', $dataAutAgence);

    }

    

    public function StatByAgence(string $idsite)
    {
         $StatAuteur =DB::select('select A.IdLivre,A.Titre, A.Libelle, (IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0)) as QtiteStock from 
         (select achats.IdLivre,livres.Titre,sites.id,sites.Libelle,(sum(IFNULL(achats.Quantite,0)) )as QtiteAchat
         from achats 
            left Join livres ON livres.id=achats.IdLivre
         left Join sites ON sites.id=achats.IdSite
         where sites.id='.$idsite.'  
         group By achats.IdLivre,livres.Titre,sites.id,sites.Libelle)A
         Left join 
         (select ventes.IdLivre,livres.Titre,sites.id,sites.Libelle,(sum(IFNULL(ventes.Quantite,0)))as QtiteVente
         from ventes 
         left Join livres ON livres.id=ventes.IdLivre
            left Join sites ON sites.id=ventes.IdSite
         where sites.id='.$idsite.'  
         group By ventes.IdLivre,livres.Titre,sites.id,sites.Libelle)B on A.IdLivre=B.IdLivre
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
        //dd($img);
         ////$html=' <option id="IdLivre" value="0">Choisir un Site</option>';

      // return response()->json($QtiteStock);

         return response()->json(['Titre' => $Titre,'QtiteStock' => $QtiteStock]);

        // return view('StatAuteur.show')->with($QtiteStock);

    }


}
