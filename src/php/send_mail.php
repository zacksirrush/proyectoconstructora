<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $secretKey = '6LclwVsqAAAAAOvpZPVSXNAVUEofPt5yzmpwy1DL';  // Tu clave secreta de reCaptcha
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Verificar reCaptcha
    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}");
    $captchaSuccess = json_decode($verify);

    if ($captchaSuccess->success) {
        // Datos del formulario
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $ccEmail = isset($_POST['ccemail']) ? true : false;

        // Configuración de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor de correo
            $mail->isSMTP();
            $mail->Host = 'mail.lagion.com.mx';
            $mail->SMTPAuth = true;
            $mail->Username = 'pruebas@lagion.com.mx';
            $mail->Password = 'ARNHXtrDihP4i9i';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Remitente y destinatarios
            $mail->setFrom('pruebas@lagion.com.mx', 'Baser Infraestructura');
            $mail->addAddress('pruebas@lagion.com.mx', 'Destinatario');

            // CC si el usuario quiere una copia
            if ($ccEmail) {
                $mail->addCC($email);
            }

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Mensaje desde sitio Web';
            $mail->Body = "<h2>Nuevo mensaje desde formulario de contacto</h2>
                           <p><strong>Nombre:</strong> {$name}</p>
                           <p><strong>Email:</strong> {$email}</p>
                           <p><strong>Mensaje:</strong> {$message}</p>";

            // Enviar correo
            $mail->send();
            $response['status'] = 'success';
            $response['message'] = 'El mensaje ha sido enviado con éxito.';
        } catch (Exception $e) {
            $response['status'] = 'error';
            $response['message'] = "Error al enviar el mensaje: {$mail->ErrorInfo}";
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = "reCaptcha falló. Por favor, intenta de nuevo.";
    }
} else {
    $response['status'] = 'error';
    $response['message'] = "Método de solicitud no válido.";
}

echo json_encode($response); // Devuelve la respuesta como JSON

?>