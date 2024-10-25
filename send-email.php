<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $date = htmlspecialchars($_POST['date']);
    $horaire = htmlspecialchars($_POST['horaire']);
    $service = htmlspecialchars($_POST['service']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Configuration de l'email pour l'administrateur
    $to = "elammariachraf351@gmail.com"; // Remplace par ton adresse email
    $subject = "Nouveau rendez-vous";
    $body = "Nom : $nom\nTéléphone : $telephone\nDate : $date\nHoraire : $horaire\nService : $service\nEmail : $email";
    $headers = "From: no-reply@sarlextracoiffure.com";

    // Envoie de l'email à l'administrateur
    mail($to, $subject, $body, $headers);

    // Envoie de confirmation à l'email de l'utilisateur
    $user_subject = "Confirmation de rendez-vous";
    $user_body = "Bonjour $nom,\n\nVotre rendez-vous est confirmé !\n\nDétails du rendez-vous :\nDate : $date\nHoraire : $horaire\nService : $service\n\nMerci et à bientôt !";
    $user_headers = "From: no-reply@sarlextracoiffure.com";

    // Envoie de l'email de confirmation
    if (mail($email, $user_subject, $user_body, $user_headers)) {
        echo "Rendez-vous pris avec succès !";
    } else {
        echo "Erreur lors de la prise de rendez-vous.";
    }
}
?>
