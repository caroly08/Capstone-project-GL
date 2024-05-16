<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UID = $_POST["UID"];
    $pass = $_POST["pass"];

    try {
        require_once "dbh.inc.php";
        require_once "config_sessioninc.php";

        if (!empty($UID)) {

        $query = "UPDATE users SET pass = :pass WHERE UID = $UID";

        $stmt = $pdo->prepare($query);

        $options =['cost' => 12];

        $hashedpwd = password_hash($pass, PASSWORD_BCRYPT,$options);
        $stmt ->bindParam(":pass", $hashedpwd);
        $stmt->execute ();
        

        header("Location: ../Private/user_list.php?reset=success");

        $pdo=null;
        $stmt=null;

        die(); 
        } else{
            header("Location: ../Private/user_list.php?check");
        }

    } catch (PDOException $e) {
        die("Query failed (edit page): " . $e->getMessage());
    }

} else {
    header("Location: ../error.php");
    die();
}