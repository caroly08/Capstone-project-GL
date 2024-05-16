<?php

declare(strict_types=1);

function get_user(object $pdo, string $user){
 $query = "SELECT user FROM users WHERE user = :user;";
 $stmt = $pdo ->prepare ($query);
 $stmt ->bindParam(":user", $user);
 $stmt->execute ();

 $result = $stmt -> fetch(PDO::FETCH_ASSOC);
 return $result;
}

function set_user(object $pdo, string $user, string $pass, string $acctype, string $name,string $email, string $area,string $hrav,string $bkgrd,string $link)
{
$query = "INSERT INTO users (user, pass, AccType, Name, Email, Area, HrAv, bkgrd, link) VALUES
    (:user, :pass, :acctype,:name,:email,:area,:hrav,:bkgrd,:link);";
 $stmt = $pdo ->prepare ($query);

$options =[
    'cost' => 12
];
$hashedpwd = password_hash($pass, PASSWORD_BCRYPT,$options);

 $stmt ->bindParam(":user", $user);
 $stmt ->bindParam(":pass", $hashedpwd);
 $stmt ->bindParam(":acctype", $acctype);
 $stmt ->bindParam(":name", $name);
 $stmt ->bindParam(":email", $email);
 $stmt ->bindParam(":area", $area);
 $stmt ->bindParam(":hrav", $hrav);
 $stmt ->bindParam(":bkgrd", $bkgrd);
 $stmt ->bindParam(":link", $link);
 $stmt->execute ();
}