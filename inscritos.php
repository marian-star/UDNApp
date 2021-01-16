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
                            <input name="credencial" type="text" class="form-control" id="credencial" placeholder="Numero Credencial..." required="">
                          </fieldset>
                        </div>
       
                            <div class="col-md-12">
                          <select name="category" id="category">
                              <option value="categories" id="grupo" selected>Seleccione el grupo...</option>
                               
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
                            <option value="categories" id="materia" selected>Seleccione Materia...</option>
                            
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
                            <option value="categories" id="turno" selected>Turno...</option>
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
                    
                    if(isset($_POST["nombre"])){
    $credencial = $_POST["credencial"] ;
    $grupo = $_POST["grupo"] ;
    $materia = $_POST["materia"] ;
    $turno = $_POST["turno"] ;
    

 $instruccion_SQL = "INSERT INTO inscritos (idalumnos, idturno, idgrupo, idmateria)
                             VALUES ('$credencial','$credencial', '$materia', '$turno')";
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
                    
                        <section class="forms">
                         <div class="container-fluid">
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
              </div>
            </section>
                      
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