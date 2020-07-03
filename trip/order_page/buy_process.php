<?php
require_once ("../admin/connection.php");
session_start();

if(isset($_SESSION['basket'])) {

    if(isset($_POST["totalPrice"])){
        $price = $_POST["totalPrice"];
    }
    if(isset($_SESSION["iduser"])){
        $iduser = $_SESSION["iduser"];
    }
$status = "zakonczony";
    $sql3 = "INSERT INTO `orders` VALUES (DEFAULT,'$iduser','$status','$price')";
    if($conn->query($sql3))
    {
        $id = $conn->insert_id;
        foreach($_SESSION['basket'] as $item) {
            echo $item["id_product"];
            $product = $item['id_product'] ;
            $sql2 = "INSERT INTO `orders_products` VALUES (DEFAULT,'$id' ,'$product','2')";
            if($conn->query($sql2))
            {

            }

        }
        unset($_SESSION['basket']);
        header("Location: ../basket/basket.php");

    }
    else{
        printf("Error message: %s\n", mysqli_error($conn));
    }


}
