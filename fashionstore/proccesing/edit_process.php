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
if(isset($_POST["category"]))
{
    $category  =$_POST["category"];
}
if(isset($_POST["size"]))
{
    $size  =$_POST["size"];
}
if(isset($_POST["left"]))
{
    $left  =$_POST["left"];
}
if(isset($_POST["image"]))
{
    $img  =$_POST["image"];
}
if(isset($_POST["proccesing"]))
{
    $id_sell  =$_POST["proccesing"];
}



$sql1 = "UPDATE `product` SET `id_product`='$id',`name_of_product`='$name',`size`='$size',`id_type`='$category',
        `id_sex`='$sex',`quantity`='$left',`cost`='$price',`ID_Seller`='$id_sell',`image`='$img' WHERE id_product = '$id'";
if($conn->query($sql1))
{
    header("Location:../proccesing/seller_panel.php");
}



