<?php
require_once 'Notification.php';
require 'vendor/autoload.php';

use Twilio\Rest\Client;

class SMSNotification implements Notification {
    private $sid;
    private $token;
    private $twilioNumber;

    public function __construct() {
        $this->sid = 'TU_SID_DE_TWILIO';
        $this->token = 'TU_TOKEN_DE_TWILIO';
        $this->twilioNumber = 'TU_NUMERO_DE_TWILIO';
    }

    public function send($message) {
        $client = new Client($this->sid, $this->token);

        $client->messages->create(
            $numeroDestino,
            [
                'from' => $this->twilioNumber,
                'body' => $message
            ]
        );

        echo "Mensaje enviado correctamente a $numeroDestino.";
    }
}
