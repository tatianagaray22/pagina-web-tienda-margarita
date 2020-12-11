<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$Nombres = $_POST["nombre"];
$Correo = $_POST["correo"];
$Telefono = $_POST["telefono"];
$Mensaje = $_POST["mensaje"];

$Contenido = "Nombres: " . $Nombres . "<br>Correo: " . $Correo . "<br>Telefono: " . $Telefono . "<br>Mensaje: " . $Mensaje; 

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('juanito.david02@gmail.com', 'Agrokaizen');
    $mail->addAddress('juan.dv.castro02@gmail.com', '');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensaje de contactanos - Agrokaizen';
    $mail->Body    = $Contenido;

    $mail->send();
    echo 'El mensaje se envio';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header ("Location:index.html");
?>