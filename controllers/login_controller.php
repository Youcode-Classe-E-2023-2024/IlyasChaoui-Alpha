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
$errors = [];

    if (isset($_POST["req"]) && $_POST["req"] == "signup") {
        $username = filter_input(INPUT_POST, 'username');
        $phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST["password"];
        $password = password_hash($password, PASSWORD_BCRYPT);
        $targetDir = "./assets/img/";
        $fileName = basename($_FILES["picture"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFilePath)) {
            $userChecker = User::user_checker($email, $db);
            if ($userChecker) {
                throw new Exception("User_exist");
            } else {
                User::register($username, $phonenumber, $email, $password, $fileName, $db);

            }
        }
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

if (isset($_POST["request"])) {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $selector = bin2hex(random_bytes(8));
    // Random 32 binary bytes
    $token = random_bytes(32);
    $expiresDate = date("U") + 3600;
    $url = "http://localhost/IlyasChaoui-Alpha/index.php?page=newpassword&selector=" . $selector . "&validator=" . bin2hex($token);

    if (empty($email)) {
        echo "email is empty";
    }

    $sql = "SELECT * FROM user WHERE email=? ";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "there is an error 1 " . mysqli_error($stmt);
        exit;
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_row($res)) {

            $sql = "DELETE FROM passwordrecovery WHERE 	pwd_reset_email=?";
            $stmt = mysqli_stmt_init($db);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "there is an error 2 ";
                exit;
            } else {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
            }
        } else {
            header("Location: index.php?page=login&error");
            exit;
        }
        // $email = $row["email"];
        // hashing the binary token and store it in db
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        $sql = "INSERT INTO passwordrecovery (pwd_reset_email, pwd_reset_selector, pwd_reset_token, pwd_reset_expires) VALUE (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($db);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashedToken, $expiresDate);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $username = $row["user_name"];
        $to = $email;
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

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "ilyaschaoui2002@gmail.com";
        $mail->Password = "nnog npvs rrlf jfqz";
        $mail->SMTPSecure = "ssl";
        $mail->Port = "465";

        $mail->setFrom("ilyaschaoui2002@gmail.com");
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->send();

        header("Location: index.php?page=login&success");
    }
}
