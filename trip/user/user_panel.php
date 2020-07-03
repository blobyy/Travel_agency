<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Shop">
    <meta name="author" content="Szymon/Piotr">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>
<?php require_once("../main_page/navigation.php") ?>
<body class="pt-5">

<div class="col-12-md pt-5">

    <div class="table-responsive pt-3">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th style="width:10%">Id zamówienia</th>

                <th>Status</th>
                <th style="width:10%">Kwota</th>
                <th>Nazwa wycieczki</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require_once ("../admin/connection.php");
            $id = $_SESSION["iduser"];

            $sql = "SELECT * FROM orders where ID_User =".$id;
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)) //wypisywanie zamowien
            {
                echo '<tr><td>' . $row["ID_Order"] . '</td>
                          <td>' . $row["Order_Status"] . ' </td>
                          <td>' . $row["Total_Price"] . ' </td>  ';

                $sql2 = "SELECT * FROM orders_products INNER JOIN product on orders_products.ID_Product = product.id_product where ID_Order =".$row["ID_Order"];
                $result2 = mysqli_query($conn, $sql2);
                while ($row2 = mysqli_fetch_assoc($result2))
                {
                    echo '<td>' . $row2["name_of_product"] . '</td></tr>
                           ';
                }
            }
            ?>
            </tbody>
        </table>
    </div>

</div>



<footer class="pt-5">

</footer>



</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>

