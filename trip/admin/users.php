<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Shop">
    <meta name="author" content="Szymon/Piotr">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>
<?php require_once("../main_page/navigation.php");
require_once("connection.php");
?>
<body style="padding-top: 70px;">

<?php
$sql = "SELECT * FROM users WHERE Permission = 2 or 1;";
$result = mysqli_query($conn, $sql);

?>

<div class="col-12-md">


    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Id</th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Kontakt</th>
                <th>Sprzedawca</th>
                <th>Zarządzaj</th>

            </tr>
            </thead>
            <tbody>

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["Permission"] == 1) {
                    $sprzedawca = "Nie";
                } else {
                    $sprzedawca = "Tak";
                }
                echo '<tr>    
                        <td>' . $row["ID_User"] . ' </td>
                       <td>' . $row["First_Name"] . '</td>
                       <td>' . $row["Last_Name"] . '</td>
                       <td>' . $row["Email"] . '</td>
                       <td>' . $sprzedawca . '</td>
                       
                         <td><div class="row">
                             <form class="col-6-xs" method="post" action="user_delete.php">
                                <input type="number" name="id" hidden value="' . $row["ID_User"] . '">
                                <button name="delete" type="submit"  class="btn btn-info">Usun</button>
                             </form>
                             <form class="col-6-xs" method="post" action="users_edit.php">
                             <button name="edition" type="submit" class="btn btn-info" >Edycja</button>
                              </form>
                             </div>
                        </td>
                         </tr>
    ';
            }
            ?>


            </tbody>
        </table>
    </div>

</div>


<footer class="pt-5">
    <?php require_once("admin_nav.php") ?>
</footer>


</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>

</html>

