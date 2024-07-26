<?php
try {
    // Varios destinatarios

    $para = $email;

    // título
    $título = 'Código de Activación';

    $codigo = random_int(1000000, 9999999);

    // mensaje
    $mensaje = '
    <html>
    <head>
        <title>Código de Activación</title>
    </head>
    <body>
        <p>¡Código de activación de cuenta!</p>
        <p> <a href="http://localhost/Solacyt/webfonts/verificacioncorreo.php?email='. urlencode(base64_encode($para)). '"
            data-toggle="tooltip" class="button" title="Editar Contrasena">
            <i class="fas fa-key"></i> 
            Verificar cuenta</a>
        </p>
        <p> '. $codigo .'</p>
    </body>
    </html>
    ';

    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    /*
    // Cabeceras adicionales
    $cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
    $cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
    $cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
    $cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
    */
    // Enviar correo electrónico
    $enviado = false;

    if (mail($email, $título, $mensaje, $cabeceras)) {
        $enviado = true;
    } else {
        $error = error_get_last();
        echo "Error al enviar el correo: " . $error['message'];
    }
} catch (Exception $e) {
    echo($e);
}
?>
