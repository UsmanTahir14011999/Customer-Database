<?php
$server = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($server, $username, $password);

if($conn)
{
    //echo "Connection OK";
}
else
{
    die ("connection to this database failed due to" . mysqli_connect_error());
}
?>
