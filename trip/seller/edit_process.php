<?php


require_once('../admin/connection.php');

if(isset($_POST["id_product"]))
{
    $id =$_POST["id_product"];
}

if(isset($_POST["name"]))
{
    $name =$_POST["name"];
}
if(isset($_POST["price"]))
{
    $price  =$_POST["price"];
}
if(isset($_POST["sex"]))
{
    $sex  =$_POST["sex"];
}
if(isset($_POST["Opis"]))
{
    $opis  =$_POST["Opis"];
}
if(isset($_POST["begin"]))
{
    $begin  =$_POST["begin"];
}
if(isset($_POST["end"]))
{
    $end  =$_POST["end"];
}
if(isset($_POST["left"]))
{
    $left  =$_POST["left"];
}
if(isset($_POST["image"]))
{
    $img  =$_POST["image"];
}
if(isset($_POST["seller"]))
{
    $id_sell  =$_POST["seller"];
}



$sql1 = "UPDATE `product` SET `id_product`='$id',`name_of_product`='$name',`id_sex`='$sex',`quantity`='$left',
        `cost`='$price',`Data_rozpoczecia`='$begin',`Data_zakonczenia`='$end',`Opis`='$opis',`ID_Seller`='0',`image`='$img' WHERE id_product = '$id'";
if($conn->query($sql1))
{
    header("Location:../admin/admin_panel.php");
}



