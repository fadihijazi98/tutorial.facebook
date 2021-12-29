<?php
$root = $_SERVER['DOCUMENT_ROOT'];

session_start();

if($_SESSION['user']) {
    return header('location:/facebook/index.php');
}

require_once $root . '/facebook/database/Database.php';
require_once $root . '/facebook/app/User.php';
require_once $root . '/facebook/helper/helper_functions.php';


if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username && $password && ($user = login($username, $password))) {
        $_SESSION['user'] = $user;
        return header('location:/facebook/index.php');
    }
}

return header('location:/facebook/login.php');