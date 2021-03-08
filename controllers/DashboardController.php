<?php

require_once('./models/DashboardManager.php');

function dashboard(){
    require ('views/dashboard.php');
}

function newpost()
{
    if (isset($_POST['newpost'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $valid = true;

        // On valide la saisie
        if (empty($title)) {
            $valid = false;
            $er_title = ("Le titre de l'article est obligatoire");
        }

        if (empty($description)) {
            $valid = false;
            $er_title = ("La description de l'article est obligatoire");
        }

        if (empty($content)) {
            $valid = false;
            $er_title = ("Le contenu de l'article est obligatoire");
        }

        // on nettoie les données

        $title = htmlspecialchars($title);
        $description = htmlspecialchars($description);
        $content = htmlspecialchars($content);

        // On place les données dans un tableau
        $postinfo = array('title' => $title, 'description' => $description, 'content' => $content);

        // On appelle le modèle qui permet d'ajouter les informations en BDD
        if ($valid) {
            $dashboardManager = new DashboardManager();
            $result = $dashboardManager->addpost($postinfo);
        }

        if ($result) {
            // Succès
            Header('Location: index.php?page=error');
            echo "L'article a bien été ajouté";
        } else {
            // Erreur
            Header('Location: index.php?page=error');
            echo "L'article n'a pas pu être enregistré.";
        }
    } else {
        require_once('index.php?page=dashboard');
    }
}