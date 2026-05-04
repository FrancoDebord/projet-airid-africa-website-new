<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New application – AIRID AFRICA–WISE Fund: African Women in Science Empowerment Fund</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 680px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #767474 0%, #c20102 100%); color: #fff; padding: 24px; border-radius: 8px 8px 0 0; }
        .header h1 { margin: 0; font-size: 1.25rem; }
        .content { background: #f8f9fa; padding: 24px; border: 1px solid #dee2e6; border-top: 0; }
        table { width: 100%; border-collapse: collapse; margin: 12px 0; }
        th { text-align: left; padding: 8px 12px; background: #e9ecef; width: 38%; font-size: 0.9rem; }
        td { padding: 8px 12px; border-bottom: 1px solid #dee2e6; }
        .alert { background: #fff3cd; border-left: 4px solid #ffc107; padding: 12px; margin-bottom: 16px; border-radius: 4px; }
        h2 { font-size: 1rem; margin: 18px 0 8px 0; color: #444; }
        .doc-note { background: #e7f3ff; border-left: 4px solid #0d6efd; padding: 12px; margin-top: 16px; font-size: 0.9rem; }
    </style>
</head>
<body>
    <div class="header">
        <h1>African Institute for Research in Infectious Diseases (AIRID)</h1>
        <p style="margin: 0.5rem 0 0 0; opacity: 0.95;">New application – AIRID AFRICA–WISE Fund: African Women in Science Empowerment Fund</p>
    </div>
    <div class="content">
        <div class="alert">
            <strong>A new application</strong> has been submitted for the AIRID AFRICA–WISE Fund: African Women in Science Empowerment Fund programme. All information is below and documents are attached to this email.
        </div>

        <p><strong>Application #{{ $application->id }}</strong> – Submitted on {{ $application->created_at->format('d/m/Y at H:i') }}</p>

        <h2>Personal information</h2>
        <table>
            <tr><th>First name</th><td>{{ $application->first_name }}</td></tr>
            <tr><th>Last name</th><td>{{ $application->last_name }}</td></tr>
            <tr><th>Email</th><td>{{ $application->email }}</td></tr>
            <tr><th>Phone</th><td>{{ $application->phone ?? '–' }}</td></tr>
            <tr><th>Date of birth</th><td>{{ $application->date_of_birth ? $application->date_of_birth->format('d/m/Y') : '–' }}</td></tr>
            <tr><th>Age</th><td>{{ $application->age ?? '–' }}</td></tr>
            <tr><th>Nationality</th><td>{{ $application->nationality ?? '–' }}</td></tr>
            <tr><th>ID / Passport number</th><td>{{ $application->id_number ?? '–' }}</td></tr>
            <tr><th>Permanent resident</th><td>{{ isset($application->is_permanent_resident) ? ($application->is_permanent_resident ? 'Yes' : 'No') : '–' }}</td></tr>
            <tr><th>Address</th><td>{{ $application->residential_address ?? '–' }}</td></tr>
        </table>

        <h2>Studies</h2>
        <table>
            <tr><th>University</th><td>{{ $application->university ?? '–' }}</td></tr>
            <tr><th>Faculty / School</th><td>{{ $application->faculty_school ?? '–' }}</td></tr>
            <tr><th>Department</th><td>{{ $application->department ?? '–' }}</td></tr>
            <tr><th>Programme (STEM)</th><td>{{ $application->programme ?? '–' }}</td></tr>
            <tr><th>Level</th><td>{{ $application->level ? ucfirst($application->level) : '–' }}</td></tr>
            <tr><th>Year of study</th><td>{{ $application->year_of_study ?? '–' }}</td></tr>
            <tr><th>Expected graduation date</th><td>{{ $application->expected_graduation_date ?? '–' }}</td></tr>
            <tr><th>GPA</th><td>{{ $application->current_gpa ?? '–' }}</td></tr>
            <tr><th>STEM field</th><td>{{ $application->stem_field === 'other' ? ($application->stem_other ?? 'Other') : ($application->stem_field ?? '–') }}</td></tr>
        </table>

        <h2>Faculty sponsor</h2>
        <table>
            <tr><th>Name</th><td>{{ $application->faculty_member_name ?? '–' }}</td></tr>
            <tr><th>Position</th><td>{{ $application->faculty_position ?? '–' }}</td></tr>
            <tr><th>University</th><td>{{ $application->faculty_university ?? '–' }}</td></tr>
        </table>

        <h2>Financial context</h2>
        <table>
            <tr><th>Current scholarship / aid</th><td>{{ isset($application->financial_aid) ? ($application->financial_aid ? 'Yes' : 'No') : '–' }}</td></tr>
            <tr><th>Specification</th><td>{{ $application->financial_aid_specify ?? '–' }}</td></tr>
            <tr><th>Financial explanation</th><td>{{ $application->financial_explanation ?? '–' }}</td></tr>
        </table>

        <h2>Documents uploaded (attached to this email)</h2>
        <table>
            <tr><th>Proof of enrolment</th><td>{{ $application->proof_enrolment_path ?? '–' }}</td></tr>
            <tr><th>Transcript</th><td>{{ $application->transcript_path ?? '–' }}</td></tr>
            <tr><th>Support letter</th><td>{{ $application->support_letter_path ?? '–' }}</td></tr>
            <tr><th>ID / Passport document</th><td>{{ $application->id_document_path ?? '–' }}</td></tr>
            <tr><th>Personal statement (PDF)</th><td>{{ $application->personal_statement_file_path ?? '–' }}</td></tr>
            <tr><th>Signature</th><td>{{ $application->signature_path ?? '–' }}</td></tr>
        </table>

        <div class="doc-note">
            <strong>Attachments:</strong> the files listed above are attached to this email (Proof of enrolment, Transcript, Support letter, ID document, Personal statement, Signature).
        </div>
    </div>
</body>
</html>
