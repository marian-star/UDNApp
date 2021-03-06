
<?php
session_start();
if (!isset($_SESSION['Email'])){
    header("location: index.php");
}
 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>UDNApp - Profesores</title>

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
                      <h2>Forms</h2>
                    </div>
                    <form id="contact" action="" method="post">
                      <div class="row">
                        <div class="col-md-6">
                          <fieldset>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                          </fieldset>
                        </div>
                        <div class="col-md-6">
                          <fieldset>
                            <input name="email" type="text" class="form-control" id="email" placeholder="Your email..." required="">
                          </fieldset>
                        </div>
                        <div class="col-md-12">
                          <select name="category" id="category">
                            <option value="categories" selected>Select Category</option>
                            <option value="Featured">General</option>
                            <option value="Newest">Specific</option>
                            <option value="Low Price">Technical</option>
                            <option value="High Price">Application</option>
                          </select>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <div class="radio-item">
                            <input name="demo-small" type="checkbox" id="demo-priority-small" value="small">
                            <label for="demo-priority-small">Small</label>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <div class="radio-item">
                            <input name="demo-medium" type="checkbox" id="demo-priority-medium" value="medium">
                            <label for="demo-priority-medium">Medium</label>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <div class="radio-item">
                            <input name="demo-large" type="checkbox" id="demo-priority-large" value="large" >
                            <label for="demo-priority-large">Large</label>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <div class="circle-item">
                            <input name="demo-priority" type="radio" id="demo-small" value="16-20" checked>
                            <label for="demo-small">Age: 16 - 20</label>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <div class="circle-item">
                            <input name="demo-priority" type="radio" id="demo-medium" value="21-30">
                            <label for="demo-medium">Age: 21 - 30</label>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <div class="circle-item">
                            <input name="demo-priority" type="radio" id="demo-old" value="30+">
                            <label for="demo-old">Age: 30+</label>
                          </div>
                        </div>
                        <div class="col-12">
                          <textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
                        </div>
                        <div class="col-md-12">
                          <button type="submit" id="form-submit" class="button">Send Message</button>
                        </div>
                      </div>
                    </form>
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
                      <h2>Carreras</h2>
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
                        require 'C:\xampp\htdocs\UDNApp\php\conf.php';//Ruta relativa para la conexión
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