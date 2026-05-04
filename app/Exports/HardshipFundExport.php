<?php

namespace App\Exports;

use App\Models\HardshipFundApplication;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class HardshipFundExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return HardshipFundApplication::orderBy('created_at', 'desc')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'First name',
            'Last name',
            'Email',
            'Phone',
            'Date of birth',
            'Age',
            'Nationality',
            'ID / Passport number',
            'Permanent resident',
            'Address',
            'University',
            'Faculty / School',
            'Department',
            'Programme (STEM)',
            'Level',
            'Year of study',
            'Expected graduation date',
            'GPA',
            'STEM field',
            'STEM field (other)',
            'Proof of enrolment (file)',
            'Transcript (file)',
            'Support letter (file)',
            'Faculty sponsor name',
            'Faculty sponsor position',
            'Faculty sponsor university',
            'ID / Passport document (file)',
            'Personal statement (file)',
            'Current scholarship / aid',
            'Financial aid specification',
            'Financial explanation',
            'Signature (file)',
            'Status',
            'Admin notes',
            'Submission date',
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->first_name,
            $row->last_name,
            $row->email,
            $row->phone ?? '',
            $row->date_of_birth ? $row->date_of_birth->format('d/m/Y') : '',
            $row->age ?? '',
            $row->nationality ?? '',
            $row->id_number ?? '',
            isset($row->is_permanent_resident) ? ($row->is_permanent_resident ? 'Yes' : 'No') : '',
            $row->residential_address ?? '',
            $row->university ?? '',
            $row->faculty_school ?? '',
            $row->department ?? '',
            $row->programme ?? '',
            $row->level ? ucfirst($row->level) : '',
            $row->year_of_study ?? '',
            $row->expected_graduation_date ?? '',
            $row->current_gpa ?? '',
            $row->stem_field ?? '',
            $row->stem_other ?? '',
            $row->proof_enrolment_path ?? '',
            $row->transcript_path ?? '',
            $row->support_letter_path ?? '',
            $row->faculty_member_name ?? '',
            $row->faculty_position ?? '',
            $row->faculty_university ?? '',
            $row->id_document_path ?? '',
            $row->personal_statement_file_path ?? '',
            isset($row->financial_aid) ? ($row->financial_aid ? 'Yes' : 'No') : '',
            $row->financial_aid_specify ?? '',
            $row->financial_explanation ?? '',
            $row->signature_path ?? '',
            \App\Models\HardshipFundApplication::statusLabels()[$row->status] ?? $row->status,
            $row->admin_notes ?? '',
            $row->created_at ? $row->created_at->format('d/m/Y H:i') : '',
        ];
    }
}
