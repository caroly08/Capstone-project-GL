<?php

declare(strict_types=1);

function get_user(object $pdo, string $user ){
    $query = "SELECT * FROM users WHERE user = :user;";
 $stmt = $pdo ->prepare ($query);
 $stmt ->bindParam(":user", $user);
 $stmt->execute ();

 $result = $stmt -> fetch(PDO::FETCH_ASSOC);
 return $result;
}

