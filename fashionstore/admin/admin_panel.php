<!DOCTYPE html>
<html lang="pl">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Shop">
  <meta name="author" content="Dawid Halada">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 

</head>
<?php require_once("../main_page/navigation.php") ?>
<body style="padding-top: 70px;">



<div class="col-12-md">
   
    
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nazwa</th>
              <th>Cena</th>
              <th>Sztuk</th>
              <th>Rozmiar</th>
              <th>Zdjęcie</th>
            </tr>
          </thead>
          <tbody>
          <?php
        require_once('connection.php');

        $sql = 'SELECT * FROM product';
        $result = mysqli_query($conn,$sql);


          while($row = mysqli_fetch_assoc($result)) //wypisywanie produktów
          {
            echo '<tr>
                    <td>
                     '.$row["id_product"].' 
                    </td>
                    <td>
                    <a href="admin_product_edit.php?product='.$row["id_product"].'">'.$row["name_of_product"].'</a>
                    </td>
                    <td>
                        '.$row["cost"].'
                    </td>
                    <td>
                        '.$row["quantity"].'
                    </td>
                    <td>
                        '.$row["size"].'
                    </td>
                    <td ">
                        '.$row["image"].'
                    </td>
                    
                   
                <tr>';
          }
        
        mysqli_close($conn);
        ?>
          </tbody>
        </table>
      </div>

</div>



<footer class="pt-5">
<?php require_once("admin_nav.php")?>
</footer>



</div>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</body>

</html>

