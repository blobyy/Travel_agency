<?php

require_once("connection.php"); //połączenie


if (isset($_POST["delete"])) {
    if (isset($_POST["id"])) {
        $id=$_POST["id"];
    $sql = "DELETE FROM `users` WHERE ID_User=$id";
    mysqli_query($conn,$sql);
    header("Location: ../admin/users.php");
    }

} else {
    return; //nie nacisnal
}


?>