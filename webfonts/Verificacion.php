<?php

try{
    
	 $con = mysqli_connect("localhost", "root", "root", "Siace_Final");

    // Check connection
    if (mysqli_connect_errno()) {
        throw new Exception("Failed to connect to MySQL: " . mysqli_connect_error());
    }

    $Usuario = mysqli_real_escape_string($con, $_POST["Usuario"]);
    $Pswd = mysqli_real_escape_string($con,$_POST["Contrasena"]);

    $consulta = mysqli_query($con, "SELECT Usuario, Contrasenia FROM `usuarios` WHERE Contrasenia='$Pswd'
    AND Usuario='$Usuario'");

    
    
      if ($consulta->num_rows >= 1) {
            session_start();
            $_SESSION['user'] = $Usuario;
            include_once 'validacion_session.php';
            $mensaje = "Acceso correcto Bienvenido, $Usuario!";
            
            echo "<!DOCTYPE html><script>window.open('../webfonts/admin.php', '_self');</script>";
            mysqli_close($con); 
            exit();
        } else {
            $mensaje = "Credenciales inválidas. Por favor, verifique su usuario y contraseña.";
            echo "<!DOCTYPE html><script>alert('$mensaje');window.open('../webfonts/login.php', '_self');</script>";
            mysqli_close($con);
            exit();
        }  
     
}catch (Exception $ex) {
    $mensaje =  "Algo Malio sal";
    echo "<!DOCTYPE html><script>alert('$mensaje');</script>";
}




?>