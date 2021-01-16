<?php
require 'conf.php';//Ruta relativa para la conexión

$query="SELECT * FROM carreras";//Hacemos consulta

$result= mysqli_query($connect, $query) or die (mysqli_error($connect));//Guardamos resultado de la consulta

//print_r($result);

//Objeto JSON => Java Script Object Notation
$vendedores=array();//Arreglo asociativo
$i=0;
if(mysqli_num_rows($result)){
    while ($row = mysqli_fetch_array($result)) {
        $vendedores[$i]=array(
            'idcarreras'  =>  $row['idcarreras'],
            'nombres'     =>  $row['nombres'],
            'duracion'    =>  $row['duracion'],
           /* 'EDAD'      =>  $row['EDAD'],
            'TITULO'    =>  $row['TITULO'],
            'CONTRATO'  =>  $row['CONTRATO'],
            'CUOTA'     =>  $row['CUOTA'],
            'VENTAS'    =>  $row['VENTAS']*/
        );
        $i++;
    }
}else{
    $vendedores[$i]=array(
        'ERROR' => mysqli_error($connect)
    );
}
echo json_encode($vendedores);
?>