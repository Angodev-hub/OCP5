<?php
    require_once('Manager.php');

    class SigninManager extends Manager
    {
        public function subscribe($info)
        {
            try {
                // On commence une transaction
                $this->connection->beginTransaction();

                // On exécute la requête
                $username = $info['username'];
                $email = $info['email'];
                $password = $info['password'];

                $hash_pass = password_hash($password, PASSWORD_DEFAULT);

                $req = $this->connection->prepare('INSERT INTO user(username, password, email, created_at, id_role) VALUES(:username, :password, :email, CURDATE(), :id_role)');
                $req->execute(array(
                    'username' => $username,
                    'pass' => $hash_pass,
                    'email' => $email,
                    'id_role' => $id_role));

                // On exécute la transaction
                $this->connection->commit();
            } catch (PDOException $exception) {
                // On annule la transaction
                $this->connection->rollback();

                echo "Erreur : " . $exception->getMessage();
            }
        }
    }
