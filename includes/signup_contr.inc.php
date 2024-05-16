<?php

declare(strict_types=1);

function is_input_empty(string$user, string $pass, string $email) {
    if (empty($user) || empty($pass) || empty($email)){
        return true;
    }
    else {
        return false;
    }
}

function is_email_invalid (string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

        return true;
    }
    else {
        return false;
    }
}

function is_user_taken (object $pdo, string $user) {
    if (get_user($pdo, $user)) {
        return true;
    }
    else {
        return false;
    }
}

function create_user (object $pdo, string $user, string $pass, string $acctype, string $name,string $email, string $area,string $hrav,string $bkgrd,string $link ) {
    
    set_user($pdo,  $user,  $pass, $acctype, $name,$email,  $area, $hrav, $bkgrd,$link);
}

