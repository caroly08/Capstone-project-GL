<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    try {
        require_once 'config_sessioninc.php';
        require_once 'dbh.inc.php';

        $user_id = $_SESSION["user_id"];

        $query = "DELETE FROM users WHERE UID=$user_id";
        $pdo->exec($query);

        header("Location: logout.inc.php");

        
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query failed (Delete user page): " . $e->getMessage());
    }

} else {
    echo "Request failed";
    die();
}