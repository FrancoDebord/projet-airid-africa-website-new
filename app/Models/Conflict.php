<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conflict extends Model
{
    protected $fillable = [
        'ref_sequence',
        'ref_no',
        'full_name',
        'position_role',
        'department_unit',
        'engagement_type',
        'engagement_other_text',
        'nature_of_conflict',
        'conflict_category',
        'conflict_description',
        'date_declared',
        'email_address',
        'declaration_date_personal',
        'objective_of_declaration',
        'objective_other_text',
        'objective_meeting_date',
        'financial_interest',
        'financial_details',
        'professional_interest',
        'professional_details',
        'personal_interest',
        'personal_details',
        'research_interest',
        'research_details',
        'other_information',
        'declaration_agree',
        'declaration_name',
        'declaration_signature',
        'declaration_date_sign',
        'management_action_agreed',
        'responsible_officer',
        'review_date',
        'status',
        'is_finalized',
        'finalized_at',
    ];

    protected $casts = [
        'financial_interest' => 'boolean',
        'professional_interest' => 'boolean',
        'personal_interest' => 'boolean',
        'research_interest' => 'boolean',
        'declaration_agree' => 'boolean',
        'declaration_date_personal' => 'date',
        'objective_meeting_date' => 'date',
        'declaration_date_sign' => 'date',
        'date_declared' => 'date',
        'review_date' => 'date',
        'is_finalized' => 'boolean',
        'finalized_at' => 'datetime',
    ];
}
