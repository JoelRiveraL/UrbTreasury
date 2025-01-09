<?php
include '../Forms/observer.php';

class ComentarioSubject implements Subject {
    private $observers = [];
    private $data;

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $this->observers = array_filter($this->observers, function($obs) use ($observer) {
            return $obs !== $observer;
        });
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this->data);
        }
    }

    public function setData($data) {
        $this->data = $data;
        $this->notify();
    }
}