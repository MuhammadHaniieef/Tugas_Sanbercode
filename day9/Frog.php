<?php
require_once 'Animal.php';

class Frog extends Animal {
    public function __construct($name) {
        parent::__construct($name);
        $this->legs = 4;
    }

    public function jump() {
        echo "Jump : Hop Hop<br>";
    }
}
?>
