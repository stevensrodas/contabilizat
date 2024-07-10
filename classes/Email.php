<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

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
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('cuentas@kardex.com');
        $mail->addAddress('cuentas@kardex.com', 'kardex.com');
        $mail->Subject = 'confirma tu cuenta';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';

        $contenido .= "<p> <strong>" . $this->nombre . "</strong> Has creado tu cuenta en Kardex, solo debes confirmarla en el siguiente enlace. </p>";

        $contenido .= "<p>Presiona aquí: <a href='". $_ENV['APP_URL'] ."/confirmar?token=" . $this->token . "'>Confirma Cuenta</a> </p>";

        $contenido .= "<p>Si tu no creaste esta cuenta, puedes ignorar este mensaje. </p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;

        //Enviar el email
        $mail->send();
    }

    public function enviarInstrucciones() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('cuentas@kardex.com');
        $mail->addAddress('cuentas@kardex.com', 'kardex.com');
        $mail->Subject = 'Reestablece tu password';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';

        $contenido .= "<p> <strong>" . $this->nombre . "</strong> Parece que has olvidado tu password, sigue el siguiente enlace para recuperarlo </p>";

        $contenido .= "<p>Presiona aquí: <a href='". $_ENV['APP_URL'] ."/reestablecer?token=" . $this->token . "'>Reestablecer Password</a> </p>";

        $contenido .= "<p>Si tu no creaste esta cuenta, puedes ignorar este mensaje. </p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;

        //Enviar el email
        $mail->send();
    }

}
