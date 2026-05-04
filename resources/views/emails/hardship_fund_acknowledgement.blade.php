<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accusé de réception – Candidature Hardship Fund</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 640px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #767474 0%, #c20102 100%); color: #fff; padding: 24px; border-radius: 8px 8px 0 0; }
        .header h1 { margin: 0; font-size: 1.25rem; }
        .content { background: #f8f9fa; padding: 24px; border: 1px solid #dee2e6; border-top: 0; }
        .thanks { background: #d4edda; border-left: 4px solid #28a745; padding: 16px; margin-bottom: 24px; border-radius: 4px; }
        .footer { padding: 16px; font-size: 0.85rem; color: #6c757d; border-top: 1px solid #dee2e6; }
        p { margin: 0 0 12px 0; }
    </style>
</head>
<body>
    <div class="header">
        <h1>African Institute for Research in Infectious Diseases (AIRID)</h1>
        <p style="margin: 0.5rem 0 0 0; opacity: 0.95;">AIRID AFRICA–WISE Fund : African Women in Science Empowerment Fund – Accusé de réception</p>
    </div>
    <div class="content">
        <div class="thanks">
            <strong>Nous avons bien reçu votre candidature.</strong><br>
            Votre dossier pour le programme « AIRID AFRICA–WISE Fund : African Women in Science Empowerment FundAIRID AFRICA–WISE Fund : African Women in Science Empowerment Fund » a été enregistré avec succès.
        </div>

        <p>Madame, Mademoiselle {{ $application->first_name }} {{ $application->last_name }},</p>
        <p>Ce message confirme l'enregistrement de votre candidature reçue le {{ $application->created_at->format('d/m/Y à H:i') }}.</p>
        <p>Votre dossier sera examiné par notre équipe. Vous serez contactée en cas de besoin ou pour toute suite donnée à votre candidature.</p>
        <p>Pour toute question, vous pouvez nous contacter à l'adresse indiquée ci-dessous.</p>
        <p style="margin-top: 24px; padding: 16px; background: #fff; border-radius: 8px; border-left: 4px solid #c20102;">
            <strong>Secrétariat AIRID</strong><br>
            African Institute for Research in Infectious Diseases (AIRID)<br>
            Website : <a href="https://airid-africa.com" target="_blank">https://airid-africa.com</a>
            <strong>Email:</strong> <a href="mailto:info@airid-africa.com">info@airid-africa.com</a><br>
            <strong>Phone:</strong> (+229) 01 67 16 44 99 <br>
             Address : Maison 5507, Rue 1543 Donaten, AKPAKPA
            (Rue SOBEPEC, 4e Von à gauche, dernier immeuble à gauche)
            Cotonou, Benin
            <br>

        </p>
    </div>
    <div class="footer">
        Ceci est un envoi automatique. Merci de ne pas répondre directement à cet e-mail.
    </div>
</body>
</html>
