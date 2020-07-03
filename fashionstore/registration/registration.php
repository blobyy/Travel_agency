<!DOCTYPE html>
<html lang="pl">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Shop">
  <meta name="author" content="Dawid Halada">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  

 <link href="form-validation.css" rel="stylesheet">
</head>
<body class="bg-light" style="padding-top: 40px;">
<?php
require_once("../main_page/navigation.php");
require_once ("../admin/connection.php");
//bledny mail
$mail_error = 0;
if(isset($_GET["email"]))
    $mail_error = $_GET["email"];
//bledny mail koniec

//takie samo haslo
$pass_error = 0;
if(isset($_GET["pass"]))
    $pass_error = $_GET["pass"];
//takie samo haslo koniec

?>
    <div class="container">
      <div class="py-4 text-center">
        <h2>Rejestracja</h2>
      </div>
          <form class="needs-validation" method="post" action="register_process.php" >
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Imie</label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Wprowadź poprawne imie
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Nazwisko</label>
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Wprowadz poprawne nazwisko
                </div>
              </div>
            </div>

        
            <div class="mb-3">
              <label for="email">Email <?php if($mail_error == 1) {
                    echo "<h5 class='text-danger'>Konto z takim mail już istnieje</h5>";
                  } ?></label>
              <input type="email" class="form-control" pattern=".*@\w*\.\w*" id="email" name="email" value="" placeholder="twoj@email.pl">
              <div class="invalid-feedback">
               Wprowadź poprawny mail
              </div>
            </div>
              <div class="row">
                  <div class="col-md-6 mb-3">
                      <label for="password1">Hasło<?php if($pass_error == 1) {
                              echo "<h5 class='text-danger'>Hasła się nie zgadzają</h5>";
                          } ?></label>
                      <input type="password" class="form-control" id="password1" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})" name="password1" placeholder="" value="" required>
                      <div class="invalid-feedback">
                          Wprowadź poprawne hasło
                      </div>
                  </div>
                  <div class="col-md-6 mb-3">
                      <label for="password2">Powtórz hasło<?php if($pass_error == 1) {
                              echo "<h5 class='text-danger'>Hasła się nie zgadzają</h5>";
                          } ?></label>
                      <input type="password" class="form-control" id="password2" name="password2" placeholder="" value="" required>
                      <div class="invalid-feedback">
                          Wprowadz poprawne hasło
                      </div>
                  </div>
              </div>
            <div class="mb-3">
              <label for="address">Adres</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Rynek 12" required>
              <div class="invalid-feedback">
                Wprowadź poprawny adres
              </div>
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Kraj</label>
                <select class="custom-select d-block w-100" id="country" name="country" required>
                  <option value="">Wybierz...</option>
                    <?php
                    $sql = 'SELECT * FROM country';
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '<option value="'.$row['ID_country'].'">'.$row['country'].'</option>';
                    }
                    ?>
                </select>
                <div class="invalid-feedback">
                  Wybierz kraj.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Województwo</label>
                <select class="custom-select d-block w-100" id="state" name="state" required>
                  <option value="">Wybierz...</option>
                    <?php
                    $sql = 'SELECT * FROM state';
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '<option value="'.$row['ID_state'].'">'.$row['state'].'</option>';
                    }
                    ?>

                </select>
                <div class="invalid-feedback">
                  Wprowadź poprawnie województwo
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Kod Pocztowy</label>
                <input type="text" class="form-control" pattern="\d{2}-\d{3}" id="zip" name="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Wprowadź poprawnie kod pocztowy
                </div>
              </div>
            </div>
           
        
            <button class="btn btn-primary btn-lg btn-block" type="submit">Zarejestruj</button>
          </form>
        </div>
  

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</body>
<?php
    mysqli_close($conn);
?>
</html>



