<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AIRID_Vacancies extends Model
{
    protected $table = 'airid_vacancies';

    protected $fillable = [
        'job_title',
        'contract_type',
        'location',
        'application_deadline',
        'url_page',
        'email_apply',
        'subject',
        'application_file_fr',
        'application_file_en',
        'intitule_recrutement',
        'type_contrat_propose',
        'a_propos_airid',
        'resume_poste',
        'responsabilites_principales',
        'qualifications',
        'offre',
        'comment_postuler',
        'date_fin_candidature',
        'plus_info',
        'note_info',
        'active',
        'application_lunch_date',
    ];
}
