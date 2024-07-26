<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configuración para hMailServer (ejemplo para un servidor local)
     $mail->isSMTP();
    $mail->Host = '192.168.100.48';
    $mail->Username = 'Administrator';
    $mail->Password = 'Solacyt123';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 143;

    // Configuración adicional para hMailServer
    $mail->SMTPDebug = 2; // Activa el modo depuración para obtener más información (puedes ajustar según tus necesidades)
    $mail->SMTPSecure = ''; // Deja esto vacío para deshabilitar la seguridad TLS/SSL
    $mail->SMTPAuth = false; // Deshabilita la autenticación si no es necesaria

    // Detalles del mensaje
    $mail->setFrom('Elprimero@prueba.com', 'El Patron');
    $mail->addAddress('yasertabares00@gmail.com', 'Yaser Tabares');
    $mail->Subject = 'Prueba';
    $mail->Body = 'Hola';

    $mail->send();
    echo 'Correo enviado correctamente';
} catch (Exception $e) {
    echo 'Error al enviar el correo: ', $mail->ErrorInfo;
}
?>
