<?php
session_start();
if (!isset($_SESSION['Email'])){
    header("location: index.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>
<?php
                        require 'C:\xampp\htdocs\UDNApp\php\conf.php';//Ruta relativa para la conexión
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
                      <h2>Nuevo registro </h2>
                    </div>
                    <form id="contact" action="" method="post">
                      <div class="row">
                        <div class="col-md-6">
                          <fieldset>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Numero Credencial..." required="">
                          </fieldset>
                        </div>
       
                            <div class="col-md-12">
                          <select name="category" id="category">
                            <option value="categories" selected>Seleccione el grupo</option>
                               
    <?php 
    $query_planta = mysqli_query($connect,"SELECT idgrupos FROM grupos");
    $result_planta = mysqli_num_rows($query_planta);
            while ($planta = mysqli_fetch_array($query_planta)) {
                echo '<option value="'.$planta[id].'">'.$planta[idgrupos].'</option>';  
            }
     ?>
                          </select>
                        </div>
                          <div class="col-md-12">
                          <select name="category" id="category">
                            <option value="categories" selected>Seleccione Materia</option>
                            
 <?php 
    $query_planta = mysqli_query($connect,"SELECT nombre FROM materias");
    $result_planta = mysqli_num_rows($query_planta);
            while ($planta = mysqli_fetch_array($query_planta)) {
                echo '<option value="'.$planta[id].'">'.$planta[nombre].'</option>';  
            }
     ?>
                          </select>
                            </div>                              

                        <div class="col-md-12">
                          <select name="category" id="category">
                            <option value="categories" selected>Turno</option>
 <?php 
    $query_planta = mysqli_query($connect,"SELECT turno FROM horarios");
    $result_planta = mysqli_num_rows($query_planta);
            while ($planta = mysqli_fetch_array($query_planta)) {
                echo '<option value="'.$planta[id].'">'.$planta[turno].'</option>';  
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
                   //Insertar datos a la base de datos 

//$name = $_POST["nombre"] ;
/*$name= filter_input(INPUT_POST, "nombre");
$duracion= filter_input(INPUT_POST, "duracion");
//$duracion = $_POST["duracion"] ;


  $instruccion_SQL = "INSERT INTO carreras (nombres, duracion)
                             VALUES ('$name','$duracion')";
  //mysqli_set_charset $resulta = mysqli_query($connect,$instruccion_SQL);
  
  if (!$resulta){
     // echo 'Error al registrar datos';
        } else {
            echo 'Registro exitoso';
        } */
                 
      ?>              


                  
                
              </div>
            </section>
            
            
              
            <!-- Tables -->
            <section class="tables">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="section-heading">
                      <h2>Reporte</h2>
                    </div>
                    <div class="default-table">
                      <table>
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Duracion</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <?php
                              
			$sql="SELECT * FROM carreras"; // Se hace la consulta
			$result=mysqli_query($connect,$sql); // Se guarda el resultado en un result para mostrar

			while ($mostrar=mysqli_fetch_array($result)){

			?>
                             
                             <td><?php echo $mostrar['idcarreras']?></td>
                             <td><?php echo $mostrar['nombres'] ?></td>
                             <td><?php echo $mostrar['duracion'] ?></td>
                         </tr>
                         <?php
                    }
                    mysqli_close($connect)
                         ?>
                        </tbody>
                      </table>
                      <ul class="table-pagination">
                        <li><a href="#">Previous</a></li>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">8</a></li>
                        <li><a href="#">9</a></li>
                        <li><a href="#">Next</a></li>
                      </ul>
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


  </body>

</html>