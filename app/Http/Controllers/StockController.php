<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stock;
use App\Models\Livre;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

use DB;

class StockController extends Controller
{
    //STOCK

    public function SiteByLivre(string $id)
    {
      $html=' <option id="IdLivre" value="0">Choisir un Site</option>';
       // $siteLivre = DB::table('achats')
        //->select('achats.IdSite', 'sites.Libelle', 
          //    \DB::Raw("SUM(achats.Quantite) as Qtite"))
            //  ->leftJoin('sites', 'achats.IdSite', '=', 'sites.id')
              //->havingRaw('Qtite >  0')
       //->where('achats.IdLivre','=',$id)
        //->orderby('Qtite','desc')
       // ->groupby('achats.IdSite','sites.Libelle')
        //->get();

        $siteLivre =DB::select('select A.IdSite, A.Libelle, (IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0)) as QtiteStock from 
        (select achats.IdSite, sites.Libelle,achats.IdLivre,(sum(IFNULL(achats.Quantite,0)) )as QtiteAchat
        from achats 
        left Join livres ON livres.id=achats.IdLivre 
        left Join sites ON sites.id=achats.IdSite 
        where IdLivre='.$id.' 
        group By achats.IdLivre,achats.IdSite,sites.Libelle)A
        Left join 
        (select ventes.IdSite, sites.Libelle,ventes.IdLivre,(sum(IFNULL(ventes.Quantite,0)))as QtiteVente
        from ventes 
        left Join livres ON livres.id=ventes.IdLivre
         left Join sites ON sites.id=ventes.IdSite 
        where IdLivre='.$id.'
        group By ventes.IdLivre,ventes.IdSite,sites.Libelle)B on A.IdSite=B.IdSite
        
        where (IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0))>0');

    //    dd($siteLivre);
       
       foreach($siteLivre as $item){
         $html.='<option value="'.$item->IdSite.'">'.$item->Libelle.'</option>';
       }

      // dd($html);
     
      return response()->json($html);//->with('chartData', $chartData);
   
    }


    public function SiteByLivreStock(string $id,string $idSite)
    {
     // $html="";

     $siteLivreStock =DB::select('select (IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0)) as QtiteStock from 
     (select achats.IdLivre,(sum(IFNULL(achats.Quantite,0)) )as QtiteAchat
     from achats 
     left Join livres ON livres.id=achats.IdLivre 
     where IdLivre= '.$id.' and Idsite= '.$idSite.'
     group By achats.IdLivre)A
     Left join 
     (select ventes.IdLivre,(sum(IFNULL(ventes.Quantite,0)))as QtiteVente
     from ventes 
     left Join livres ON livres.id=ventes.IdLivre 
     where IdLivre= '.$id.' and Idsite= '.$idSite.'
     group By ventes.IdLivre)B on A.IdLivre=B.IdLivre');

      //  $siteLivreStock = DB::table('achats')
       // ->select(//'achats.IdSite', 'sites.Libelle', 
         //     \DB::Raw("SUM(Quantite) as Qtite"))
       //->where('IdLivre','=',$id)
       //->where('IdSite','=',$idSite)
        //->get();
   // dd($siteLivreStock);
     
        return response()->json($siteLivreStock);//->with('chartData', $chartData);
   
    }


    public function index(): View
    {
       // $Listeachats = DB::table('achats')
        //->select('achats.IdLivre' ,"livres.Titre",
         //DB::raw("(sum(achats.Quantite)) as QtiteAchat"))
         //->leftJoin('livres', 'livres.id', '=', 'achats.IdLivre')
         //->groupBy('achats.IdLivre','livres.Titre')
         //->orderBy('livres.Titre')
         //->get();

         $Listeachats =DB::select('select A.IdLivre,A.Titre,(IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0)) as QtiteStock from 
         (select achats.IdLivre,livres.Titre,(sum(IFNULL(achats.Quantite,0)) )as QtiteAchat
         from achats 
         left Join livres ON livres.id=achats.IdLivre 
         group By achats.IdLivre,livres.Titre)A
         Left join 
         (select ventes.IdLivre,livres.Titre,(sum(IFNULL(ventes.Quantite,0)))as QtiteVente
         from ventes 
         left Join livres ON livres.id=ventes.IdLivre 
         group By ventes.IdLivre,livres.Titre)B on A.IdLivre=B.IdLivre order by A.Titre ');

         return view ('stock.index')->with('Listeachats', $Listeachats);

    }


    public function show(string $id): View
    {
      //  $StockLivreSite = DB::table('achats')
        //->select('achats.IdLivre' ,'livres.Titre', 'sites.Libelle as LibelleSite', 'ville.Ville',
        //DB::raw("(sum(achats.Quantite)) as QtiteAchat")
        //)
         //->leftJoin('livres', 'livres.id', '=', 'achats.IdLivre')
         //->leftJoin('sites', 'sites.id', '=', 'achats.IdSite')
         //->leftJoin('ville', 'sites.IdVille', '=', 'ville.id')
         //->where('IdLivre','=',$id)
         //->groupBy('sites.Libelle','ville.Ville','achats.IdLivre' ,'livres.Titre')
         //->orderBy('livres.Titre')
         //->get();

         $StockLivreSite =DB::select('select A.id,A.IdLivre,A.Titre, A.Libelle as LibelleSite , A.Ville,(IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0)) as QtiteStock from 
         (select achats.IdLivre,livres.Titre,sites.id, sites.Libelle , ville.Ville,(sum(IFNULL(achats.Quantite,0)) )as QtiteAchat
         from achats 
         left Join livres ON livres.id=achats.IdLivre 
         left Join sites ON sites.id = achats.IdSite 
         left Join ville ON sites.IdVille=ville.id 
         WHERE IdLivre = '.$id.'
         group By sites.id,sites.Libelle, ville.Ville,achats.IdLivre,livres.Titre)A
         Left join 
         (select ventes.IdLivre,livres.Titre,sites.id, sites.Libelle , ville.Ville,(sum(IFNULL(ventes.Quantite,0)))as QtiteVente
         from ventes 
         left Join livres ON livres.id=ventes.IdLivre 
         left Join sites ON sites.id = ventes.IdSite 
         left Join ville ON sites.IdVille=ville.id
         WHERE IdLivre = '.$id.'
         group By sites.id,sites.Libelle, ville.Ville,ventes.IdLivre,livres.Titre)B on A.id=B.id
         where (IFNULL(A.QtiteAchat,0)-IFNULL(B.QtiteVente,0))>0');

         $NomLivre=Livre::where('id', $id)->first();

         //$StockLivreSite =  $StockLivreSiteChoisi::where('IdLivre',$id);

         //dd($StockLivreSite);

         return view('stock.show')->with('StockLivreSite', $StockLivreSite)->with('NomLivre', $NomLivre);

    }
}
