<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM `Eventos`;";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$evento=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Registro a un evento</title>
</head>


<body>

    <div class="container w-70  mt-5">
        <div class="row align-items-stretch backgrouddiv ">
                            
            <!-- Div de imagen -->

            <div class="col bg d-none d-lg-block col-md-3 col-lg-3 col-xl-6">
            </div>
            <div class="col">
                <p id="resultUser"></p>
 
                <div class="text-end">

                </div>

                <h1 class="fw-bold text-center  text-black">Bienvenido</h1>
                <!-- Aqui va la verificacion -->
                <h4 class="text-center py-3 text-black">Hola! gracias
                    por usar nuestra plataforma para registro a algún evento por favor
                    llena tus datos 
                </h4>
                <p class="text-center py-3 text-black fw-bold text-decoration-underline">
                    Al completar este formulario, confirmas tu participación 
                    y te aseguras de recibir 
                    información relevante y actualizaciones sobre el evento.</p>
                <form action="CrearUsuario.php" method="POST">
                    
                    <div class="form-group text-center">
                        
                    </div>
                    <!-- FormControl de Nombre -->
                    
                    <div class="form-floating mx-sm-4 mb-3 " >
                        <input id="nombre" type="text" maxlength="45" required name="nombre" class="form-control " placeholder="Nombre">
                        <label for="text nombre" class="form-label text-black">Nombre:</label>

                    </div> 
                    <div class="form-floating mx-sm-4 mb-3 " >
                        <input id="apellidoPaterno" type="text" maxlength="45" required name="apellidop" class="form-control " placeholder="Nombre">
                        <label for="text apellidoPaterno" class="form-label text-black">Apellido Paterno:</label>

                    </div> 
                    <div class="form-floating mx-sm-4 mb-3 " >
                        <input id="apellidoMaterno" type="text" maxlength="45" required name="apellidom" class="form-control " placeholder="Nombre">
                        <label for="text apellidoMaterno" class="form-label text-black">Apellido Materno:</label>

                    </div> 
                    <p id="resultEmail" class="form-floating mx-sm-4 mb-3 "></p>
                    <!-- FormControl de email -->
                    <div class="form-floating mx-sm-4 mb-3 ">
                        <input type="email" id="EmailId"  maxlength="45" required name="email" class="form-control " placeholder="Email">
                        <label for="email" class="form-label text-black">Email:</label>

                    </div> 
                    <!-- ComboBox -->
                    <div class="btn-group mx-sm-4 mb-3 ">
            
                     
                        <select class="form-select dropdown-toggle" id="evento" name="evento">
                        <option selected>Eventos:</option>

                        <?php
                        foreach($evento as $eventos){
                        ?>
                        <option value=" <?php echo $eventos['idEventos']?>"> <?php  echo $eventos['nombre'] ?> </option>        
                                            <?php
                        }
                        ?>
                        </select>


                    </div>
  
                    <!-- Boton de Ingresar -->
                    <div class="form-group mx-sm-4 pt-3 pb-5">
                        <input type="submit" class="btn d-grid gap-2 col-12 mx-auto ingresar" value="Registrarse">
                    </div>
            </form>

            </div>
        </div>
    </div>
<!-- Scripts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://kit.fontawesome.com/f90d3bf50d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../webfonts/scripts/checknamesSngup.js"></script>
    <script src="../webfonts/scripts/checkEmail.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../js/script.js "></script>
    <script src="../js/cliente.js"></script>

</body>
</html>