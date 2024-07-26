<?php
try {
    $con = mysqli_connect("localhost", "root", "root", "Siace_Final");

    // Check connection
    if (mysqli_connect_errno()) {
        throw new Exception("Failed to connect to MySQL: " . mysqli_connect_error());
    }

    if (isset($_POST['nombre'], $_POST['apellidop'], $_POST["apellidom"], $_POST["email"], $_POST["evento"])) {
        if (!is_valid_email($_POST['email'])) {
            $mensaje = "Email inválido";
            echo "<script>alert('$mensaje'); window.location.href = '../webfonts/signup.html';</script>";
        } elseif ($_POST['Contrasena'] != $_POST['confirmContrasena']) {
            $mensaje = "Las contraseñas no coinciden";
            echo "<script>alert('$mensaje'); window.location.href = '../webfonts/signup.html';</script>";
        } else {
            $nombre = mysqli_real_escape_string($con, $_POST["nombre"]);
            $apellidop = mysqli_real_escape_string($con, $_POST["apellidop"]);
            $apellidom = mysqli_real_escape_string($con,$_POST["apellidom"]);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $evento = mysqli_real_escape_string($con, $_POST['evento']);


            $CollecUser = mysqli_query($con, "SELECT * FROM usuarios WHERE Usuario = '$Usuario'");
            $collecemail = mysqli_query($con, "SELECT * FROM usuarios WHERE email = '$email'");

            if ($CollecUser->num_rows >= 1) {
                $UserNoDisponible = "Nombre de usuario no disponible";
                echo "<script>alert('$UserNoDisponible'); window.location.href = '../webfonts/signup.html';</script>";
            } elseif ($collecemail->num_rows >= 1) {
                $emailRepetido = "El email ya está registrado";
                echo "<script>alert('$emailRepetido'); window.location.href = '../webfonts/signup.html';</script>";
            } else {
                include "../webfonts/php/mail.php";
                if ($enviado === true) {
                     
                    $result = mysqli_query($con, "INSERT INTO `Participantes`( `nombres`, `apellidoPaterno`, `apellidoMaterno`, `email`, `evento`) 
                    VALUES ('$nombre','$apellidop','$apellidom','$email',$evento)");
                    if ($result) {
                        header("location: ../webfonts/graciasporregistrarte.php");
                        
                    } else {
                        $error = "Hubo un error, inténtelo más tarde";
                        echo "<script>alert('$error'); window.location.href = '../webfonts/signup.html';</script>";
                    }
                } else {
                    echo("Hubo un error al enviar el email");
                }
            }
        }
    } else {
        echo("Hay un error en los datos del formulario");
    }

    mysqli_close($con);
} catch (Exception $ex) {
    $mensaje = "Algo salió mal: $ex";
    echo "<script>alert('$mensaje');</script>";
}

function generateRandomCode($length = 32) {
    return bin2hex(random_bytes($length / 2));
}

function is_valid_email($str) {
    $result = (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
  
    if ($result) {
        list($user, $domain) = explode('@', $str);
        $result = checkdnsrr($domain, 'MX');
    }
  
    return $result;
}
?>
