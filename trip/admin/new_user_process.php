<?php
require_once ("../admin/connection.php");
if(isset($_POST["password1"]) and isset($_POST["password2"]))
{
    if($_POST["password1"] != $_POST["password2"])
    {
        header("Location: ../admin/new_user.php?pass=1");
        return;
    }
    else{
        $salt1 = "dawid";
        $salt2 = "halada";
        $token = hash("ripemd128",$salt1.$_POST["password1"].$salt2);
    }
}

if(isset($_POST['firstName']))
{
    $first_name = $_POST['firstName'];
    ucfirst($first_name);
}
if(isset($_POST['lastName']))
{
    $last_name = $_POST['lastName'];
    ucfirst($last_name);
}
if(isset($_POST['email']))
{
    $email = $_POST['email'];

}
if(isset($_POST['address']))
{
    $address = $_POST['address'];
}

if(isset($_POST['country']))
{
    $country = $_POST['country'];
}
if(isset($_POST['state']))
{
    $state = $_POST['state'];
}
if(isset($_POST['zip']))
{
    $zip = $_POST['zip'];
}

if(isset($_POST["permission"]))
{
    $perm = $_POST["permission"];
}
else{
    $perm = 1;
}



$sql = "SELECT Email FROM user WHERE Email = '$email'";
$result = mysqli_query($conn, $sql);
if($result != null){
    header("Location: ../admin/new_user.php?email=1");
    return;
}

$sql3 = "INSERT INTO `users`VALUES (DEFAULT,'$first_name','$last_name','$email','$token','$perm',0)"; //dodawanie użytkownika
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
            header("Location: ../admin/users.php");
        }
        else{
            echo"błąd ";
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


