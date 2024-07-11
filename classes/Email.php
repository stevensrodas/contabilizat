<?php

namespace Classes;

use Model\Usuario;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Email
{
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        $mail = new PHPMailer();
        $mail->SMTPDebug= 0;                                         // Pon en 1 para ver debug de si se ha enviado o no el correo
        $mail->isSMTP();                                          // Enviar con SMTP
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        
        $usuario = new Usuario();
        $usuario->sincronizar($_POST);

        $mail->setFrom('cuentas@contabilizat.com');
        $mail->addAddress($usuario->email);
        $mail->Subject = 'CONFIRMA TU CUENTA';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';

        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong>, Has creado tu cuenta en ContabilizaT, solo debes confirmarla en el siguiente enlace. </p>";

        $contenido .= "<p>Presiona aquí: <a href='". $_ENV['APP_URL'] ."/confirmar?token=" . $this->token . "'>Confirma Cuenta</a> </p>";

        $contenido .= "<p>Si tu no creaste esta cuenta, puedes ignorar este mensaje. </p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;

        //Enviar el email
        $mail->send();
    }

    public function enviarInstrucciones() {
        $mail = new PHPMailer();
        $mail->SMTPDebug= 0;                                         // Pon en 1 para ver debug de si se ha enviado o no el correo
        $mail->isSMTP();                                          // Enviar con SMTP
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        
        $usuario = new Usuario();
        $usuario->sincronizar($_POST);

        $mail->setFrom('cuentas@contabilizat.com');
        $mail->addAddress($usuario->email);
        $mail->Subject = 'REESTABLECE TU CONTRASEÑA';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';

        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong>, Parece que has olvidado tu contraseña, haz click en el siguiente enlace para recuperarla </p>";

        $contenido .= "<p>Presiona aquí: <a href='". $_ENV['APP_URL'] ."/reestablecer?token=" . $this->token . "'>Reestablecer Password</a> </p>";

        $contenido .= "<p>Si no hiciste el proceso de olvide mi clave, puedes ignorar este mensaje. </p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;

        //Enviar el email
        $mail->send();
    }

}
