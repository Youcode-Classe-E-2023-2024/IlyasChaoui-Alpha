<?php

if (isset($_POST['logout'])) {
    $logout = new User($_SESSION["user_id"]);
    $logout->logout();
}

if($_SESSION["login"]) {
    $userData = User::getUser($_SESSION["user_id"]);
//    dd($userData);
}