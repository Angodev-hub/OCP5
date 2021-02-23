<?php

    require_once('Manager.php');

    class LoginManager extends Manager
    {
        public function loginmanager()
        {
            $db = $this->dbConnect();

            if (!empty($_POST)) {
                extract($_POST);
                $valid = true;

                if (isset($_POST['login'])) {
                    $email = htmlspecialchars(trim($email));
                    $password = htmlspecialchars(trim($password));

                    if (empty($email)){
                        $valid = false;
                        $er_username = "Le nom d'utilisateur est obligatoire";
                    }

                    if(empty($password)){
                        $valid = false;
                        $er_password = "Le mot de passe est obligatoire";
                    }
                }

                if ($valid){
                    $req = $db->prepare('SELECT id_user, password FROM user WHERE email = :email');
                    $req->execute(array(
                        'email' => $email));
                    $resultat = $req->fetch();

                    $IsPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

                    if (!$resultat) {
                        echo 'Mauvais identifiant ou mot de passe !';
                    } else {
                        if ($isPasswordCorrect) {
                            session_start();
                            $_SESSION['id'] = $resultat['id'];
                            $_SESSION['pseudo'] = $pseudo;
                            echo 'Vous êtes connecté !';
                        } else {
                            echo 'Mauvais identifiant ou mot de passe !';
                        }
                    }
                }
            }
        }
    }