<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Export Conflict of Interest Register – AIRID</title>
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
        .block { margin-bottom: 14px; }
        table.data tr { page-break-inside: avoid; page-break-after: auto; }
        .block-title {
            font-size: 11px;
            font-weight: bold;
            background: #e8e8e8;
            padding: 6px 8px;
            margin-bottom: 0;
            border: 1px solid #ccc;
            border-bottom: none;
        }
    </style>
</head>
<body>
    <h1>Conflict of Interest Register – AIRID – Full export</h1>
    <p class="meta">Generated on {{ now()->format('d/m/Y at H:i') }} – {{ $conflicts->count() }} declaration(s)</p>

    @foreach($conflicts as $c)
    <div class="block">
        <p class="block-title">Declaration {{ $c->ref_no }} – {{ $c->full_name }} (declared {{ $c->declaration_date_personal ? $c->declaration_date_personal->format('d/m/Y') : '–' }})</p>

        <table class="data">
            <tr><th>Ref No.</th><td>{{ $c->ref_no }}</td></tr>
            <tr><th>Name</th><td>{{ $c->full_name }}</td></tr>
            <tr><th>Role / Position</th><td>{{ $c->position_role ?? '–' }}</td></tr>
            <tr><th>Department / Unit</th><td>{{ $c->department_unit ?? '–' }}</td></tr>
            <tr><th>Type of Engagement</th><td>{{ $c->engagement_type ?? '–' }}{{ $c->engagement_other_text ? ' – ' . $c->engagement_other_text : '' }}</td></tr>
            <tr><th>Email</th><td>{{ $c->email_address ?? '–' }}</td></tr>
            <tr><th>Date of Declaration</th><td>{{ $c->declaration_date_personal ? $c->declaration_date_personal->format('d/m/Y') : '–' }}</td></tr>
            <tr><th>Objective of Declaration</th><td>{{ $c->objective_of_declaration ?? '–' }}{{ $c->objective_other_text ? ' – ' . $c->objective_other_text : '' }}</td></tr>
            <tr><th>Meeting Date</th><td>{{ $c->objective_meeting_date ? $c->objective_meeting_date->format('d/m/Y') : '–' }}</td></tr>
        </table>

        <h2>Interests declared</h2>
        <table class="data">
            <tr><th>Financial Interest</th><td>{{ $c->financial_interest ? 'Yes' : 'No' }}</td></tr>
            <tr><th>Financial Details</th><td>{{ $c->financial_details ?? '–' }}</td></tr>
            <tr><th>Professional/Institutional</th><td>{{ $c->professional_interest ? 'Yes' : 'No' }}</td></tr>
            <tr><th>Professional Details</th><td>{{ $c->professional_details ?? '–' }}</td></tr>
            <tr><th>Personal Relationship</th><td>{{ $c->personal_interest ? 'Yes' : 'No' }}</td></tr>
            <tr><th>Personal Details</th><td>{{ $c->personal_details ?? '–' }}</td></tr>
            <tr><th>Research-Related</th><td>{{ $c->research_interest ? 'Yes' : 'No' }}</td></tr>
            <tr><th>Research Details</th><td>{{ $c->research_details ?? '–' }}</td></tr>
            <tr><th>Other Information</th><td>{{ $c->other_information ?? '–' }}</td></tr>
        </table>

        <h2>Conflict & management</h2>
        <table class="data">
            <tr><th>Nature of Conflict</th><td>{{ $c->nature_of_conflict ?? '–' }}</td></tr>
            <tr><th>Category</th><td>{{ $c->conflict_category ?? '–' }}</td></tr>
            <tr><th>Description</th><td>{{ $c->conflict_description ?? '–' }}</td></tr>
            <tr><th>Date Declared (Register)</th><td>{{ $c->date_declared ? $c->date_declared->format('d/m/Y') : '–' }}</td></tr>
            <tr><th>Management Action Agreed</th><td>{{ $c->management_action_agreed ?? '–' }}</td></tr>
            <tr><th>Responsible Officer</th><td>{{ $c->responsible_officer ?? '–' }}</td></tr>
            <tr><th>Review Date</th><td>{{ $c->review_date ? $c->review_date->format('d/m/Y') : '–' }}</td></tr>
            <tr><th>Status</th><td>{{ $c->status ?? '–' }}</td></tr>
            <tr><th>Declaration Name</th><td>{{ $c->declaration_name ?? '–' }}</td></tr>
            <tr><th>Declaration Date (Signature)</th><td>{{ $c->declaration_date_sign ? $c->declaration_date_sign->format('d/m/Y') : '–' }}</td></tr>
            <tr><th>Finalized</th><td>{{ $c->is_finalized ? 'Yes' . ($c->finalized_at ? ' (' . $c->finalized_at->format('d/m/Y H:i') . ')' : '') : 'No' }}</td></tr>
        </table>
    </div>
    @endforeach
</body>
</html>
