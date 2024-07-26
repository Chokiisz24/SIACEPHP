<?php

if( isset($_GET['email']) ){
	$id_decodificado_url = urldecode($_GET['email']);
    $id_decodificado_base64 = base64_decode($id_decodificado_url);
}else{
	header("location: ../webfonts/login.php");
}  
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/verificacioncorreo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://kit.fontawesome.com/f90d3bf50d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Verifica tu correo</title>
</head>
<body class="container">

<div class="contenedor-formulario contenedor">
        <div class="imagen-formulario">
            
        </div>

        <form action="../webfonts/php/confirmacion.php" method="POST">
            <div class="texto-formulario">
                <h2 class="fw-bolder">Ingrese el codigo de verificacion</h2>
                <p>Gracias por registrarte en nuestro sitio web. Para completar el proceso de verificación.</p>
                <p>Por favor ingresa el código enviado a tu email.</p>
            </div>
            <div class="form-floating mb-3">
            <input type="number" required name="Codigo_de_verificacion" class="form-control"  placeholder="Codigo de verificación">
            <label for="text-floatingInput" class="form-label text-black">Código de verificación</label>
            
            <input type="email" hidden required name="email_de_verificacion" class="form-control"  value ="<?php echo $id_decodificado_base64 ?>">
            </div>
            <!-- boton de ingresar -->
            <div class="form-group mx-sm-4 pt-3 pb-5">
                <input type="submit" class="btn d-grid gap-2 col-12 mx-auto" value="Continuar">
            </div>

        </form>
    </div>


</body>
</html>