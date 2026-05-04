<?php

namespace App\Providers;

use App\Models\AIRID_Departement;
use App\Models\AIRID_Partenaire;
use App\Models\Departement;
use App\Models\SiteVisit;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Log;
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
        Paginator::useBootstrapFive();

        if (app()->environment('production')) {
            URL::forceScheme('https');
            // Forcer l'URL sans www pour toutes les vues (liens, routes, assets)
            $appUrl = config('app.url');
            $host = parse_url($appUrl, PHP_URL_HOST);
            if ($host && str_starts_with(strtolower($host), 'www.')) {
                $canonicalUrl = preg_replace('#^(https?://)www\.#i', '$1', $appUrl);
                URL::forceRootUrl(rtrim($canonicalUrl, '/'));
            }
        }

        // Base URL pour les assets (pour les vues qui l'utilisent) : basée sur APP_URL, sans www.
        $assetBaseUrl = rtrim(preg_replace('#/public/?$#', '', config('app.url')), '/');
        $assetBaseUrl = preg_replace('#^(https?://)www\.#i', '$1', $assetBaseUrl);
        view()->share('assetBaseUrl', $assetBaseUrl);

        // Ne jamais forcer une autre origine pour asset() : les CSS/JS doivent se charger depuis le même domaine que le site.
        // (Ancienne config FRONTEND_ASSET_URL désactivée pour éviter que les styles ne se chargent pas en local.)

        try {
            // $departements_menu = [];
            $departements_menu = AIRID_Departement::where("afficher_menu", 1)->get();
            view()->share("departements_menu", $departements_menu);

            $all_partenaires = AIRID_Partenaire::all();
            view()->share("all_partenaires", $all_partenaires);

            $footerVisitorCount = 0;
            if (Schema::hasTable('site_visits')) {
                $footerVisitorCount = SiteVisit::count();
            }
            view()->share('footerVisitorCount', $footerVisitorCount);
        } catch (\Throwable $e) {
            Log::error('Failed to load shared data', ['error' => $e->getMessage()]);
            view()->share("departements_menu", collect());
            view()->share("all_partenaires", collect());
            view()->share('footerVisitorCount', 0);
        }
    }
}
