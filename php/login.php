<?php
    session_start();
     require_once('conf.php');

    if(isset($_POST['login']))
    {
        if(empty($_POST['UserName']) || empty($_POST['password']) )
        {
            header("location: ../index.php?empty");
            exit();
        }
        else
        {
            $UserName = mysqli_real_escape_string($connect,$_POST['UserName']);
            $Password = sha1(mysqli_real_escape_string($connect,$_POST['password']));

            $query = "SELECT * FROM usuarios where email='" . $UserName . "'AND Password='" . $Password . "'";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

            if($row=mysqli_fetch_assoc($result))
            {
                #$HashPass = password_verify($Password,$row['Password']);
                $Password=$row['password'];
                console.log($row['email']);
                console.log($Password);
               

                if($Password==false)
                {
                    header("location: ../index.php?P_Invalid");
                    exit();
                }
                elseif($Password==true)
                {
                    $_SESSION['U_D']=$row['id'];
                    #$_SESSION['FName']=$row['FName'];
                    #$_SESSION['LName']=$row['LName'];
                    $_SESSION['Email']=$row['email'];
                    #$_SESSION['UserName']=$row['UserName'];
                    $_SESSION['Password']=$row['password'];

                    header("location: ../main.php");
                    exit();
                }
            }
            else
            {
                header("location: ../index.php?U_Invalid");
                exit();
            }   
        }

    }
    else
    {
        header("location: ../index.php");
        exit();
    }
?>