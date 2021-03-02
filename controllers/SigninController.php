<?php
require_once('./models/SigninManager.php');

    function signin()
    {
        // On récupère les données du formulaire
        if (!empty($_POST['signin'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordconf = $_POST['passwordconf'];
            $valid = true;

            // On valide la saisie
            if (empty($username)) {
                $valid = false;
                $er_username = ("Le nom d'utilisateur est obligatoire");
            }

            if (empty($email)) {
                $valid = false;
                $er_email = ("L'adresse email est obligatoire");
            } elseif (!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $email)) {
                $valid = false;
                $er_email = ("L'adresse mail n'est pas valide");
            } else {
                $req_mail = $this->connection->query("SELECT email FROM user WHERE email = ?",
                    array($email));

                $req_mail = $req_mail->fetch();

                if ($req_mail['email'] <> "") {
                    $valid = false;
                    $er_mail = "Cette adresse mail existe déjà";
                }
            }

            if (empty($password)) {
                $valid = false;
                $er_password = "Le mot de passe est obligatoire";
            } elseif ($password != $passwordconf) {
                $valid = false;
                $er_password = "La confirmation du mot de passe ne correspond pas";
            }

            // On nettoie les données
            $username = htmlspecialchars(trim($username));
            $email = htmlspecialchars(trim($email));
            $password = htmlspecialchars(trim($password));
            $passwordconf = htmlspecialchars(trim($passwordconf));

            // On place les données dans un array
            $info = array('username' => $username, 'email' => $email, 'password' => $password);

            // On appelle le modèle qui permet d'ajouter les informations en BDD
            if ($valid){
                $signinManager = new SigninManager();
                $result = $signinManager->subscribe($info);
            }

            if($result) {
                // Succès
                session_start();
                $_SESSION['email'] = $result['email'];
                $_SESSION['password'] = $result['password'];
                $conf_subscribe = "Votre compte a été créé avec succès, vous dorénavant connecté.";
                // Redirection vers la page d'accueil
                Header('Location: index.php');
            } else {
                // Erreur
                $er_subscribe = "Votre compte n'a pas pu être créé. Veuillez recommencer.";
                Header('Location: index.php?page=error');
            }
        } else {
            require_once('views/login.php');
        }
    }





