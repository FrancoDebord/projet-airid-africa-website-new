<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation – Conflict of Interest Declaration</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 640px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #767474 0%, #c20102 100%); color: #fff; padding: 24px; border-radius: 8px 8px 0 0; }
        .header h1 { margin: 0; font-size: 1.25rem; }
        .content { background: #f8f9fa; padding: 24px; border: 1px solid #dee2e6; border-top: 0; }
        .thanks { background: #d4edda; border-left: 4px solid #28a745; padding: 16px; margin-bottom: 24px; border-radius: 4px; }
        .ref { font-weight: bold; color: #c20102; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 16px; }
        th { text-align: left; padding: 8px 12px; background: #e9ecef; width: 40%; font-size: 0.9rem; }
        td { padding: 8px 12px; border-bottom: 1px solid #dee2e6; }
        .footer { padding: 16px; font-size: 0.85rem; color: #6c757d; border-top: 1px solid #dee2e6; }
        .section-title { font-weight: bold; margin-top: 20px; margin-bottom: 8px; color: #2c3e50; }
    </style>
</head>
<body>
    <div class="header">
        <h1>African Institute for Research in Infectious Diseases (AIRID)</h1>
        <p style="margin: 0.5rem 0 0 0; opacity: 0.95;">Conflict of Interest Declaration – Confirmation</p>
    </div>
    <div class="content">
        <div class="thanks">
            <strong>Thank you.</strong> We have received your Conflict of Interest (COI) declaration. Your submission has been recorded successfully.
        </div>

        <p class="ref">Reference number: {{ $refNo }}</p>

        <p>Below is a copy of the information you submitted:</p>

        <p class="section-title">Section 1: Personal Details</p>
        <table>
            <tr><th>Full Name</th><td>{{ $formData['full_name'] ?? '—' }}</td></tr>
            <tr><th>Position / Role</th><td>{{ $formData['position_role'] ?? '—' }}</td></tr>
            <tr><th>Department / Unit</th><td>{{ $formData['department_unit'] ?? '—' }}</td></tr>
            <tr><th>Type of Engagement</th><td>{{ $formData['engagement_type'] ?? '—' }}{{ !empty($formData['engagement_other_text']) ? ' – ' . $formData['engagement_other_text'] : '' }}</td></tr>
            <tr><th>Email Address</th><td>{{ $formData['email_address'] ?? '—' }}</td></tr>
            <tr><th>Date of Declaration</th><td>{{ $formData['declaration_date_personal'] ?? '—' }}</td></tr>
            <tr><th>Objective of Declaration</th><td>{{ $formData['objective_of_declaration'] ?? '—' }}{{ !empty($formData['objective_other_text']) ? ' – ' . $formData['objective_other_text'] : '' }}</td></tr>
            @if(!empty($formData['objective_meeting_date']))
            <tr><th>Meeting Date</th><td>{{ $formData['objective_meeting_date'] }}</td></tr>
            @endif
        </table>

        <p class="section-title">Section 2: Declaration of Interests</p>
        <table>
            <tr><th>Financial Interests</th><td>{{ $formData['financial_interest'] ?? '—' }}</td></tr>
            @if(!empty($formData['financial_details']))
            <tr><th>Financial details</th><td>{{ $formData['financial_details'] }}</td></tr>
            @endif
            <tr><th>Professional/Institutional</th><td>{{ $formData['professional_interest'] ?? '—' }}</td></tr>
            @if(!empty($formData['professional_details']))
            <tr><th>Professional details</th><td>{{ $formData['professional_details'] }}</td></tr>
            @endif
            <tr><th>Personal Relationships</th><td>{{ $formData['personal_interest'] ?? '—' }}</td></tr>
            @if(!empty($formData['personal_details']))
            <tr><th>Personal details</th><td>{{ $formData['personal_details'] }}</td></tr>
            @endif
            <tr><th>Research-Related</th><td>{{ $formData['research_interest'] ?? '—' }}</td></tr>
            @if(!empty($formData['research_details']))
            <tr><th>Research details</th><td>{{ $formData['research_details'] }}</td></tr>
            @endif
        </table>

        @if(!empty($formData['other_information']))
        <p class="section-title">Section 3: Other Relevant Information</p>
        <p>{{ $formData['other_information'] }}</p>
        @endif

        <p class="section-title">Section 4: Declaration and Undertaking</p>
        <table>
            <tr><th>Name (declaration)</th><td>{{ $formData['declaration_name'] ?? '—' }}</td></tr>
            <tr><th>Date (signature)</th><td>{{ $formData['declaration_date_sign'] ?? '—' }}</td></tr>
        </table>

        <p style="margin-top: 24px;">If you have any questions, please contact AIRID:</p>
        <p style="margin: 12px 0 0 0; padding: 16px; background: #fff; border-radius: 8px; border-left: 4px solid #c20102;">
            <strong>Secrétariat AIRID</strong><br>
            Maison 5507, Rue 1543 Donaten, AKPAKPA<br>
            (Rue SOBEPEC, 4e Von à gauche, dernier immeuble à gauche)<br>
            Cotonou, Benin<br><br>
            <strong>Email:</strong> <a href="mailto:info@airid-africa.com">info@airid-africa.com</a><br>
            <strong>Phone:</strong> (+229) 01 67 16 44 99
        </p>
    </div>
    <div class="footer">
        This is an automated message from AIRID. Please do not reply directly to this email.
    </div>
</body>
</html>
