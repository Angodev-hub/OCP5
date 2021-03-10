<?php

require_once('Manager.php');

class AdminManager extends Manager
{
    public function checkCredentials($email, $password)
    {
        $req = $this->connection->prepare('SELECT password FROM user WHERE email = :email');
        $req->execute(array(
            'email' => $email));
        $result = $req->fetch(PDO::FETCH_ASSOC);

        $isPasswordCorrect = password_verify($password, $result);

        $req = $this->connection->prepare('SELECT id_role FROM user WHERE email = :email');
        $req->execute(array(
            'email' => $email));
        $result_id_role = $req->fetch(PDO::FETCH_ASSOC);

        return [
            'isPasswordCorrect' => $isPasswordCorrect,
            'result_id_role' => $result_id_role,
        ];
    }
}