<?php

global $db;
$errors = [];

    if (isset($_POST["req"]) && $_POST["req"] == "signup") {
        $username = filter_input(INPUT_POST, 'username');
        $phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST["password"];
        $password = password_hash($password, PASSWORD_BCRYPT);
        var_dump($_POST);
        User::register($username, $phonenumber, $email, $password, $db);
        exit;
    }

if (isset($_POST["req"]) && $_POST["req"] == "login") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];
    $userChecker = User::user_checker($email, $db);

    if (!$userChecker) {
        echo json_encode(["success" => false, "message" => "User does not exist."]);
    } elseif (!password_verify($password, $userChecker["password"])) {
        echo json_encode(["success" => false, "message" => "Password is incorrect."]);
    } else {
        $checkLogin = new User($userChecker["user_id"]);
        $checkLogin->login($userChecker["user_id"]);

        // Respond with JSON instead of redirecting
        echo json_encode(["success" => true]);
    }
    exit; // Make sure to exit to prevent further script execution
}
