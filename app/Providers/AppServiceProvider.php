<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use DB;
use App\Models\Categorie;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $categories = DB::table('categories')->orderBy('Libelle', 'asc')->get();
        View::share('categories', $categories);

        $auteurs = DB::table('auteurs')->orderBy('Nom', 'asc')->get();
        View::share('auteurs', $auteurs);

        $fournisseurs = DB::table('fournisseurs')->orderBy('Libelle', 'asc')->get();
        View::share('fournisseurs', $fournisseurs);

        $villes = DB::table('ville')->orderBy('ville', 'asc')->get();
        View::share('villes', $villes);

        $sites = DB::table('sites')->orderBy('Libelle', 'asc')->get();
        View::share('sites', $sites);

        $nblivres = DB::table('livres')->count();
        View::share('nblivres', $nblivres);

        $nbauteurs = DB::table('auteurs')->count();
        View::share('nbauteurs', $nbauteurs);

        $nbachats = DB::table('achats')->count();
        View::share('nbachats', $nbachats);

        $nbventes = DB::table('ventes')->count();
        View::share('nbventes', $nbventes);

       $livres = DB::table('livres')
       ->select('livres.id as id', 'livres.Titre', 'livres.IdCategorie', 'livres.DateParution',
             'categories.Libelle as Libelle', 'auteurs.Nom', 'auteurs.Prenom')
       ->leftJoin('categories', 'categories.id', '=', 'livres.IdCategorie')
       ->leftJoin('auteurs', 'auteurs.id', '=', 'livres.IdAuteur')
       ->orderBy('livres.Titre', 'asc')
       ->get();
       View::share('livres', $livres);


      
       // dd($Listeachats);


       // $nblivres = DB::table('livres')
        //->select('count(*) as nblivres')
        //->get();

    }
}
