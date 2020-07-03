<?php


require_once('../admin/connection.php');//połączenie


if (isset($_POST["delete"])) {
    if (isset($_POST["id_product"])) {
        $id = $_POST["id_product"];
        $sql = "DELETE FROM `product` WHERE id_product= '$id'";
        mysqli_query($conn, $sql);
        header("Location:../admin/admin_panel.php");
    }

} else {
    return; //nie nacisnal
}


