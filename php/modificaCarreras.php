<?php
if(isset($_POST['id'])){
    main($_POST['id'],$_POST['valornuevoNombre'],$_POST['valornuevoDuracion']);
}else{
    echo json_encode(array(
        "error"=>"Undefined"
    ));
}

function main($id,$valornuevoNombre,$valornuevoDuracion) {
   
    actualizarHorarios($id,$valornuevoNombre,$valornuevoDuracion);
}

function actualizarHorarios($id,$valornuevoNombre,$valornuevoDuracion){
    require 'conf.php';

   $query ="UPDATE carreras SET nombres='$valornuevoNombre',duracion = '$valornuevoDuracion' WHERE carreras.idcarreras ='$id'";
 
   $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

 //   if(mysqli_num_rows($result)==1){
  //      ""
   // }
print_r($result);
//Objeto JSON => Java Script Object Notation
   // $vendedores = array(); //Arreglo asociativo
}

?>