<?php
require 'db/connect.php';
require 'lib/data.php';
require 'lib/url.php';
require 'lib/users.php';
require 'lib/template.php';
require 'db/user.php';
require 'db/info.php';
// require 'lib/pagging.php';
// require 'lib/res.php';
session_start();
ob_start();

// function is_login() {
//     if($_SESSION['is_login']) {
//         return true;
//     }
//     return false;
// }
// $_SESSION['is_login'] = false


// echo $list_product[0]['thumb'];
$page = !empty($_GET['page']) ? $_GET['page'] : 'home';
// echo $page;

$path = "page/{$page}.php";



// if(!empty($_COOKIE['is_login'])) {
//     $_SESSION['is_login'] = $_COOKIE['is_login'];
//     $_SESSION['user_login'] = $_COOKIE['user_login'];
// }
$checklogin = false;
// $_SESSION['is_login'] = false;
if (!$_SESSION['is_login'] && $page != 'login' && $page != 'signup') {
    redict_to("?page=login");
    $checklogin = true;
}

if (!$_SESSION['is_login'] && $page != 'login' && $checklogin == false && $page != 'signup') {
    redict_to("?page=signup");
    // header("Location: ?page=signup");
}

if (file_exists($path)) {
    require $path;
} else {
    
    require 'inc/404.php';
}


?>


<!-- <div id="content">
    <h1>Trang chu</h1>
</div> -->