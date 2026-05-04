<?php

return [

    /*
    |--------------------------------------------------------------------------
    | My AIRID Portal – External application URLs
    |--------------------------------------------------------------------------
    |
    | URLs for external systems displayed on the My AIRID portal page.
    | Set in .env (e.g. PORTAL_SOP_URL=https://...) or leave null to hide
    | or use placeholder # until the link is available.
    |
    */

    'external' => [
        'provider_registration_form' => env('PORTAL_PROVIDER_REGISTRATION_FORM_URL', 'https://forms.gle/5rea4mDT8xRTy24J7'),
        'sop' => env('PORTAL_SOP_URL', '#'),
        'data_processing' => env('PORTAL_DATA_PROCESSING_URL', '#'),
        'data_loggers' => env('PORTAL_DATA_LOGGERS_URL', '#'),
        'devis_facture' => env('PORTAL_DEVIS_FACTURE_URL', '#'),
        'guineapig_record' => env('PORTAL_GUINEAPIG_RECORD_URL', '#'),
    ],

];
