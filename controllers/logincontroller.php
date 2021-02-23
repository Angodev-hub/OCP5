<?php
require_once('../models/LoginManager.php');

function login()
{
    // Si le formulaire a été soumis
    if (isset($_POST['login'])) {
        // On récupère les données du formulaire
        $email = $_POST['email'];
        $password = $_POST['password'];

        // On valide la saisie
        // Les données ne sont pas vides
        // Les données sont au bon format (surtout l'email)

        // On nettoie les données
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        // On appelle le modèle qui permet de vérifier l'existence du couple email / password en BDD
        $loginManager = new LoginManager();
        $result = $loginManager->checkCredentials();

        if($result) {
            // Succès

            // Redirection vers la page d'accueil
            Header('Location: index.php');
        } else {
            // Erreur

        }
    }

    // On appelle la vue
    require_once('views/login.php');
}
