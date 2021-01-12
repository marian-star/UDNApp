<?php
require 'php/conf.php';

if (isset($_POST['username'])) {

    $uname = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT * FROM usuarios where email='" . $uname . "'AND Password='" . $password . "'";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    if (mysqli_num_rows($result)) {
        echo "You have succesfully logged in";
        exit();
    } else {
        echo "You Have Entered Incorrect Password";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Aplicacion UDN</title>
        <link rel="stylesheet" a href="css\style.css">
        <link rel="stylesheet" a href="css\font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <img src="image/Login.jpg"/>
            <form method="POST" action="#">
                <div class="form-input">
                    <input type="text" name="username" placeholder="Enter the User Name"/>	
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="password"/>
                </div>
                <input type="submit" type="submit" value="LOGIN" class="btn-login"/>
            </form>
        </div>
    </body>
</html>