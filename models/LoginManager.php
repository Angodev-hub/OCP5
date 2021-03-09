<?php
    require_once('Manager.php');

    class LoginManager extends Manager
    {
        public function checkCredentials($email, $password)
        {
            $req = $this->connection->prepare('SELECT password FROM user WHERE email = :email');
            $req->execute(array(
                'email' => $email));
            $result = $req->fetch(PDO::FETCH_ASSOC);

            $IsPasswordCorrect = password_verify($password, $result);
        }
    }