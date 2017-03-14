<?php
// LIVE

if (App::environment() == 'local')
{
    $db_host = "62.210.246.56";
}
else
{
    $db_host = "localhost";
}
$db_username = "luckyleague";
$db_password = "QRDAf6TawwZ9DFy6";
$db_name = "luckyleague";

//conection: 
$mysqli = mysqli_connect($db_host,$db_username,$db_password,$db_name) 
or die("Error " . mysqli_error($mysqli));

mysqli_set_charset ( $mysqli , "utf8" );
