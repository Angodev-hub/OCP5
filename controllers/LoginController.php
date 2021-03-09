<?php

require_once('./models/LoginManager.php');

function login()
{
    // Si le formulaire a été soumis
    if (isset($_POST['login'])) {
        // On récupère les données du formulaire
        $email = $_POST['email'];
        $password = $_POST['password'];

        // On valide la saisie
        // Les données ne sont pas vides
        if (empty($password)) {
            $valid = false;
            $er_password = "Le mot de passe est obligatoire";
        }

        if (empty($email)) {
            $valid = false;
            $er_email = ("L'adresse email est obligatoire");
        }

        //Les données sont au bon format
        elseif (!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $email)) {
            $valid = false;
            $er_email = ("L'adresse mail n'est pas valide");
        }

        // On nettoie les données
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        // On appelle le modèle qui permet de vérifier l'existence du couple email / password en BDD
        $loginManager = new LoginManager();
        $result = $loginManager->checkCredentials($email, $password);

        if (!$result){
            echo "Aucun compte trouvé.";
        }else{
            if($IsPasswordCorrect) {
                // Succès
                session_start();
                $_SESSION['email'] = $result['email'];
                $_SESSION['password'] = $result['password'];
                $connect = ("Vous êtes connecté !");
                // Redirection vers la page d'accueil
                Header('Location: index.php');
            } else {
                // Erreur
                $er_login = ("Mauvais identifiant ou mot de passe !");
            }
        }
    } else {
        // Si le formulaire est vide on appelle la vue
        require_once('views/login.php');
    }
}
