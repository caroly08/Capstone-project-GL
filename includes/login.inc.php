<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST["user"];
    $pass = $_POST["pass"];

    try {
        require_once "dbh.inc.php";
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';
        
        $errors = [];

        if(is_input_empty($user, $pass)) {
            $errors["empty_input"] = "Username and Password Required";
        }
         
        $result = get_user($pdo, $user);

        if (is_user_wrong($result)) {
            $errors["login_incorrect"] = "incorrect Login info";
        }
        
        if (!is_user_wrong($result) && is_pass_wrong($pass, $result["pass"])) {
            $errors["login_incorrect"] = "incorrect Login info";
        }
        

        require_once "config_sessioninc.php";

        if ($errors) {
            $_SESSION["errors_login"] = $errors;

            header("Location:../Public/login.php");
            die(); 
        }
        
$newSessionId = session_create_id();
$sessionId = $newSessionId . "_". $result["UID"];
session_id($sessionId);

$_SESSION["user_id"] = $result["UID"];
$_SESSION["user"] = htmlspecialchars($result["user"]) ;
$_SESSION["acctype"] = $result["acctype"];
$_SESSION["Name"] = $result["Name"];

$_SESSION["last_regeneration"] = time();


if ($result["acctype"] === "ngo") {
    header("location: ../Private/ngohome.php?Login=success");
 
}elseif ($result["acctype"] === "admin"){
    
    header("location: ../Private/admin.php?Login=success");}
else {
    
    header("location: ../Private/volhome.php?Login=success");
    
}
$pdo = null;
$stmt = null;

die();

    } catch (PDOException $e){
        die("Query failed " . $e->getMessage());
    }

}else {
    header("Location: ../Public/login.php");
    die();
}

