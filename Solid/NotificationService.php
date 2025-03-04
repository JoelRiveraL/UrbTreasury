<?php
class NotificationService {
    private $notification;

    public function __construct(Notification $notification) {
        $this->notification = $notification;
    }

    public function notify($message) {
        $this->notification->send($message);
    }
}

