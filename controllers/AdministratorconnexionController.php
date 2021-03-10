<?php

require_once ('./models/AdminManager.php');

function adminconnect(){
    if (isset($_POST['adminaccess'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email)) {
            $valid = false;
            $er_email = "Merci de renseigner votre adresse email";
        }

        if (empty($password)) {
            $valid = false;
            $er_password = "Merci de renseigner votre mot de passe";
        } elseif (!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $email)) {
            $valid = false;
            $er_email = ("L'adresse mail n'est pas valide");
        }

        // On nettoie les données
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        if ($valid){
            $adminManager = new AdminManager();
            $result = $adminManager->checkCredentials($email, $password);
        }

        // Succès
        if ($result['isPasswordCorrect'] and $result['result_id_role'] = 2) {
            echo "Vous êtes identifié. Vous pouvez accéder à l'espace administrateur";
            header('Location: index.php?page=dashboard');
        }

        // Problème d'identifiants
        elseif (!$isPasswordCorrect) {
            echo "Aucun utilisateur ne correspond à ces identifiants";
            header('Location: index.php?page=administratorconnexion');
        }

        // Problème de droits
        elseif ($result_id_role <> 2) {
            echo "Vous n'êtes pas autorisé à accéder à l'espace administrateur.";
        }

        else{
            echo "Connexion impossible";
        }
    }
    else {
        require_once('views/administratorconnexion.php');
    }
}
