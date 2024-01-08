<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

global $db;

if (isset($_POST["req"]) && $_POST["req"] == "signup") {
    // Sanitize and validate input
    $username = $_POST["username"];
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_NUMBER_INT);
    $password = $_POST['password'];
    $fileName = Validation::handleFileUpload();
    // Validate user input
    $errors = [
        "username_err" => Validation::validateUsername($username),
        "email_err" => Validation::validateEmail($email),
        "phonenumber_err" => Validation::validatePhoneNumber($phonenumber),
        "password_err" => Validation::validatePassword($password),
        "userexists_err" => Validation::userChecker($email, $db),
        "picture_err" => Validation::pictureValidation($fileName)
    ];


    if (array_filter($errors)) {
        // Handle errors
        echo json_encode(["errors" => $errors]);
        exit;
    }

    // Hash password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Register user
    User::register($username, $phonenumber, $email, $passwordHash, $fileName, $db);
    echo json_encode(["success" => "User registered successfully"]);
    exit;
}

if (isset($_POST["req"]) && $_POST["req"] == "login") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];
    $userChecker = User::user_checker($email, $db);


    if (!$userChecker) {
        echo json_encode(["error" => "User does not exist."]);
    } elseif (!password_verify($password, $userChecker["password"])) {
        echo json_encode(["error" => "Password is incorrect."]);
    } else {
        $checkLogin = new User($userChecker["user_id"]);
        $checkLogin->login($userChecker["user_id"]);


        echo json_encode(["success" => true]);
    }
    exit;
}


if (isset($_POST["req"]) && $_POST["req"] == "request") {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    if (empty($email)) {
        echo json_encode(["error" => "Please enter your email address."]);
        exit;
    }

    $sql = "SELECT * FROM user WHERE email=? ";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo json_encode(["error" => "Database error. Please try again later."]);
        exit;
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if (!($row = mysqli_fetch_assoc($res))) {
        echo json_encode(["error" => "No account found with that email address."]);
        exit;
    }

    // User exists, proceed with password reset
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $expiresDate = date("U") + 3600;
    $url = "http://localhost/IlyasChaoui-Alpha/index.php?page=newpassword&selector=" . $selector . "&validator=" . bin2hex($token);

    // Delete any existing password reset requests
    $sql = "DELETE FROM passwordrecovery WHERE pwd_reset_email=?";
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
    }

    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    $sql = "INSERT INTO passwordrecovery (pwd_reset_email, pwd_reset_selector, pwd_reset_token, pwd_reset_expires) VALUE (?, ?, ?, ?)";
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashedToken, $expiresDate);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);

    // Prepare email content
    $username = $row["username"]; // Assuming you have username field
    $subject = "Reset Your Password!";
    $message = "
        <html>
        <head>
          <title>Password Recovery</title>
        </head>
        <body>
          <p>Hello, '$username'</p>
          <p>Click on the button below if you are the one trying to change your password. If not, please ignore this email and do not share the link.</p>
          
          <a href='$url' style='
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;'>
            Reset Password
          </a>
        
          <p>If you're having trouble clicking the button, you can also copy and paste the following URL into your browser:</p>
          <p><a href='$url'>$url</a></p>
        
          <p>Thank you!</p>
        </body>
        </html>
        ";
    // Send the email
    try {
        $mail = new PHPMailer(true);
        // SMTP configuration
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "ilyaschaoui2002@gmail.com";
        $mail->Password = "nnog npvs rrlf jfqz";
        $mail->SMTPSecure = "ssl";
        $mail->Port = "465";

        $mail->setFrom("ilyaschaoui2002@gmail.com");
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->send();
        echo json_encode(["success" => "Password reset email has been sent. Please check your email."]);
        exit;
    } catch (Exception $e) {
        echo json_encode(["error" => "Mailer Error: " . $mail->ErrorInfo]);
    }
}


//if (isset($_POST["req"]) && $_POST["req"] == "signup") {
//    $data = [
//        "username" => $_POST["username"],
//        "username_err" => "",
//        "email" => $_POST["email"],
//        "email_err" => "",
//        "phonenumber" => $_POST["phonenumber"],
//        "phonenumber_err" => "",
//        "password" => $_POST["password"],
//        "password_err" => "",
//    ];
//
//    if ($data["username"] == '') {
//        $data["username_err"] = "dakl smiya ya klb ";
//    } else {
//        $username = filter_input(INPUT_POST, 'username');
//    }
//
//    if ($data["phonenumber"] == '') {
//        $data["phonenumber_err"] = "dakl nmra ya klb ";
//    } else {
//        $phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_NUMBER_INT);
//    }
//
//    if ($data["email"] == '') {
//        $data["email_err"] = "dakl email ya klb ";
//    } else {
//        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
//    }
//
//    if ($data["password"] == '') {
//        $data["password_err"] = "dakl mdp ya klb ";
//    } else {
//        $password = $_POST["password"];
//        $password = password_hash($password, PASSWORD_BCRYPT);
//    }
//
//
//    $targetDir = "./assets/img/";
//    $fileName = basename($_FILES["picture"]["name"]);
//    $targetFilePath = $targetDir . $fileName;
//
//    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFilePath)) {
//        $userChecker = User::user_checker($email, $db);
//        if ($userChecker) {
//            throw new Exception("User_exist");
//        } else {
//            User::register($username, $phonenumber, $email, $password, $fileName, $db);
//
//        }
//    }
//    exit;
//}