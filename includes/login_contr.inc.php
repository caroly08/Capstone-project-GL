<?php

declare(strict_types=1);

function is_input_empty(string $user, string $pass)
{
     if (empty($user) || empty($pass)){
        return true;
     } else {
        return false;
     }
}

function is_user_wrong(bool|array $result){
   if (!$result) {
    return true;
   } else {
    return false;
   }
}

function is_pass_wrong(string $pass, string $hashedpwd){
    if (!password_verify ($pass, $hashedpwd)) {
     return true;
    } else {
     return false;
    }
 }
 
