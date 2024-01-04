<?php

include_once '_config/config.php';
include_once '_functions/functions.php';
include_once '_config/db.php';

spl_autoload_register(function ($class) {
    include_once 'models/' . $class . '.php';
});

if (!isset($_SESSION["login"])) {
    if (isset($_GET['page'])) {
        $allowedPages = ["login","newpassword"];
        $page = in_array($_GET['page'], $allowedPages) ? $_GET['page'] : 'login';
    } else {
        $page = 'login';
    }
} else {
    $page = 'home';
}

// If $_GET['page'] is not set or empty, set $page to 'dashboard'
if (empty($page)) {
    $page = 'home';
}


$all_pages = scandir('controllers');
if (in_array($page . '_controller.php', $all_pages)) {
    include_once 'controllers/' . $page . '_controller.php';
    include_once 'views/_layout.php';
} else {
    $page = '404';
    include_once 'controllers/' . $page . '_controller.php';
    include_once 'views/_layout.php';
}
