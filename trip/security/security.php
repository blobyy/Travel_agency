<?php

function inputSqlInjection($data) //ochrona przed sqlinjection
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data,ENT_QUOTES,'UTF-8');
    return $data;
}


function checkEmail($mail)
{
    $mail = filter_var($mail,FILTER_VALIDATE_EMAIL);
    return $mail;
}

function checkNumber($number)
{
    $number = filter_var($number,FILTER_VALIDATE_INT);
    return $number;
}



?>