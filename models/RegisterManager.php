<?php
    require_once('Manager.php');

    class RegisterManager extends Manager
    {
        public function checkemail($email){
            $req = $this->connection->prepare("SELECT email FROM user WHERE email = :email");
            $req->execute(array(
                'email' => $email));
            $result = $req->fetch(PDO::FETCH_ASSOC);

            if ($result['email'] <> "") {
                return true;
            }else{
                return false;
            }
        }

        public function subscribe($user)
        {
            try {
                // On commence une transaction
                $this->connection->beginTransaction();

                // On exécute la requête
                $username = $user['username'];
                $email = $user['email'];
                $password = $user['password'];
                $id_role = 1;

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
