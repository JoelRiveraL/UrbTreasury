<?php
class AdminObserver implements Observer {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function update($data) {
        echo "<article>";
        echo "<p>Tiene una notificación de: " . $data["usuario"] . ", Nombre:  " . $data["nombre"] . "</p><br>";
        echo "</article>";
        echo "<hr>";
    }
}