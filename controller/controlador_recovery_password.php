<?php
// Cargar autoload de Composer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Iniciar PHPMailer
$mail = new PHPMailer(true);

if (isset($_POST['correu'])) {
    $correu = $_POST['correu']; // Obtener el correo del formulario

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();                                // Usar SMTP
        $mail->Host = 'smtp.gmail.com';                // Servidor SMTP de Gmail
        $mail->SMTPAuth = true;                        // Activar autenticación SMTP
        $mail->Username = 'x.gallego@sapalomera.cat';  // Correo remitente
        $mail->Password = 'fpcp ybyi xtve hdtm';      // Contraseña segura (de aplicación)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encriptación STARTTLS
        $mail->Port = 587;                             // Puerto SMTP

        // Configuración del correo
        $mail->setFrom('x.gallego@sapalomera.cat', 'Tu Nombre');
        $mail->addAddress($correu, 'Nombre del Destinatario'); // Receptor

        // Contenido del correo
        $mail->isHTML(true);                           // Formato HTML
        $mail->Subject = 'Prueba de correo PHPMailer';
        $mail->Body    = 'Este es un correo de prueba enviado desde PHPMailer. ¡Funciona!';

        // Enviar el correo
        $mail->send();
        echo 'El correo ha sido enviado exitosamente.';
    } catch (Exception $e) {
        echo "Error al enviar el correo. Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'No se ha proporcionado un correo.';
}
