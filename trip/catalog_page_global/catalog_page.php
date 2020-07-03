<!DOCTYPE html>
<html lang="pl">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Shop">
  <meta name="author" content="Dawid Halada">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body style="padding-top: 90px;">

  
<?php
require_once("../main_page/navigation.php");

?>

  <!-- Page Content -->
  <div class="container">


      <h1 class="display-1">Międzynarodowe</h1>

      <div class="col-lg-9 mx-auto">


        <div class="row">

        <?php
        require_once('connection.php');

        $sql = 'SELECT * FROM product where id_sex = 2';
        $result = mysqli_query($conn,$sql);


        
          while($row = mysqli_fetch_assoc($result))
          {
            echo '<div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">            
              <div class="card-body">
                <h4 class="card-title">
                <a href="../product_page/product.php?product='.$row["id_product"].'">'.$row["name_of_product"].'</a>
                </h4>
                <h5>'.$row["cost"].' PLN</h5>
              </div> 
              <a href="../product_page/product.php?product='.$row["id_product"].'"><img class="card-img" src="'.$row["image"].'" alt=""></a>
            </div>
          </div>';
          }
        
        mysqli_close($conn);


        ?>


        
         
        </div>
 
      </div>
    
    </div>
    
  </div>




<footer class="py-3 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Szymon</p>
    </div>
  
</footer>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</body>

</html>
