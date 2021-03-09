<?php
    function adminconnect()
    {
        if(isset($_POST['adminaccess'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($email)){
            $valid = false;
            $er_email = "Merci de renseigner votre adresse email";
            }

            if (empty($password)){
                $valid = false;
                $er_password = "Merci de renseigner votre mot de passe";
            }

            elseif (!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $email)) {
                $valid = false;
                $er_email = ("L'adresse mail n'est pas valide");
            }

            // On nettoie les données
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $password = filter_var($password, FILTER_SANITIZE_STRING);
        }

        if ($isPasswordCorrect AND $result_id_role = 2){
            $conf_access = "Vous êtes identifié. Vous pouvez accéder à l'espace administrateur";
        }elseif(!$isPasswordCorrect){
            $er_account = "Aucun utilisateur ne correspond à ces identifiants";
        }elseif ($result_id_role <> 2){
            $er_access = "Vous n'êtes pas autorisé à accéder à l'espace administrateur.";
        }

        else{
            require_once ('views/administratorconnexion.php');
        }
    }
?>