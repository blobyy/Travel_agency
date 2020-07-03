<!DOCTYPE html>
<html lang="pl">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Shop">
  <meta name="author" content="Szymon/Piotr">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="productmanage.js" > </script>
</head>
<body style="padding-top: 90px;">

<?php require_once("../main_page/navigation.php");
require_once ("../security/security.php");
?>

<div class="container">
<div class="row">

<?php
require_once('connection.php');
if(empty($_SESSION['basket']) || isset($_SESSION['basket']))

        $id = $_GET["product"];
        $sql = 'SELECT * FROM product INNER JOIN sex on product.id_sex=sex.id_sex WHERE id_product = '.$id.' LIMIT 1';
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        echo '<div class="col-md col-md-6 mb-3">
        <div class="card h-100">            
          <div class="card-body">
          <a href="../product_page/product.php?product='.$row["id_product"].'"><img class="card-img" src="'.$row["image"].'" alt=""></a>

          </div> 
        </div>
      </div>
      <div class="col-md bg-light pb-4">
        <h4 class="text-black text-center">'.$row["name_of_product"].'</h4>
        <ul class="list-group">
            <li class="list-group-item list-group-item-info">
               <h3> Cena '.$row["cost"].' ZŁ </h3>
            </li>
            <li class="list-group-item">
              Data rozpoczecia '.
            ($row["Data_rozpoczecia"]).'
          </li>
         <li class="list-group-item">
              Data zakonczenia '.
            ($row["Data_zakonczenia"]).'
          </li>
             
              <li class="list-group-item">
              Pozostało '.
              ($row["quantity"]).'
          </li>
          <li class="list-group-item">
              Opis: '.
            ($row["Opis"]).'
          </li>
          <form method="POST"  id="BasketForm" name="BasketForm">
              <li class="list-group-item">
                <input type="number" value="1" name="quantity" min="0" max="'.$row["quantity"].'"> 
                Ilość sztuk jaką pragniesz zakupić.
              </li
        </ul>
        
        <button type="submit" class="btn btn-info btn-block" data-toggle="modal" name="Submit" data-target="#BasketModal" >Dodaj do koszyka</button>
        <form>
        </div>
      

      ';
      mysqli_close($conn);
     
if(isset($_POST['Submit'])) {
    echo "<script type='text/javascript'>
                $(document).ready(function(){
                $('#BasketModal').modal('show');
                });
                </script>";

    if (isset($_SESSION['basket'])) {
        $item_id = array_column($_SESSION['basket'], "id_product");
        if (!in_array($_GET["product"], $item_id)) {
            $quantity =checkNumber( $_POST['quantity']);
            if($quantity == false)
            {
                return;
            }
            $tab = array('quantity' => $quantity, 'id_product' => checkNumber( $_GET["product"]));
            $count = count($_SESSION['basket']);
            $_SESSION['basket'][$count] = $tab;
        } else {

        }
    } else {
        $tab = array('quantity' => $_POST['quantity'], 'id_product' => $_GET["product"]);
        $_SESSION["basket"][0] = $tab;
    }
}



?>



<!-- Komunikat o dodaniu do koszyka -->
<div class="modal fade" id="BasketModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Koszyk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        Dodałeś ten produkt do koszyka, dziękujemy za zainteresowanie.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Zamknij</button>
        <button type="button" class="btn btn-primary" onclick="window.location.href='../basket/basket.php'">Przejdź do koszyka</button>
      </div>
    </div>
  </div>
</div>




</div>
</div>


<footer class="py-3 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Szymon/Piotr</p>
    </div>
  
</footer>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</body>

</html>
