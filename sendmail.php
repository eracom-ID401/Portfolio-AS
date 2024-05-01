<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Oups! Il y a eu un problème avec votre soumission. Veuillez compléter le formulaire et réessayer.";
        exit;
    }

    $recipient = "alicelarastricker@hotmail.com"; // Remplacez cette adresse par votre adresse email
    $subject = "Nouveau message de $name";
    $email_content = "Nom: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: $name <$email>";

    if (mail($recipient, $subject, $email_content, $email_headers)) {
        echo "Merci! Votre message a été envoyé.";
    } else {
        echo "Oups! Quelque chose s'est mal passé et nous n'avons pas pu envoyer votre message.";
    }
} else {
    echo "Oups! Quelque chose s'est mal passé.";
}
?>