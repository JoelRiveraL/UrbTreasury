<?php
require_once 'Notification.php';
require 'vendor/autoload.php'; // Carga la librería PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailNotification implements Notification {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true); 
        try {
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'tuemail@gmail.com';
            $this->mail->Password = 'secret';
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port = 587;
            $this->mail->setFrom('tuemail@gmail.com', 'Tu Nombre');
        } catch (Exception $e) {
            echo "Error en configuración: {$this->mail->ErrorInfo}";
        }
    }

    public function send($message) {
        try {
            $this->mail->addAddress('destinatario@example.com', 'Nombre Destinatario');

            $this->mail->isHTML(true);
            $this->mail->Subject = 'Notificación Importante';
            $this->mail->Body    = $message;

            $this->mail->send();
            echo "Correo enviado correctamente.";
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$this->mail->ErrorInfo}";
        }
    }
}
