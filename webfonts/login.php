<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inicio de Sesion</title>
</head>


<body>

    <div class="container w-75  mt-5">
        <div class="row align-items-stretch backgrouddiv ">

            <div class="col">
                <div class="text-end">

                </div>
                <h2 class="fw-bold text-center py-3 text-black">¿Eres Administrador?</h2>
                <h3 class="fw-bold text-center  text-black">Ingresa tus datos</h3>
                <!-- Aqui va la verificacion -->
                <form action="Verificacion.php" method="POST">
                    <div class="form-group text-center pt-2">
                        
<!-- 
                            <div class="form-group text-center pt-3 mx-sm-4 pt-4 pb-3">
                                <label class="text-black" >¿No estas registrado?</label>
                                <a href="signup.html"><label class="textblue cursor">Hazlo aquí.</label></a>
                            </div> -->

                           
                    </div>
                    <p id="resultadoUser"></p>
                        <!-- FormControl de Users -->
                        <div class="form-floating mb-3">
                            
                            <input type="text" required name="Usuario" class="form-control" id="floatingInput" placeholder="Usuario">
                            <label for="text floatingInput" class="form-label text-black">Usuario:</label>
                        </div>

                        <!-- FormControl de Password -->
                        <div class="form-floating mb-3">
                            <p id="resultadoPswd"></p>
                            <input type="password" required name="Contrasena" class="form-control" id="passwordInput" placeholder="Contraseña">
                            <label for="password floatingInput" class="form-label text-black">Contraseña:</label>
                        </div>

                        <!-- Funcion de Mostrar Contraseña -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="showPassword">
                            <label class="form-check-label" for="showPassword">
                                Mostrar Contraseña
                            </label>
                        </div>

 
                    <div class="form-group mx-sm-4 pt-3 pb-5">
                        <input type="submit" class="btn d-grid gap-2 col-12 mx-auto ingresar" value="Continuar">
                    </div>
                </form> 

            </div>
                        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6">

            </div>
        </div>
    </div>

    <script>
        // Obtener referencias a los elementos del DOM
        const passwordInput = document.getElementById('passwordInput');
        const showPasswordCheckbox = document.getElementById('showPassword');
    
        // Agregar un evento de cambio al checkbox
        showPasswordCheckbox.addEventListener('change', function() {
            // Actualizar el tipo de entrada del campo de contraseña
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>
                         

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://kit.fontawesome.com/f90d3bf50d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../webfonts/scripts/checkname.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>