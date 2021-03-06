<?php
require 'php\validador.php';
session_start();
if (!isset($_SESSION['Email'])){
    header("location: index.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>
<?php
                        require 'php\conf.php';//Ruta relativa para la conexión
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Inscritos</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    

<!--
Ramayana CSS Template
https://templatemo.com/tm-529-ramayana
-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    
 <script src="https://kit.fontawesome.com/dde5a83a43.js" crossorigin="anonymous"></script>

 
  <!-- //Review newer versions -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="vendor/jquery/jquery.tabledit.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Favicon-->
   
   <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
   <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
   <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
   <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
   <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
   <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
   <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
   <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
   <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
   <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
   <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
   <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
   <link rel="manifest" href="favicon/manifest.json">
   <meta name="msapplication-TileColor" content="#ffffff">
   <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
   <meta name="theme-color" content="#ffffff">

  </head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

      <!-- Main -->
        <div id="main">
          <div class="inner">

            <!-- Header -->
             <?php
       require_once('header.php');
       ?>
          

            <!-- Forms -->
            <section class="forms">
              <div class="container-fluid">
                
                  
                    <div class="section-heading">
                      <h2>Nuevo Registro Inscritos</h2>
                    </div>
                    <form id="contact" action="" method="post">
                      <div class="row">
                        <div class="col-md-6">
                          <fieldset>
                              <input name="credencial" type="text" id="credencial" class="form-control" onkeypress="return valideKey(event);" id="credencial" placeholder="Numero Credencial..." required="">
                          </fieldset>
                        </div>
                               
                          
                            <div class="col-md-12">
                          <select name="grupo">
                              <option value="" disabled selected>Seleccione el grupo...</option>
                               
    <?php 
    $query_planta = mysqli_query($connect,"SELECT idgrupos FROM grupos");
    $result_planta = mysqli_num_rows($query_planta);
            while ($planta = mysqli_fetch_array($query_planta)) {
                echo '<option value="'.$planta[idgrupos].'">'.$planta[idgrupos].'</option>';  
            }
     ?>
                          </select>
                        </div>
                          <div class="col-md-12">
                          <select name="materia" id="category">
                            <option value="" disabled selected>Seleccione Materia...</option>
                            
 <?php 
    $query_planta = mysqli_query($connect,"SELECT idmaterias,nombre FROM materias");
    $result_planta = mysqli_num_rows($query_planta);
            while ($planta = mysqli_fetch_array($query_planta)) {
                echo '<option value="'.$planta[idmaterias].'_'.$planta[nombre].'">'.$planta[nombre].'</option>';  
            }
     ?>
                          </select>
                            </div>                              

                        <div class="col-md-12">
                          <select name="turno" id="category">
                            <option value="" disabled selected>Turno...</option>
 <?php 
    $query_planta = mysqli_query($connect,"SELECT idhorarios,turno FROM horarios");
    $result_planta = mysqli_num_rows($query_planta);
            while ($planta = mysqli_fetch_array($query_planta)) {
                echo '<option value="'.$planta[idhorarios].'_'.$planta[turno].'">'.$planta[turno].'</option>';  
            }
     ?>
                          </select>
                        </div>
                        
                        <div class="col-md-12">
                          <button type="submit" id="form-submit" class="button">Guardar</button>
                        </div>
                      </div>
                    </form>
                    <?php
                    
if(isset($_POST["credencial"])){
    $credencial = $_POST["credencial"] ;
    if(!empty($_POST['grupo'])) {
        $grupo = $_POST['grupo'];
    } else {
        //echo 'Please select the value.';
    }
    
     if(!empty($_POST['materia'])) {
         $materia = explode("_",$_POST['materia']);
         $materia_id = $materia[0];
         $materia_name = $materia[1];
    } else {
       // echo 'Please select the value.';
    }
       if(!empty($_POST['turno'])) {
         $turno = explode("_",$_POST['turno']);
         $turno_id = $turno[0];
         $turno_name = $turno[1];
    } else {
        //echo 'Please select the value.';
    }

 $instruccion_SQL = "INSERT INTO inscritos (idalumnos, idturno, idgrupo, idmateria)
                             VALUES ('$credencial','$turno_id','$grupo', '$materia_id' )";
  /*mysqli_set_charset*/ $resulta = mysqli_query($connect,$instruccion_SQL); 
 
  if (!$resulta){ 
 echo "
<script>
    $(function (){
     
       Swal.fire({
       icon: 'error',
       title: 'Oops...',
  text: 'Error  al  registrar los  datos!'
})
    });
 </script>
 ";
        } else {
echo "<script> $(function (){Swal.fire('Registro exitoso') });</script>";
        }


}        
     //header('Location': 'enviado.php');       
                 
      ?>              


                  
                
              </div>
            </section>
            
            
              
            <!-- Tables -->
            <section class="tables">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="section-heading">
                      <h2>Reporte por grupo</h2>
                    </div>
                    

                      <div class="col-md-12">
                          <button type="submit" id="selecciona_grupo" class="button">Cargar Lista</button>
                        </div>
                    <div class="default-table">
                      <table>
                        <thead>
                          <tr>
                      <th scope="col">#</th>
                      <th scope="col">credencial</th>
                      <th scope="col">turno</th>
                      <th scope="col">grupo</th>
                      <th scope="col">materia</th>
                      <th scope="col">Acción</th> 
                          </tr>
                        </thead>
                        
                <tbody id="mostrar">

                        </tbody>
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </section>

          </div>
        </div>

      <?php 
     if($_SESSION['Tipo']==1){
        require_once('sidebar_admin.php');
     }else if ($_SESSION['Tipo']==2){
         require_once('sidebar_prof.php');
     }else if ($_SESSION['Tipo']==3){
         require_once('sidebar_alumn.php');
     }
      ?>

    </div>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/transition.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/custom.js"></script>
</body>


<script type="text/javascript">
        $(function (){
            $('#selecciona_grupo').click(function (){//Funcion del botón
                //console.log("Mensaje a la consola ");
                var json={
                    'data':0
                };
                $.getJSON('general.php',json,function (resp){
                    $.each(resp,function(i){

                        $('#mostrar').append('<tr> \n\
                                                    <th scope="row">'+i+'</th>\n\
                                                    <td>'+resp[i].idalumnos+'</td>\n\
                                                    <td>'+resp[i].idturno+'</td>\n\
                                                    <td>'+resp[i].idgrupo+'</td>\n\
                                                    <td>'+resp[i].idmateria+'</td>\n\
                                                 <td><button class="btnedit" mauricio="'+resp[i].NUM_EMPL+'" ><i class="bi bi-pencil-square"></i>editar</button></td> \n\
                                                </tr>');
                    });
                });
            });
            
            
            $('.btnedit').click(function (){
                console.log("click");
            });
        });
    </script>

</html>