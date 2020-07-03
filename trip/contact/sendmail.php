<?php
require_once ("../security/security.php");

if(isset($_POST["name"]))
{
    $name = inputSqlInjection($_POST["name"]);
}
if(isset($_POST["email"]))
{
    $email = checkEmail(inputSqlInjection($_POST["email"]));
    if(!is_string($email))
    {
        header("Location:contact.php");
    }
}
if(isset($_POST["subject"]))
{
    $subject = inputSqlInjection($_POST["subject"]);
}

if(isset($_POST["message"]))
{
    $content = inputSqlInjection($_POST["message"]);
}

$toEmail = $email;


$mailHeaders = "From: FashionShop\r\n";
if (mail($toEmail, $subject, $content, $mailHeaders)) { //dodac name
    $type = "success";
    header("Location:contact.php");
}