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
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Ramayana - HTML5 Template</title>

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

  </head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

      <!-- Main -->
        <div id="main">
          <div class="inner">

            <!-- Header -->
            <header id="header">
              <div class="logo">
                <a href="index.html">Inscritos</a>
              </div>
            </header>
          

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
                          <!-- 
                          $consulta_mysql='select * carreras';
$result=mysqli_query($connect,$sql);
  
echo "<select name='select1'>";
while($fila=mysql_fetch_array($resultado_consulta_mysql)){
    echo "<option value='".$fila['nombre']."'>".$fila['nombre']."</option>";
}
echo "</select>";
                          -->
                        <div class="col-md-12">
                          <select name="category" id="category">
                            <option value="categories" selected>Seleccione el grupo</option>
<?php
// Realizamos la consulta para extraer los datos
          $sql="SELECT * FROM carreras";
          while ($valores = mysqli_fetch_array($sql)) {
// En esta sección estamos llenando el select con datos extraidos de una base de datos.
            echo '<option value="'.$valores[id].'">'.$valores[idgrupos].'</option>';
          }
        ?>
                          </select>
                        </div>
                          <div class="col-md-12">
                          <select name="category" id="category">
                            <option value="categories" selected>Materia</option>

                          </select>
<div class="col-md-12">
                          <select name="category" id="category">
                            <option value="categories" selected>Turno</option>
                          </select>
                        </div>
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

      <?php require_once('sidebar.php'); ?>

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