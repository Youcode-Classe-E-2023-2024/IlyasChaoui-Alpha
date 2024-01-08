<?php

class Validation
{

    static function validateUsername($username)
    {
        if (empty($username)) {
            return "Username is required";
        } elseif (!preg_match('/^[a-zA-Z0-9]{3,}$/', $username)) {
            return "Invalid username. Username should be at least 3 characters long.";
        }
        return false;
    }

    static function userChecker($email, $db)
    {
        if (User::user_checker($email, $db)) {
            return "User already exists";
        }
    }

    static function validatePhoneNumber($phoneNumber)
    {
        if (empty($phoneNumber)) {
            return "Phone number is required";
        } elseif (!preg_match('/^[0-9]{10}$/', $phoneNumber)) {
            return "Invalid phone number. Phone number should have 10 digits.";
        }
        return false;
    }

    static function validateEmail($email)
    {
        if (empty($email)) {
            return "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }
        return false;
    }

    static function validatePassword($password)
    {
        if (empty($password)) {
            return "Password is required";
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password)) {
            return "Invalid password. Password should have at least 8 characters, including one uppercase letter, one lowercase letter, and one number.";
        }
        return false;
    }

    static function pictureValidation($fileName)
    {
        if (!$fileName) {
            return "No picture selected. Please select an image! ";
        }
    }

    static function handleFileUpload()
    {
        if (array_key_exists("picture", $_FILES)){
            $targetDir = "./assets/img/";
            $fileName = basename($_FILES["picture"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

            // File upload logic (e.g., file type and size validation)
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFilePath)) {
                return $fileName;
            }
        }return false;
    }

}