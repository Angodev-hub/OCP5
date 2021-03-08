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
    case 'newpost' :
        require('controllers/DashboardController.php');
        newpost();
        break;
    case 'post' :
        require('controllers/PostController.php');
        post();
        break;
    case 'editpost' :
        require('controllers/DashboardController.php');
        editpost();
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
    case 'signin' :
        require('controllers/SigninController.php');
        signin();
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