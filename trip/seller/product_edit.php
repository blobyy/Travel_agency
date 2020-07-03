<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Shop">
    <meta name="author" content="Szymon/Piotr">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body style="padding-top: 90px;">

<?php require_once("../main_page/navigation.php") ?>



<div class="container">
    <div class="row">
        <?php
        require_once('../admin/connection.php');

        $id = $_GET["product"];

        $sql = 'SELECT * FROM product INNER JOIN sex on product.id_sex=sex.id_sex  WHERE id_product = '.$id.' LIMIT 1';
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        echo '<div class="col-md col-md-6 mb-3" >
        <div class="card ">            
          <div class="card-body">
          <a href="../product_page/product.php?product='.$row["id_product"].'"><img class="card-img" src="'.$row["image"].'" alt=""></a>
          </div> 
        </div>
      </div>
      <div class="col-md bg-light pb-4">
      <form action="edit_process.php" method="post">
        <input class="text-black text-center" name="name" value="'.$row["name_of_product"].'"></input>
        <input hidden name="id_product" value="'.$row["id_product"].'"></input>
         <input type="number" hidden  name="seller" value="'.$row["ID_Seller"].'"></input>
        <ul class="list-group">
            <li class="list-group-item list-group-item-info">
               <h3>Cena </h3><input type="number" min="0" name="price" value="'.$row["cost"].'"></input>
            </li>
            <li class="list-group-item">
                Kategoria             
                 <select class="custom-select d-block w-100" id="sex" name="sex" required>
                  <option value="">Wybierz...</option>';

                    $sql = "SELECT * FROM sex";
                    $result = mysqli_query($conn,$sql);
                    while($p= mysqli_fetch_assoc($result))
                    {
                        echo "<option value=".$p["id_sex"]."> ".$p["category"]."</option>";
                    }

             echo   '</select>
            </li>
            ';

        echo   '
             </li>

          <li class="list-group-item">
              Data zakonczenia
              <input type="string" name="begin" value="'.($row["Data_rozpoczecia"]).'" ></input>' .'
          </li>
          
          <li class="list-group-item">
              Data zakonczenia
              <input type="string" name="end" value="'.($row["Data_zakonczenia"]).'" ></input>' .'
          </li>
           <li class="list-group-item">
              Opis 
              <input type="string" name="Opis" value="'.($row["Opis"]).'" ></input>' .'
          </li>
              <li class="list-group-item">
              Pozostało
                 <input type="string" name="left" value="'.($row["quantity"]).'" ></input>
          </li>
          <li class="list-group-item">
            <h4>  Link do zdjęcia </h4>
                 <input type="string" name="image" value="'.$row["image"].'"></input>
          </li>
              
        </ul>
        <button type="submit" class="btn btn-info btn-block" >Edytuj</button>
       
        </form>
        <form action="del_product.php" method="post">
        <input hidden name="id_product" value="'.$row["id_product"].'"></input>
         <button type="submit" name="delete" class="btn btn-info btn-block" >Usuń</button>
         </form>
      </div>
      ';
        mysqli_close($conn);
        ?>


    </div>
</div>









</body>