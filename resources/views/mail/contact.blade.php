<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Message de contact</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: white; border-radius: 8px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <h2 style="color: #333;">Nouveau message depuis le formulaire de contact</h2>
        
        <p><strong>Nom :</strong> {{ $name }}</p>
        <p><strong>Email :</strong> {{ $email }}</p>

        <hr style="margin: 20px 0;">

        <p><strong>Message :</strong></p>
        <p style="white-space: pre-line;">{{ $messageContent }}</p>

        <hr style="margin: 30px 0;">

        <p style="font-size: 14px; color: #777;">
            Cet e-mail a été généré automatiquement depuis le site de portfolio.
        </p>
    </div>
</body>
</html>
