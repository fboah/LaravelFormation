<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HightChartController extends Controller
{
    //donut-chart

    public function donutChart()
    {
        $livrescount = DB::table('livres')
        ->select('livres.id as id', 'livres.Titre', 
              \DB::Raw("SUM(Quantite) as Qtite"))
        ->leftJoin('achats', 'achats.IdLivre', '=', 'livres.id')
        ->orderby('Qtite','desc')
        ->groupby('id','Titre')
        ->havingRaw('Qtite >  0')
        ->limit(10)
        ->get();

       $data="";
       foreach($livrescount as $val){
        $data.="['".$val->Titre."',".$val->Qtite."],";
       }

       $chartData=$data;


       //Les auteurs
       $auteurscount = DB::table('auteurs')
       ->select('auteurs.id as id','auteurs.Nom','auteurs.Prenom', 
             \DB::Raw("Count(livres.id) as Qtite"))
       ->leftJoin('livres', 'livres.IdAuteur', '=', 'auteurs.id')
       ->orderby('Qtite','desc')
       ->groupby('id','Nom','Prenom')
       ->havingRaw('Qtite >  0')
       ->limit(5)
       ->get();

       

      $dataAut="";
      foreach($auteurscount as $val){
       $dataAut.="['".$val->Prenom."  ".$val->Nom."',".$val->Qtite."],";
      }

      //dd($dataAut);
      $chartDataAut=$dataAut;

      return view ('Bienvenue',compact('chartDataAut'));//->with('chartData', $chartData);

    }
}
