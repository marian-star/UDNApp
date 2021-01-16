<?php

$host="localhost";
$user="root";
$password="Jorge01";
$database="udndb2";
$port="3307";

$connect = mysqli_connect($host, $user, $password)or die (mysqli_error());
mysqli_select_db($connect, $database);

date_default_timezone_set('America/Mexico_City');



?>