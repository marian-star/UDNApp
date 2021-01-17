<?php
require 'php\validador.php';
session_start();
if (!isset($_SESSION['Email'])){
    header("location: index.php");
}
 ?>

<?php
                        require 'php\conf.php';//Ruta relativa para la conexión
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>UDNApp</title>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <!--Favicon-->
    
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
                <div class="row">
                  <div class="col-md-12">
                    <div class="section-heading">
                      <h2>Nuevo Registro Horario</h2>
                    </div>
                    <form id="contact" action="" method="post">
                      <div class="row">
                        <div class="col-md-6">
                          <fieldset>
                            <input name="turno" type="text" class="form-control" id="turno" onkeypress="return soloLetras(event)"  placeholder="Nuevo Horario..." required="required">
                          </fieldset>
                        </div>
                        <div class="col-md-12">
                          <button type="submit" id="form-submit" name="form-submit" class="button">Guardar</button>
                        </div>
                      </div>
                    </form>
                    <?php
                    
if(isset($_POST["turno"])){
    $turnos = $_POST["turno"] ;

    
 $instruccion_SQL = "INSERT INTO horarios (turno)
                             VALUES ('$turnos')";
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
                </div>
              </div>
            </section>
            
            
              
            <!-- Tables -->
            <section class="tables">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="section-heading">
                      <h2>Horarios</h2>
                    </div>
                    <div class="default-table">
                      <table>
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Horario</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <?php
                        require 'C:\xampp\htdocs\UDNApp\php\conf.php';//Ruta relativa para la conexión
			$sql="SELECT * FROM horarios"; // Se hace la consulta
			$result=mysqli_query($connect,$sql); // Se guarda el resultado en un result para mostrar

			while ($mostrar=mysqli_fetch_array($result)){

			?>
                             
                             <td><?php echo $mostrar['idhorarios']?></td>
                             <td id="td<?php echo $mostrar['idhorarios']?>"><?php echo $mostrar['turno'] ?></td>
                             <td><?php echo "<input type='button'  value='Editar' class='edit' edit='".$mostrar['idhorarios']."'>" ?></td>
                         </tr>
                         <?php
                    }
                         ?>
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
    <script type="text/javascript">
       $(function(){
           $('.edit').click(function (){
               
               if($(this).attr('value')=="Editar"){
        
               $(this).prop("value", "Guardar");
               
               var idTD=$(this).attr('edit');
               var contenido=$('#td'+idTD).text();
               $('#td'+idTD).empty();
               $('#td'+idTD).append('<input type="text" name="inputEdit" id="inputEdit" value="'+contenido+'">');
               var json={
                   id:idTD,
                   valornuevo:$('#inputEdit').val()
               };
              // $.post('modificaHorarios.php',json,function(resp){
                   
              // });
               console.log("#"+idTD);
           }else if($(this).attr('value')=="Guardar"){
               
           }
           });//Fin de funcion Click
       })//Fin Funcion anonima
    </script>
</body>


</html>