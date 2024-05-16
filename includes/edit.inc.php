<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UID = $_POST["UID"];
    $acctype = $_POST["acctype"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $area = $_POST["area"];
    $hrav = $_POST["hrav"];
    $bkgrd = $_POST["bkgrd"];
    $link = $_POST["link"];

    try {
        require_once "dbh.inc.php";
        require_once "config_sessioninc.php";

        if (!empty($UID)) {

        $query = "UPDATE users SET acctype = :acctype, name = :name, email = :email, area = :area, hrav = :hrav, bkgrd = :bkgrd, link = :link WHERE UID = $UID";

        $stmt = $pdo->prepare($query);
        
        
        $stmt->bindParam(":acctype", $acctype);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":area", $area);
        $stmt->bindParam(":hrav", $hrav);
        $stmt->bindParam(":bkgrd", $bkgrd);
        $stmt->bindParam(":link", $link);
        $stmt->execute ();

        header("Location: ../Private/admin.php?update=success");

        $pdo=null;
        $stmt=null;

        die(); 
        } else{
            header("Location: ../Private/admin.php");
        }

    } catch (PDOException $e) {
        die("Query failed (edit page): " . $e->getMessage());
    }

} else {
    header("Location: ../error.php");
    die();
}