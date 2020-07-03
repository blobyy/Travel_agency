<?php
require_once ("../admin/connection.php");
session_start();
if(isset($_POST['loginUser'])){
    $salt1 = "dawid";
    $salt2 = "halada";
    $_SESSION["USERNAME"] = "";
    $token = hash("ripemd128",$salt1.$_POST["Password"].$salt2);
    $sql = 'SELECT * FROM users WHERE Email = "'.  ($_POST["Email"]).'" AND Password = "'.$token.'" LIMIT 1';
    $result = mysqli_query($conn,$sql);
    $user = mysqli_fetch_assoc($result);
    if($user["Active"] == 0)
    {

        header("Location:../login_page/login.php?error=2"); //konto nie aktywowane
        return;
    }
    if($user)
    {
        if(!empty($_POST['remember']))
        {
            setcookie("login",$user["Email"],time()+(10 *365*24*60*60 ));
            setcookie("password",  ( $_POST["Password"]),time()+(10 * 365 *24 *60*60));
        }
        else{
            if(isset($_COOKIE["login"]))
            {
                setcookie("login","");
            }
            if(isset($_COOKIE["password"]))
            {
                setcookie("password","");
            }
        }
        if($user["Permission"] == 1){
            $_SESSION["USERNAME"] = $user["First_Name"];
            $_SESSION["iduser"] = $user["ID_User"];
            header("Location:../user/user_panel.php");
        }
        if($user["Permission"] == 3){
            $_SESSION["USERNAME"] = "Administrator";
            $_SESSION["iduser"] = $user["ID_User"];
            header("Location:../admin/admin_panel.php");
        }

    }
    else{
        unset($_SESSION["USERNAME"]);
        unset($_COOKIE["login"]);
        unset($_COOKIE["password"]);
        header("Location:../login_page/login.php?error=1"); //blad loginu lub hasla
    }

}