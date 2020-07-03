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
  
      <div class="col-md bg-light pb-4">
        <h4 class="text-black text-center">Edytuj użytkownika</h4>
        <ul class="list-group">
            <li class="list-group-item list-group-item-info">
               <h3>Imie</h3>
               <input type="string" ></input>
               <h3>Nazwisko</h3>
               <input type="string" ></input>
            </li>
            <li class="list-group-item">
                <h4>
                Email
                </h4>
                 <input type="string" ></input>
            </li>
            <li class="list-group-item">
                 <h4> 
                     Inne dane
                 </h4>
                
                 <input type="string" ></input>
             </li>

                 

          </li>
          <li class="list-group-item">
            <h4>  Uwagi </h4>
            <input type="text" class="form-control" aria-label="Text input with checkbox">
          </li>
              
        </ul>
        <button type="button" class="btn btn-info btn-block" >Potwierdź</button>
        <button type="button" class="btn btn-info btn-block" >Usuń go</button>
      </div>
    

</div>
</div>
<footer class="pt-5">
<?php require_once("admin_nav.php")?>
</footer>









</body>