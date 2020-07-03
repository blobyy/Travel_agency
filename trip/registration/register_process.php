<?php
require_once ("../admin/connection.php");
require_once ("../security/security.php");

if(isset($_POST["password1"]) and isset($_POST["password2"]))
{
    if($_POST["password1"] != $_POST["password2"])
    {
        header("Location: ../registration/registration.php?pass=1");
        return;
    }
    else{
        $salt1 = "Szymon";
        $salt2 = "Piotr";
        $token = hash("ripemd128",$salt1.$_POST["password1"].$salt2);
    }
}

if(isset($_POST['firstName']))
{
    $first_name = inputSqlInjection($_POST['firstName']);
    ucfirst($first_name);
}
if(isset($_POST['lastName']))
{
    $last_name = inputSqlInjection($_POST['lastName']);
    ucfirst($last_name);
}
if(isset($_POST['email']))
{
    $email =  checkEmail(($_POST['email']));
}
if(isset($_POST['address']))
{
    $address = inputSqlInjection($_POST['address']);
}

if(isset($_POST['country']))
{
    $country = inputSqlInjection($_POST['country']);
}
if(isset($_POST['state']))
{
    $state = inputSqlInjection($_POST['state']);
}
if(isset($_POST['zip']))
{
    $zip = inputSqlInjection($_POST['zip']);

}

$sql = "SELECT Email FROM user WHERE Email = '$email'";
$result = mysqli_query($conn, $sql);
if($result != null){
    header("Location: ../registration/registration.php?email=1");
    return;
}

$sql3 = "INSERT INTO `users`VALUES (DEFAULT,'$first_name','$last_name','$email','$token',1,0,1)"; //dodawanie użytkownika
if($conn->query($sql3)) // jezeli zostanie dodany, dodajemy adres
{
    $id = $conn->insert_id;
    $sql2 = "INSERT INTO `address` VALUES ('$id' ,'$country','$state','$address','$zip')";
    if($conn->query($sql2))
    {
        $id2 = $conn->insert_id;
        $sql1 = "UPDATE `users` SET `ID_address` = '$id2'  WHERE `users`.`ID_User` = '$id'";
       if($conn->query($sql1))
       {

           header("Location: ../login_page/login.php");
       }
       else{
           echo"błąd podczas update";

       }


    }else{
        echo"błąd podczas dodawania adresu";

    }
}
else{
    printf("Error message: %s\n", mysqli_error($conn));
    echo " \t bład";
}




mysqli_close($conn);


