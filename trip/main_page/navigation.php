<!-- Navigation -->

<?php
if(isset($_SESSION))
{
session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../main_page/main_page.php">
      <img src="../images/Logo.png" style="width:150px;height:40px;" alt="Fashion Store">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="../catalog_page_country/catalog_page.php">Krajowe</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../catalog_page_global/catalog_page.php">Międzynarodowe</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../basket/basket.php">Koszyk</a>
          </li>
          <li class="nav-item">
              <?php
              session_start();
              if(isset($_SESSION["USERNAME"]))
              {
                  if($_SESSION["USERNAME"]=="Administrator"){
                      echo '<a class="nav-link" href="../admin/admin_panel.php">Admin</a>';
                  }
                  elseif ($_SESSION["USERNAME"]=="Sprzedawca"){
                      echo '<a class="nav-link" href="../seller/seller_panel.php">Sprzedawca</a>';
                  }
                  else{
                      echo '<a class="nav-link" href="../user/user_panel.php">'.$_SESSION["USERNAME"].'</a>';
                  }
              }
              else{
                  echo '<a class="nav-link" href="../login_page/login.php">Zaloguj</a>';
              }
              ?>


          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact/contact.php">Kontakt</a>
          </li>
            <?php
            if(isset($_SESSION["USERNAME"]))
            {
                echo '<a name="Logout" id="" class="btn text-white" href="../main_page/logout.php" role="button">Wyloguj</a>';
            }
            else{

            }
            ?>
        </ul>
      </div>
    </div>
  </nav>