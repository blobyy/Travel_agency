<?php
require_once('../admin/connection.php');


if(isset($_POST["name"]))
{
    $name =   ($_POST["name"]);
}
if(isset($_POST["price"]))
{
    $price  = ($_POST["price"]);
}
if(isset($_POST["sex"]))
{
    $sex  = ($_POST["sex"]);
}
if(isset($_POST["category"]))
{
    $category  = ($_POST["category"]);
}
if(isset($_POST["size"]))
{
    $size  = ($_POST["size"]);
}
if(isset($_POST["left"]))
{
    $left  = ($_POST["left"]);
}
if(isset($_POST["image"]))
{
    $img  = ($_POST["image"]);
}
if(isset($_POST["proccesing"]))
{
    $id_sell  = ($_POST["proccesing"]);
}



$sql3 = "INSERT INTO `product` VALUES (DEFAULT,'$name','$size','$category','$sex','$left','$price','$id_sell','$img')";
if($conn->query($sql3)) {
    header("Location:../proccesing/seller_panel.php");
}
else{
    echo mysqli_error($conn);
    //header("Location:../proccesing/new_product.php");
}
