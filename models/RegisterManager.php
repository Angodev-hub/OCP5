<?php
    require_once('Manager.php');

    class RegisterManager extends Manager
    {
        public function checkemail($email){
            $req = $this->connection->prepare("SELECT email FROM user WHERE email = :email");
            $req->execute(array(
                'email' => $email));
            $email_exist = $req->fetch(PDO::FETCH_ASSOC);

            if ($email_exist) {
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
                $today = date('d/m/Y');
                $id_role = 1;

                $hash_pass = password_hash($password, PASSWORD_DEFAULT);

                $req = $this->connection->prepare('INSERT INTO user(username, password, email, created_at, id_role) VALUES(:username, :password, :email, :created_at, :id_role)');
                $req->execute(array(
                    'username' => $username,
                    'pass' => $hash_pass,
                    'email' => $email,
                    'created_at' => $today,
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

