<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/graciasporregistrarte.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://kit.fontawesome.com/f90d3bf50d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>SIACE</title>
</head>
<body class="container">
<div class="contenedor-formulario contenedor">
<div class="imagen-formulario">
            
            </div>
            <form action="../webfonts/php/confirmacion.php" method="POST">
            <div class="texto-formulario">
                <h2 class="fw-bolder">Te haz registrado a un evento!</h2>
                <p>Gracias por registrarte en un evento en nuestro sitio web.</p>
                <p>Aqui puedes ver tu registro</p>
            </div>
            <!-- boton de ingresar -->
            <div class="form-group mx-sm-4 pt-3">
            <a href="signup.php" class="btn btn-lg btn-light">Quieres agregar a otro?
                     <i class="bi bi-arrow-right-circle"></i></a>                   
            </div>
            <div class="form-group mx-sm-4 pt-3 pb-5">
            <a href="participantes.php" class="btn btn-lg btn-light">Continuar
                     <i class="bi bi-arrow-right-circle"></i></a> 
            </div>
</form>
    </div>
</body>
</html>