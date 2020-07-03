<?php
require_once("../admin/connection.php");

if(!empty($_GET["id"])) {
    $query = "UPDATE users set Active = 1 WHERE ID_User='" . $_GET["id"]. "'";
    $result = $conn->query($query);
    if(!empty($result)) {
        header("Location:../login_page/login.php");
    } else {
        $message = "Problem in account activation.";
    }
}
?>