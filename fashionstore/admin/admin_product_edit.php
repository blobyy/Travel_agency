<!DOCTYPE html>
<html lang="pl">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Shop">
  <meta name="author" content="Dawid Halada">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

</head>
<body style="padding-top: 90px;">

<?php require_once("../main_page/navigation.php") ?>



<div class="container">
<div class="row">
<?php
require_once('connection.php');

        $id = $_GET["product"];
        
        $sql = 'SELECT * FROM product INNER JOIN sex on product.id_sex=sex.id_sex INNER JOIN product_category on id_type=id_category WHERE id_product = '.$id.' LIMIT 1';
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
        <h4 class="text-black text-center" contenteditable="true">'.$row["name_of_product"].'</h4>
        <ul class="list-group">
            <li class="list-group-item list-group-item-info">
               <h3>Cena </h3><h3 contenteditable="true">'.$row["cost"].'</h3>
            </li>
            <li class="list-group-item">
                Płeć <h4>'.
                ($row["sex"] == "man"?"Mężczyźni":"Kobiety").'
                </h4>
                 Wprowadź nowy ->
                 <input type="text" ></input>
            </li>
            <li class="list-group-item">
                 Kategoria <h4>'.
                 ($row["category"]).'
                 </h4>
                 Wprowadź nowy ->
                 <input type="string" ></input>
             </li>
             <li class="list-group-item">
                Rozmiar <h4>'.
                 ($row["size"]).'
                 </h4>
                 Wprowadź nowy ->
                 <input type="string" ></input>
              </li>
              <li class="list-group-item">
              Pozostało <h4>'.
              ($row["quantity"]).'
              </h4>
                 Wprowadź nowy ->
                 <input type="string" ></input>
          </li>
          <li class="list-group-item">
            <h4>  Link do zdjęcia </h4>
                 <input type="string" ></input>
          </li>
              
        </ul>
        <button type="button" class="btn btn-info btn-block" >Edytuj</button>
        <button type="button" class="btn btn-info btn-block" >Usuń</button>
      </div>
      ';
      mysqli_close($conn);

?>


</div>
</div>
<footer class="pt-5">
<?php require_once("admin_nav.php")?>
</footer>









</body>