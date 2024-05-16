<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $UID = $_POST["UID"];
    
    try {
        require_once 'config_sessioninc.php';
        require_once 'dbh.inc.php';
        
        if (!empty($UID)) {
        $query = "DELETE FROM users WHERE UID=:uid";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':uid', $UID);
        $stmt->execute();

        header("Location: ../Private/user_list.php");

        
        $pdo = null;
        $stmt = null;
        die();

    } else{
        header("Location: ../Private/user_list.php");
        echo "<p>Need Number</p>";
    }

} catch (PDOException $e) {
    die("Query failed (edit page): " . $e->getMessage());
}

} else {
header("Location: ../error.php");
die();
}