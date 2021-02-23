<?php
    require_once('Manager.php');

    class SigninManager extends Manager
    {
        public function signinmanager()
        {
            $db = $this->dbConnect();

            if (!empty($_POST)) {
                extract($_POST);
                $valid = true;

                if (isset($_POST['signin'])) {
                    $username = htmlspecialchars(trim($username));
                    $email = htmlspecialchars(trim($email));
                    $password = htmlspecialchars(trim($password));
                    $passwordconf = htmlspecialchars(trim($passwordconf));

                    if (empty($username)) {
                        $valid = false;
                        $er_username = ("Le nom d'utilisateur est obligatoire");
                    }

                    if (empty($email)) {
                        $valid = false;
                        $er_email = ("L'adresse email est obligatoire");
                    } elseif (!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)) {
                        $valid = false;
                        $er_email = ("L'adresse mail n'est pas valide");
                    } else {
                        $req_mail = $db->query("SELECT email FROM user WHERE email = ?",
                            array($mail));

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
                    if ($valid) {
                        $hash_pass = password_hash($password, PASSWORD_DEFAULT);
                        $created_at = date('d-m-Y');
                        $id_role = 1;

                        $req = $db->prepare('INSERT INTO user(username, password, email, created_at, id_role) VALUES(:username, :password, :email, CURDATE(), :id_role)');
                        $req->execute(array(
                            'username' => $username,
                            'pass' => $hash_pass,
                            'email' => $email,
                            'id_role' => $id_role));
                    }
                }
            }
        }
    }
