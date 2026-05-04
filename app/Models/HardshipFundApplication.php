<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HardshipFundApplication extends Model
{
    protected $table = 'hardship_fund_applications';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'age',
        'nationality',
        'id_number',
        'is_permanent_resident',
        'residential_address',
        'university',
        'faculty_school',
        'department',
        'programme',
        'level',
        'year_of_study',
        'expected_graduation_date',
        'current_gpa',
        'stem_field',
        'stem_other',
        'proof_enrolment_path',
        'transcript_path',
        'support_letter_path',
        'faculty_member_name',
        'faculty_position',
        'faculty_university',
        'id_document_path',
        'personal_statement',
        'personal_statement_file_path',
        'financial_aid',
        'financial_aid_specify',
        'financial_explanation',
        'signature_path',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'is_permanent_resident' => 'boolean',
        'financial_aid' => 'boolean',
    ];

    public const STATUS_PENDING = 'pending';
    public const STATUS_UNDER_REVIEW = 'under_review';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';

    public static function statusLabels(): array
    {
        return [
            self::STATUS_PENDING     => 'Pending',
            self::STATUS_UNDER_REVIEW => 'Under review',
            self::STATUS_APPROVED    => 'Approved',
            self::STATUS_REJECTED    => 'Rejected',
        ];
    }

    public function getFullNameAttribute(): string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}
