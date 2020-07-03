<!DOCTYPE html>
<html lang="pl">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Shop">
  <meta name="author" content="Szymon/Piotr">

  <!--Recaptcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
<?php
require_once("../main_page/navigation.php");


?>

    <form id="formlogin" class="form-signin" action="<?php echo htmlspecialchars("login_process.php") ?>" method="post">
        <div class="text-danger"><?php if(isset($_GET["error"])) {if( $_GET["error"]==1 ) echo 'Błędny login lub hasło'; if($_GET["error"]==2 ) echo "Nie aktywowane konto";} ?></div>
      <h1 class="h3 mb-3 font-weight-normal">Zaloguj się</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="inputEmail" name="Email" class="form-control" placeholder="Email address" autofocus="" value="<?php if(isset($_COOKIE["login"])) echo $_COOKIE["login"]; ?>">
      <label for="inputPassword" class="sr-only">Haslo</label>
      <input type="password" id="inputPassword" name="Password" class="form-control" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) echo $_COOKIE["password"]; ?>">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="remember" <?php if(isset($_COOKIE["login"])) { ?> checked <?php } ?>> Zapamiętaj
        </label>
      </div>

        <div class="g-recaptcha"  data-theme="dark" data-sitekey="6LdgG_sUAAAAALA4vBX5sDXV_UHWaT8BRmRrRIVX"></div>
        <button class="btn btn-lg btn-primary btn-block g-recaptcha"  name="loginUser"  type="submit">Zaloguj</button>
        <button class="btn btn-md btn-secondary btn-block" formaction="../registration/registration.php" >Rejestracja</button>

    </form>

<script>
    const forms = document.querySelectorAll('div.g-recaptcha');
    forms.forEach(form=> {
        const formParentElement = form.parentElement;

        formParentElement.addEventListener("submit", e => {
            if (grecaptcha.getResponse() === '') {
                e.preventDefault();
                alert('Zaznacz reCAPTCHA');
            }
        }, false)
    });
</script>



<div at-magnifier-wrapper=""><div class="at-theme-dark"><div class="at-base notranslate" translate="no"></div></div></div></body>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</body>

</html>
