<!DOCTYPE html>
<html lang="pl">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Shop">
  <meta name="author" content="Szymon/Moczulski">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="basket.css" rel="stylesheet">
</head>
<?php
require_once("../main_page/navigation.php")
?>
<body class="text-center" style="padding-top:40px;">


   <div class="row pt-4 bg-light">
        <div class="col-md-9 mx-auto">
       <h1 class="text-info">Koszyk</h1>
            <div class="row mx-auto pb-4">

<?php
require_once('../product_page/connection.php'); //con with database

$wholeCost = 0; //cost of all products

if(isset($_POST['clearSessionBasket'])) //kasowanie zawartosci jesli uzytkownik zazyczyl sobie tego
{
    $_SESSION['basket'] = array();
}

if(isset($_POST['idDel'])) //kasowanie pojedynczego produktu
{
    unset($_SESSION['basket'][$_POST['idDel']]);
}
if(isset($_POST['idAdd']))
{
        $_SESSION['basket'][$_POST['idAdd']]['quantity'] +=1;
        unset($_POST['idAdd']);
}


if(isset($_POST['idDec']))
{

    if($_SESSION['basket'][$_POST['idDec']]['quantity'] == 0)
        {
             echo "<script type='text/javascript'>
                $(document).ready(function(){
                $('#0ElemOfProduct').modal('show');
                });
                </script>";
        }
    else{
        $_SESSION['basket'][$_POST['idDec']]['quantity'] -=1;
    }
    unset($_POST['idDec']);
}


if(isset($_SESSION['basket']))
{
    foreach($_SESSION['basket'] as $item)
    {
        $sql = 'SELECT * FROM product WHERE id_product = '.$item['id_product'].' LIMIT 1';
        $position = array_search($item,$_SESSION['basket']);
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        echo '
                <div class="card  col-md-3 mx-auto" >
                    <img class="card-img img-thumbnail" src="'.$row['image'].'" alt="">
                    <div class="card-body">
                        <h4 class="card-title" name="title">'.$row['name_of_product'].'</h4>
                         <label >'.$item['quantity'].' szt '.($row['cost'] * $item['quantity']).' PLN</label>
                         
                         <form method="post" action="">
                         <input type="number" hidden name="idAdd" value="'.$position.'">
                            <button type="submit" class="btn btn-info form-control" btn-sm>+</button>
                         </form>
                         <form method="post" action="">
                          <input type="number" hidden name="idDec" value="'.$position.'">
                            <button  type="submit" class="btn btn-info form-control " btn-sm>-</button>
                         </form>
                         <form method="post" action="">
                             <input type="number" hidden name="idDel" value="'.$position.'">
                            <button type="submit" class=" btn btn-sm btn-info form-control">usuń</button>
                         </form>
                     </div>    
                 </div>
';
        $wholeCost += $row['cost'] * $item['quantity'];
    }

}
else{

}


?>

            </div>
            </div> <!--card columns -->
       </div>


    <div class="row  pt-1 bg-info">
       <form class="form-signin" action="../order_page/order_page.php" method="post" >
           <?php if($wholeCost<=0)
           {
               echo '<button class="btn btn-lg btn-primary btn-block" disabled type="submit">Pusto </button>';
           }
           else{
               echo '<button class="btn btn-lg btn-primary btn-block" type="submit">Zapłać  '.$wholeCost.' PLN </button>';
           }
           ?>
           <input type="number" name="totalPrice"  hidden value="<?php echo $wholeCost ?>">
           </form>
       <form class="form-signin" action="" method="post">
           <?php if($wholeCost<=0)
           {
               echo '<button class="btn btn-lg btn-primary btn-block" disabled type="submit" name="clearSessionBasket">Wyzeruj koszyk</button>';
           }
           else{
               echo '<button class="btn btn-lg btn-primary btn-block" type="submit" name="clearSessionBasket">Wyzeruj koszyk</button>';
           }
           ?>

       </form>
   </div>





   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>




<!-- Nie mniej niż 0 -->
<div class="modal fade" id="0ElemOfProduct" tabindex="-1" role="dialog" aria-labelledby="Modal0Item"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Błąd</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Nie możesz wziąć mniej niż 0
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>
