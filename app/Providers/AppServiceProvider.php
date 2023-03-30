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

        $nblivres = DB::table('livres')->count();
        View::share('nblivres', $nblivres);

        $nbauteurs = DB::table('auteurs')->count();
        View::share('nbauteurs', $nbauteurs);

       // $nblivres = DB::table('livres')
        //->select('count(*) as nblivres')
        //->get();

    }
}
