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

        echo '
      <div class="col-md bg-light pb-4">
      <form action="../admin/add_process.php" method="post">
      Nazwa
        <input class="form-control" class="text-black text-center" name="name" value=""></input>
        <input hidden name="id_product" value=""></input>
         <input type="number" hidden name="seller" value="1"></input>
        <ul class="list-group">
            <li class="list-group-item list-group-item-info">
               <h3>Cena </h3><input class="form-control" type="number" min="0" name="price" value=""></input>
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


          echo    '</select> <li class="list-group-item">
                Data rozpoczęcia
                 <input class="form-control" type="string" name="begin" value="" ></input>
              </li>
              <li class="list-group-item">
                Data zakończenia
                 <input class="form-control" type="string" name="end" value="" ></input>
              </li>
               <li class="list-group-item">
                Opis
                 <input class="form-control" type="string" name="opis" value="" ></input>
              </li>
              <li class="list-group-item">
              Pozostało
                 <input class="form-control" type="string" name="left" value="" ></input>
          </li>
          <li class="list-group-item">
            <h4>  Link do zdjęcia </h4>
                 <input class="form-control" type="string" name="image" value=""></input>
          </li>
              
        </ul>
        <button type="submit" class="btn btn-info btn-block" >Dodaj nowy</button>
       
        </form>
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