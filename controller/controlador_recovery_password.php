<?php
// Mostrar errores PHP (Desactivar en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir la librería PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;



// Inicio
$mail = new PHPMailer(true);

try {
    // Configuracion SMTP
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Muestra detalles del proceso SMTP (Desactivar en producción)
    $mail->isSMTP();                        // Activar envío SMTP
    $mail->Host = 'smtp.gmail.com';          // Servidor SMTP de Gmail (puedes cambiarlo por otro)
    $mail->SMTPAuth = true;                  // Activar autenticación SMTP
    $mail->Username = 'tu_correo@gmail.com'; // Usuario SMTP (tu correo de Gmail)
    $mail->Password = 'tu_contraseña_de_aplicacion'; // Contraseña de aplicación de Gmail (nunca la contraseña normal)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Activar encriptación STARTTLS
    $mail->Port = 587;                       // Puerto SMTP

    // Configurar el remitente
    $mail->setFrom('tu_correo@gmail.com', 'Tu Nombre'); // Correo y nombre del remitente

    // Destinatarios
    $mail->addAddress('destinatario@dominio.com', 'Nombre del destinatario'); // Dirección y nombre del destinatario

    // Contenido del correo
    $mail->isHTML(true);               // Activar HTML
    $mail->Subject = 'Asunto del correo'; // Asunto del correo
    $mail->Body    = 'Este es un <b>correo de prueba</b> enviado desde PHPMailer'; // Cuerpo en HTML
    $mail->AltBody = 'Este es un correo de prueba enviado desde PHPMailer'; // Cuerpo en texto plano (para clientes de correo sin soporte HTML)

    // Enviar el correo
    $mail->send();
    echo 'El mensaje se ha enviado correctamente.';
} catch (Exception $e) {
    // Capturar errores y mostrar mensaje
    echo "El mensaje no se ha enviado. Mailer Error: {$mail->ErrorInfo}";
}
