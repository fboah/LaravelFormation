<?php

namespace App\Http\Controllers;
use App\Models\Auteur;
use App\Models\Livre;
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

    public function afficherLivre()
    {
      //   $StockLivreSite =DB::select('');
            $livres = Livre::orderBy('Titre','asc')->get();

         //dd($StockLivreSite);

         return view('StatLivre.show')->with('livres', $livres);

    }

    public function afficherAgenceByAuteur(string $idauteur)
    {
      
     // $agences = Site::orderBy('Libelle','asc')->get();

      $AgenceStock =DB::select(' select  A.Libelle, (IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0)) as QtiteStock from 
      (select sites.id,sites.Libelle,(sum(IFNULL(achats.Quantite,0)) )as QtiteAchat
      from achats 
         left Join livres ON livres.id=achats.IdLivre
      left Join sites ON sites.id=achats.IdSite
      left Join auteurs ON auteurs.id=livres.IdAuteur
      where auteurs.id='.$idauteur.'
      group By sites.id,sites.Libelle)A
      Left join 
      (select sites.id,sites.Libelle,(sum(IFNULL(ventes.Quantite,0)))as QtiteVente
      from ventes 
      left Join livres ON livres.id=ventes.IdLivre
         left Join sites ON sites.id=ventes.IdSite
         left Join auteurs ON auteurs.id=livres.IdAuteur
         where auteurs.id='.$idauteur.'
      group By sites.id,sites.Libelle)B on A.id=B.id
      where (IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0))>0');

      $dataAutAgenceByAuteur="";
     // foreach($AgenceStock as $val){
      // $dataAutAgenceByAuteur.="['".$val->Libelle."',".$val->QtiteStock."],";
      //}
     

      // //  dd($AgenceStock);
        // return view('StatAuteur.show')->with('dataAutAgenceByAuteur', $dataAutAgenceByAuteur);

         $Libelle=array();
         $QtiteStock=array();

          foreach($AgenceStock as $item){
           $Libelle[]=$item->Libelle;
           $QtiteStock[]=$item->QtiteStock;
          }
        //dd($img);
        
         return response()->json(['Agence' => $Libelle,'QtiteStock' => $QtiteStock]);

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



    public function afficherAgenceByLivre (string $idlivre)
    {
         $StatAuteur =DB::select(' select  A.Titre,A.Libelle, (IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0)) as QtiteStock from 
         (select achats.IdLivre,livres.Titre, sites.id,sites.Libelle,(sum(IFNULL(achats.Quantite,0)) )as QtiteAchat
         from achats 
            left Join livres ON livres.id=achats.IdLivre
         left Join sites ON sites.id=achats.IdSite
           where livres.id='.$idlivre.'  
         group By achats.IdLivre,livres.Titre,sites.id,sites.Libelle)A
         Left join 
         (select ventes.IdLivre,livres.Titre, sites.id,sites.Libelle,(sum(IFNULL(ventes.Quantite,0)))as QtiteVente
         from ventes 
         left Join livres ON livres.id=ventes.IdLivre
            left Join sites ON sites.id=ventes.IdSite
           where livres.id='.$idlivre.'  
         group By ventes.IdLivre,livres.Titre,sites.id,sites.Libelle)B on A.id=B.id
         where (IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0))>0');

         $Agence=array();
         $QtiteStock=array();
        

          foreach($StatAuteur as $item){
             // dd($item->Titre);
           // $html.='<option value="'.$item->IdSite.'">'.$item->Libelle.'</option>';
           $Agence[]=$item->Libelle;
           $QtiteStock[]=$item->QtiteStock;
         
            //data[0].QtiteStock
          }
        //dd($img);
         ////$html=' <option id="IdLivre" value="0">Choisir un Site</option>';

      // return response()->json($QtiteStock);

         return response()->json(['Agence' => $Agence,'QtiteStock' => $QtiteStock]);

        // return view('StatAuteur.show')->with($QtiteStock);

    }


    public function afficherAchat()
    {
      $StatAchat =DB::select('select achats.DateAchat,COUNT(achats.id) as NbreAchat
      from achats
      group by achats.DateAchat
      order by achats.DateAchat ');

       //  dd($StatAchat);

      $dataAchat="";
      foreach($StatAchat as $val){
       $dataAchat.="['".date('d-m-Y',strtotime($val->DateAchat))."',".$val->NbreAchat."],";
      }
     
      //date('Y-m-d',strtotime(.DateAchat.))
    

       //  dd($AgenceStock);
        
         return view('StatAchat.show')->with('dataAchat', $dataAchat);

    }



    public function afficherVente()
    {
      $StatVente =DB::select('select ventes.DateVente,COUNT(ventes.id) as NbreVente
      from ventes
      group by ventes.DateVente
      order by ventes.DateVente ');

       //  dd($StatAchat);

      $dataVente="";
      foreach($StatVente as $val){
       $dataVente.="['".date('d-m-Y',strtotime($val->DateVente))."',".$val->NbreVente."],";
      }
      //date('Y-m-d',strtotime(.DateAchat.))
    
       //  dd($AgenceStock);
        
         return view('StatVente.show')->with('dataVente', $dataVente);

    }


    






}
