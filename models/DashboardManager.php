<?php
    require_once('Manager.php');

    class DashboardManager extends Manager
    {
        public function addpost($postinfo)
        {
            try {
                // On commence une transaction
                $this->connection->beginTransaction();

                // On exécute la requête
                $title = $postinfo['title'];
                $description = $postinfo['description'];
                $content = $postinfo['content'];

                $req = $this->connection->prepare('INSERT INTO post(title, description, content, created_at) VALUES(:title, :description, :content, CURDATE()');
                $req->execute(array(
                    'title' => $title,
                    'decription' => $description,
                    'content' => $content));

                // On exécute la transaction
                $this->connection->commit();

            }catch (PDOException $exception) {
            // On annule la transaction
                $this->connection->rollback();
                echo "Erreur : " . $exception->getMessage();
            }
        }
    }