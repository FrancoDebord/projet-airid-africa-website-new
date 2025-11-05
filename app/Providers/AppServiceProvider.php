<?php

namespace App\Providers;

use App\Models\AIRID_Departement;
use App\Models\AIRID_Partenaire;
use App\Models\Departement;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
         if (app()->environment('production')) {
            URL::forceScheme('https');
        }
        
         // $departements_menu = [];
        $departements_menu = AIRID_Departement::where("afficher_menu",1)->get();
        view()->share("departements_menu",$departements_menu);

           $all_partenaires = AIRID_Partenaire::all();
        view()->share("all_partenaires",$all_partenaires);
    }
}
