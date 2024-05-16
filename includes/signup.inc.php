<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $acctype = $_POST["usertype"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $area = $_POST["area"];
    $hrav = $_POST["hrav"];
    $bkgrd = $_POST["bkgrd"];
    $link = $_POST["link"];

    try {
        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

        $errors = [];

        if(is_input_empty($user, $pass, $email)) {
            $errors["empty_input"] = "Required";
        }
        if(is_email_invalid ($email)) {
            $errors["invalid_email"] = "Invalid Email";
        }
        if(is_user_taken ($pdo, $user)) {
            $errors["user_taken"] = "User already taken";
        }

        require_once "config_sessioninc.php";

        if ($errors) {
            $_SESSION["error_signup"] = $errors;
            $signupdata=[
                'user' =>$user,
                'emai' =>$email
            ];
            header("Location: ../Public/signup.php");
            die(); 
        }

        create_user($pdo, $user, $pass, $acctype, $name,$email, $area, $hrav, $bkgrd,$link);
        header("location:../Public/signup.php?signup=success");

        $pdo = null;
        $stmt = null;

        die(); 

    } catch (PDOException $e){
        die("Query failed " . $e->getMessage());
    }
} else {
    header("Location: ../Public/signup.php");
    die();
}
