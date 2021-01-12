<?php
session_start();
if (isset($_SESSION['Email'])){
    header("location: main.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Aplicacion UDN</title>
        <link rel="stylesheet" a href="css\style.css">
        <link rel="stylesheet" a href="css\font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <img src="image/Login.jpg"/>
            <form method="POST" action="php/login.php">
                <div class="form-input">
                    <input type="text" name="UserName" placeholder="Enter the User Name"/>	
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="password"/>
                </div>
                <?php
                    
                        if(isset($_GET['empty']))
                        {
                            $Message=$_GET['empty'];
                            $Message= " Introduce Usuario y Contraseña <P>";
                    ?>
                        <div class="alert alert-danger text-center"><?php echo $Message ?></div>                            
                    <?php                            
                        }
                    
                    ?>


                      <?php
                    
                        if(isset($_GET['U_Invalid']))
                        {
                            $Message=$_GET['U_Invalid'];
                            $Message= " La combinacion de usuario y contraseña es incorrecta <P>";
                    ?>
                        <div class="alert alert-danger text-center"><?php echo $Message ?></div>                            
                    <?php                            
                        }
                    
                    ?>


                        <?php
                    
                        if(isset($_GET['P_Invalid']))
                        {
                            $Message=$_GET['P_Invalid'];
                            $Message= " Contraseña incorrecta <P>";
                    ?>
                        <div class="alert alert-danger text-center"><?php echo $Message ?></div>                            
                    <?php                            
                        }
                    
                    ?>
                <input type="submit" type="submit" name="login" value="LOGIN" class="btn-login"/>
            </form>
        </div>
    </body>
</html>