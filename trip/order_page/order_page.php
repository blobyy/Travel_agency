<!DOCTYPE html>
<html lang="pl">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Shop">
  <meta name="author" content="Szymon/Piotr">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body style="padding-top: 90px;">

<?php
require_once("../main_page/navigation.php");
require_once ("../admin/connection.php");
?>

<div class="container">
<div class="row">
    <div class="col-lg-8">
        <div class="container">
            <form action="buy_process.php" method="post">
                <fieldset class="form-group row">
                    <legend class="col-form-legend col-md-6">Dane Kontaktowe</legend>
                    <div class="col-md-6">
                    </div>
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="Imie" id="Imie" placeholder="Imie">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="Nazwisko" id="Nazwisko" placeholder="Nazwisko">
                    </div>
                    <div class="col-sm-6 pt-3">
                        <input type="number" class="form-control" name="Telefon" id="Telefon" placeholder="Telefon">
                    </div>
                    <div class="col-sm-6 pt-3">
                        <input type="email" class="form-control" name="E-Mail" id="E-Mail" placeholder="E-Mail">
                    </div>
                </div>

               
                <fieldset class="form-group row">
                    <legend class="col-form-legend col-md-6">Adres</legend>
                    <div class="col-md-6">
                    </div>
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="Kraj" id="Kraj" placeholder="Kraj">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="Kod-Pocztowy" id="Kod-Pocztowy" placeholder="Kod-Pocztowy">
                    </div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Miasto" id="Miasto" placeholder="Miasto">
                    </div>
                    
                    <div class="col-sm-8 pt-3">
                        <input type="text" class="form-control" name="Ulica" id="Ulica" placeholder="Ulica">
                    </div>
                    <div class="col-sm-4 pt-3">
                        <input type="text" class="form-control" name="NrDomu" id="NrDomu" placeholder="NrDomu">
                    </div>
                </div>
                
                <div class="card text-left col-md-6 mx-auto">
                  <div class="card-body">
                  <h4 class="card-title">Dostawa</h4>
                    <input name="" id="" class="btn btn-primary" type="button" value="Kurier">
                    <input name="" id="" class="btn btn-primary" type="button" value="Poczta">
                    <input name="" id="" class="btn btn-primary" type="button" value="Paczkomat">
                  </div>
                </div>
                
                   <!--Platnosc -->
                    <fieldset class="form-group row">
                    <legend class="col-form-legend col-md-6">Płatność</legend>
                    <div class="col-md-6">
                    </div>
                    </fieldset>

                <div class="input-group pt-3">
                    <input type="hidden" name="totalPrice" value="<?php echo $_POST["totalPrice"] ?>">
                <button type="submit" class="btn btn-primary  mx-auto ">Zapłać przez internet</button>
                <button type="submit" class="btn btn-primary  mx-auto">Zapłać przy odbiorze</button> 
               </div>
            </form>
           


            
                
            <h3 class="display-5 mx-auto">Kupując w naszym sklepie zgadzasz się na ...</h3>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h3 class="display-4 mx-auto"> Kwota <?php echo $_POST["totalPrice"] ?>PLN</h3>
                
                <hr class="my-2">
                <input type="text" placeholder="Kod-zniżkowy">
                <p class="lead pt-3">
                    
                    <a class="btn btn-primary btn-md " href="Jumbo action link" role="button">Wprowadz znizke</a>
                </p>
            </div>
        </div>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h3 class="display-5 mx-auto">Podgląd produktów</h3>
<?php
                if(isset($_SESSION['basket']))
                {
                foreach($_SESSION['basket'] as $item) {
                    $sql = 'SELECT * FROM product WHERE id_product = ' . $item['id_product'] . ' LIMIT 1';
                    $position = array_search($item, $_SESSION['basket']);
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<div >
                    <img class="card-img img-fluid img-thumbnail" src="' . $row['image'] . '" alt="">
                       </div>
                       ';
                }}
?>


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