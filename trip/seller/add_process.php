<?php
require_once('../admin/connection.php');
require_once ("../security/security.php");

if(isset($_POST["name"]))
{
    $name =  inputSqlInjection($_POST["name"]);
}
if(isset($_POST["price"]))
{
    $price  =inputSqlInjection($_POST["price"]);
}
if(isset($_POST["sex"]))
{
    $sex  =inputSqlInjection($_POST["sex"]);
}
if(isset($_POST["end"]))
{
    $end  =inputSqlInjection($_POST["end"]);
}
if(isset($_POST["begin"]))
{
    $begin  =inputSqlInjection($_POST["begin"]);
}
if(isset($_POST["opis"]))
{
    $opis  =inputSqlInjection($_POST["opis"]);
}
if(isset($_POST["left"]))
{
    $left  =inputSqlInjection($_POST["left"]);
}
if(isset($_POST["image"]))
{
    $img  =inputSqlInjection($_POST["image"]);
}
if(isset($_POST["seller"]))
{
    $id_sell  =inputSqlInjection($_POST["seller"]);
}



$sql3 = "INSERT INTO `product` VALUES (DEFAULT,'$name','$sex','$left','$price','$begin','$end','$opis','$id_sell','$img')";
if($conn->query($sql3)) {
    header("Location:../seller/seller_panel.php");
}
else{
    echo mysqli_error($conn);
    //header("Location:../seller/new_product.php");
}
