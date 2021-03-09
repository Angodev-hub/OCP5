<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else {
    $page='';
}

switch ($page) {
    case '' :
        require('controllers/HomepageController.php');
        homeIndex();
        break;
    case 'blog' :
        require('controllers/PostsController.php');
        listposts();
        break;
    case 'contact' :
        require('controllers/ContactController.php');
        contactIndex();
        break;
    case 'create' :
        require('controllers/DashboardController.php');
        create();
        break;
    case 'post' :
        require('controllers/PostController.php');
        post();
        break;
    case 'edit' :
        require('controllers/DashboardController.php');
        edit();
        break;
    case 'administratorspace' :
        require('controllers/AdministratorconnexionController.php');
        adminconnect();
        break;
    case 'aboutme' :
        require('controllers/AboutmeController.php');
        aboutme();
        break;
    case 'legals' :
        require('controllers/LegalsController.php');
        legals();
        break;
    case 'login' :
        require('controllers/LoginController.php');
        login();
        break;
    case 'register' :
        require('controllers/RegisterController.php');
        registration();
        break;
    case 'dashboard' :
        require('controllers/DashboardController.php');
        dashboard();
        break;
    default :
        require('controllers/ErrorController.php');
        error404();
        break;
}