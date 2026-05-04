<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Géolocalisation par IP (pays des visiteurs)
    |--------------------------------------------------------------------------
    |
    | Par défaut activé : le pays est résolu via ip-api.com pour chaque nouvelle
    | visite. Sur LWS ou si les appels sortants sont bloqués, mettez dans .env :
    | ANALYTICS_GEO_LOOKUP=false
    |
    */

    'geo_lookup_enabled' => env('ANALYTICS_GEO_LOOKUP', true),

];
