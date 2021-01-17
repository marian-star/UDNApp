<?php
if(isset($_POST['id'])){
    main($_POST['id'],$_POST['valornuevo']);
}else{
    echo json_encode(array(
        "error"=>"Undefined"
    ));
}

function main($id,$valornuevo) {
   
    actualizarHorarios($id,$valornuevo);
}

function actualizarHorarios($id,$valornuevo){
    require 'conf.php';

   $query ="UPDATE horarios SET turno='$valornuevo' WHERE horarios.idhorarios ='$id'";
   $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

 //   if(mysqli_num_rows($result)==1){
  //      ""
   // }
print_r($result);
//Objeto JSON => Java Script Object Notation
   // $vendedores = array(); //Arreglo asociativo
}

?>