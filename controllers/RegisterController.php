<?php
require_once('./models/RegisterManager.php');

    function registration()
    {
        // On récupère les données du formulaire
        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordconf = $_POST['passwordconf'];
            $valid = true;

            $registerManager = new RegisterManager();

            // On valide la saisie
            if (empty($username)) {
                $valid = false;
            }

            if (empty($email)) {
                $valid = false;
            } elseif (!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $email)) {
                $valid = false;
            } else {
                $email_exist = $registerManager->checkemail($email);
                if ($email_exist){
                    $valid = false;
                }
            }

            if (empty($password)) {
                $valid = false;
            } elseif ($password != $passwordconf) {
                $valid = false;
                $er_conf_password = "La confirmation du mot de passe ne correspond pas";
                Header('Location: index.php?page=register&msg='. $er_conf_password);
            }

            // On nettoie les données
            $username = htmlspecialchars(trim($username));
            $email = htmlspecialchars(trim($email));
            $password = htmlspecialchars(trim($password));

            // On place les données dans un tableau
            $user = array('username' => $username, 'email' => $email, 'password' => $password);

            // On appelle le modèle qui permet d'ajouter les informations en BDD
            if ($valid){
                $result = $registerManager->subscribe($user);
            }

            if($result) {
                // Succès
                session_start();
                $_SESSION['email'] = $result['email'];
                $_SESSION['password'] = $result['password'];
                $conf_subscribe = "Votre compte a été créé avec succès, vous êtes dorénavant connecté.";
                // Confirmation d'inscription
                Header('Location: index.php?page=register&msg='. $conf_subscribe);
            } else {
                // Erreur
                $er_subscribe = "Votre compte n'a pas pu être créé. Veuillez recommencer.";
                Header('Location: index.php?page=register&msg='. $er_subscribe);
            }
        } else {
            require_once('views/login.php');
        }
    }





