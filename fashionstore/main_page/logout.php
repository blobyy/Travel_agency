<?php
session_start();
if(isset($_SESSION["USERNAME"]))
{
    unset($_SESSION["USERNAME"]);
}
header("Location:../main_page/main_page.php");