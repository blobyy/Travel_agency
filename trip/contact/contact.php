
<!DOCTYPE html>
<html lang="pl">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Shop">
  <meta name="author" content="Szymon/Piotr">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body style="padding-top: 90px;">

<?php
    require_once("../main_page/navigation.php");
  ?>
<div class="row">
<div class="col-mb-6 mx-auto">


    <h2 class="h1-responsive font-weight-bold text-center my-4">Kontakt</h2>

    <p class="text-center w-responsive mx-auto mb-5">Jeżeli masz jakieś pytania napisz do nas</p>

    <div class="row pb-5">


        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="sendmail.php" method="POST">

                <div class="row">

                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Twoje imie i nazwisko</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">Twój E-mail</label>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Temat</label>
                        </div>
                    </div>
                </div>

                <div class="row">


                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Twoja wiadomość</label>
                        </div>

                    </div>
                </div>

                <div class="g-recaptcha"  data-theme="dark" data-sitekey="6LdgG_sUAAAAALA4vBX5sDXV_UHWaT8BRmRrRIVX"></div>
                <div class="text-center text-md-left">

                    <button type="submit" class="btn btn-primary" >Wyślij</button>
                </div>
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



            <div class="status"></div>
        </div>

        <div class="col-md-3 text-center pb-3">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>Adres</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+ 01 234 567 89</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>mail@kontaktowy.com</p>
                </li>
            </ul>
        </div>


    </div>

</div>
</div>


<footer class="py-4 bg-dark fixed-bottom ">
    <div class="container">
      <p class="m-0 text-center text-white">Szymon/Piotr</p>
    </div>
  
  </footer>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</body>

</html>