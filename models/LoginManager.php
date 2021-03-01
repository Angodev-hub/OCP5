<?php
    require_once('Manager.php');

    class LoginManager extends Manager
    {
        public function checkCredentials()
        {
            $req = $this->connection->prepare('SELECT id_user, password FROM user WHERE email = :email');
            $req->execute(array(
                'email' => $email));
            $result = $req->fetch();

            $IsPasswordCorrect = password_verify($_POST['password'], $result['password']);
        }
    }