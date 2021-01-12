<?php

$host="localhost";
$user="root";
$password="";
$database="udndb";
$port="3306";

$connect = mysqli_connect($host, $user, $password)or die (mysqli_error());
mysqli_select_db($connect, $database);

date_default_timezone_set('America/Mexico_City');



?>