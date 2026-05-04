<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Export Hardship Fund – Applications</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 9px; color: #333; }
        h1 { font-size: 14px; border-bottom: 1px solid #333; padding-bottom: 6px; margin-bottom: 8px; }
        h2 { font-size: 11px; margin: 12px 0 6px 0; color: #444; }
        .meta { color: #666; font-size: 8px; margin-bottom: 12px; }
        table.data { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        table.data th, table.data td {
            border: 1px solid #ccc;
            padding: 5px 8px;
            text-align: left;
            vertical-align: top;
        }
        table.data th {
            background: #f0f0f0;
            font-weight: bold;
            width: 28%;
            min-width: 120px;
        }
        table.data td {
            width: 72%;
            word-wrap: break-word;
            word-break: break-word;
            overflow-wrap: break-word;
        }
        .app-block { margin-bottom: 14px; }
        table.data { page-break-inside: auto; }
        table.data tr { page-break-inside: avoid; page-break-after: auto; }
        .app-title {
            font-size: 11px;
            font-weight: bold;
            background: #e8e8e8;
            padding: 6px 8px;
            margin-bottom: 0;
            border: 1px solid #ccc;
            border-bottom: none;
        }
        .signature-img { max-height: 100px; border: 1px solid #ddd; padding: 4px; background: #fff; }
    </style>
</head>
<body>
    <h1>Hardship Fund – Applications (AIRID AFRICA–WISE Fund : African Women in Science Empowerment Fund) – Full export</h1>
    <p class="meta">Generated on {{ now()->format('d/m/Y at H:i') }} – {{ $applications->count() }} application(s)</p>

    @foreach($applications as $app)
    <div class="app-block">
        <p class="app-title">Application #{{ $app->id }} – {{ $app->first_name }} {{ $app->last_name }} (submitted on {{ $app->created_at ? $app->created_at->format('d/m/Y H:i') : '–' }})</p>

        <table class="data">
            <tr><th>First name</th><td>{{ $app->first_name }}</td></tr>
            <tr><th>Last name</th><td>{{ $app->last_name }}</td></tr>
            <tr><th>Email</th><td>{{ $app->email }}</td></tr>
            <tr><th>Phone</th><td>{{ $app->phone ?? '–' }}</td></tr>
            <tr><th>Date of birth</th><td>{{ $app->date_of_birth ? $app->date_of_birth->format('d/m/Y') : '–' }}</td></tr>
            <tr><th>Age</th><td>{{ $app->age ?? '–' }}</td></tr>
            <tr><th>Nationality</th><td>{{ $app->nationality ?? '–' }}</td></tr>
            <tr><th>ID / Passport number</th><td>{{ $app->id_number ?? '–' }}</td></tr>
            <tr><th>Permanent resident</th><td>{{ isset($app->is_permanent_resident) ? ($app->is_permanent_resident ? 'Yes' : 'No') : '–' }}</td></tr>
            <tr><th>Address</th><td>{{ $app->residential_address ?? '–' }}</td></tr>
        </table>

        <h2>Studies</h2>
        <table class="data">
            <tr><th>University</th><td>{{ $app->university ?? '–' }}</td></tr>
            <tr><th>Faculty / School</th><td>{{ $app->faculty_school ?? '–' }}</td></tr>
            <tr><th>Department</th><td>{{ $app->department ?? '–' }}</td></tr>
            <tr><th>Programme (STEM)</th><td>{{ $app->programme ?? '–' }}</td></tr>
            <tr><th>Level</th><td>{{ $app->level ? ucfirst($app->level) : '–' }}</td></tr>
            <tr><th>Year of study</th><td>{{ $app->year_of_study ?? '–' }}</td></tr>
            <tr><th>Expected graduation date</th><td>{{ $app->expected_graduation_date ?? '–' }}</td></tr>
            <tr><th>GPA</th><td>{{ $app->current_gpa ?? '–' }}</td></tr>
            <tr><th>STEM field</th><td>{{ $app->stem_field === 'other' ? ($app->stem_other ?? 'Other') : ($app->stem_field ?? '–') }}</td></tr>
        </table>

        <h2>Faculty sponsor</h2>
        <table class="data">
            <tr><th>Name</th><td>{{ $app->faculty_member_name ?? '–' }}</td></tr>
            <tr><th>Position</th><td>{{ $app->faculty_position ?? '–' }}</td></tr>
            <tr><th>University</th><td>{{ $app->faculty_university ?? '–' }}</td></tr>
        </table>

        <h2>Financial context</h2>
        <table class="data">
            <tr><th>Current scholarship / aid</th><td>{{ isset($app->financial_aid) ? ($app->financial_aid ? 'Yes' : 'No') : '–' }}</td></tr>
            <tr><th>Specification</th><td>{{ $app->financial_aid_specify ?? '–' }}</td></tr>
            <tr><th>Financial explanation</th><td>{{ $app->financial_explanation ?? '–' }}</td></tr>
        </table>

        <h2>Personal statement</h2>
        <table class="data">
            <tr><th>File uploaded</th><td>{{ $app->personal_statement_file_path ?? '–' }}</td></tr>
        </table>

        <h2>Documents uploaded</h2>
        <table class="data">
            <tr><th>Proof of enrolment</th><td>{{ $app->proof_enrolment_path ?? '–' }}</td></tr>
            <tr><th>Transcript</th><td>{{ $app->transcript_path ?? '–' }}</td></tr>
            <tr><th>Support letter</th><td>{{ $app->support_letter_path ?? '–' }}</td></tr>
            <tr><th>ID / Passport document</th><td>{{ $app->id_document_path ?? '–' }}</td></tr>
            <tr><th>Signature</th><td>
                @if($app->signature_path && file_exists(public_path('assets/hardship_fund/' . $app->signature_path)))
                    <img src="{{ public_path('assets/hardship_fund/' . $app->signature_path) }}" alt="Signature" class="signature-img" />
                @else
                    {{ $app->signature_path ?? '–' }}
                @endif
            </td></tr>
        </table>

        <h2>Admin follow-up</h2>
        <table class="data">
            <tr><th>Status</th><td>{{ \App\Models\HardshipFundApplication::statusLabels()[$app->status] ?? $app->status }}</td></tr>
            <tr><th>Admin notes</th><td>{{ $app->admin_notes ?? '–' }}</td></tr>
        </table>
    </div>
    @endforeach
</body>
</html>
