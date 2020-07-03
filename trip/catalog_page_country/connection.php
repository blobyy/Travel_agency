<?php 

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,'wycieczka');

if(! $conn)
{
    die('Could not connect: ' . mysqli_error());
}

?>