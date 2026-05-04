<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIRID Staff Platform – New Sign-In Detected</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 640px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #767474 0%, #c20102 100%); color: #fff; padding: 24px; border-radius: 8px 8px 0 0; }
        .header h1 { margin: 0; font-size: 1.25rem; }
        .header p { margin: 0.5rem 0 0 0; opacity: 0.95; }
        .content { background: #f8f9fa; padding: 24px; border: 1px solid #dee2e6; border-top: 0; }
        .notice { background: #d4edda; border-left: 4px solid #ED2913; padding: 16px; margin-bottom: 24px; border-radius: 4px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 16px; }
        th { text-align: left; padding: 8px 12px; background: #e9ecef; width: 40%; font-size: 0.9rem; }
        td { padding: 8px 12px; border-bottom: 1px solid #dee2e6; }
        .alert { margin-top: 20px; padding: 16px; background: #fff3cd; border-left: 4px solid #c20102; border-radius: 4px; font-size: 0.9rem; }
        .contact-box { margin-top: 24px; padding: 16px; background: #fff; border-radius: 8px; border-left: 4px solid #c20102; }
        .footer { padding: 16px; font-size: 0.85rem; color: #6c757d; border-top: 1px solid #dee2e6; }
        p { margin: 0 0 12px 0; }
    </style>
</head>
<body>
    <div class="content">
        <div class="notice">
            <strong>Security Notification.</strong> A successful sign-in to the AIRID Staff Platform was recorded using your account.
        </div>

        <p>Dear <strong>{{ $staffName }}</strong>,</p>
        <p>We are writing to inform you that the following sign-in activity was detected on your AIRID Staff Platform account:</p>

        <table>
            <tr><th>Email</th><td>{{ $staffEmail }}</td></tr>
            <tr><th>Date &amp; Time</th><td>{{ $loginTime }}</td></tr>
            <tr><th>IP Address</th><td>{{ $ipAddress }}</td></tr>
        </table>

        <div class="alert">
            <strong>Did not recognise this activity?</strong><br>
            If you did not initiate this sign-in, please contact the AIRID Data Management team immediately so that appropriate security measures can be taken without delay.
        </div>

        <p style="margin-top: 16px;">If this was you, no further action is required. Thank you for helping us keep the AIRID Staff Platform secure.</p>

        <div class="contact-box">
            <strong>Secrétariat AIRID</strong><br>
            African Institute for Research in Infectious Diseases (AIRID)<br>
            Maison 5507, Rue 1543 Donaten, AKPAKPA<br>
(SOBEPEC Street, 4th building on the left, last building on the left)<br>Cotonou, Benin<br><br>            <strong>Email:</strong> <a href="mailto:info@airid-africa.com">info@airid-africa.com</a><br>
            <strong>Phone:</strong> (+229) 01 67 16 44 99<br>
            <strong>Website:</strong> <a href="https://airid-africa.com" target="_blank">https://airid-africa.com</a>
        </div>
    </div>

    <div class="footer">
        This is an automated security notification from AIRID. Please do not reply directly to this email.
    </div>
</body>
</html>
