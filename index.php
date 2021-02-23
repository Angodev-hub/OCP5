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
        require('controllers/postscontroller.php');
        listposts();
        break;
    case 'contact' :
        require('controllers/contactcontroller.php');
        contactIndex();
        break;
    case 'newpost' :
        require('controllers/addpostcontroller.php');
        newpost();
        break;
    case 'post' :
        require('controllers/postcontroller.php');
        post();
        break;
    case 'editpost' :
        require('controllers/dashboardcontroller.php');
        editpost();
        break;
    case 'administratorspace' :
        require('controllers/administratorconnexioncontroller.php');
        adminconnect();
        break;
    case 'aboutme' :
        require ('controllers/aboutmecontroller.php');
        aboutme();
        break;
    case 'legals' :
        require ('controllers/legalscontroller.php');
        legals();
        break;
    case 'login' :
        require ('controllers/logincontroller.php');
        login();
        break;
    case 'signin' :
        require ('controllers/signincontroller.php');
        signin();
        break;
    default :
        require('controllers/ErrorController.php');
        error404();
        break;
}