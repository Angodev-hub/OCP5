<?php
    require_once('Manager.php');

    class LoginManager extends Manager
    {
        public function checkCredentials($email)
        {
            $req = $this->connection->prepare('SELECT id_user, password FROM user WHERE email = :email');
            $req->execute(array(
                'email' => $email));
            $result = $req->fetch(PDO::FETCH_ASSOC);

            $IsPasswordCorrect = password_verify($_POST['password'], $result['password']);
        }
    }