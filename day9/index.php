<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

// Sheep object
$sheep = new Animal('shaun');
echo "Name : " . $sheep->get_name() . "<br>";
echo "Legs : " . $sheep->get_legs() . "<br>";
echo "Cold blooded : " . $sheep->get_cold_blooded() . "<br><br>";

// Frog object
$kodok = new Frog("buduk");
echo "Name : " . $kodok->get_name() . "<br>";
echo "Legs : " . $kodok->get_legs() . "<br>";
echo "Cold blooded : " . $kodok->get_cold_blooded() . "<br>";
$kodok->jump();
echo "<br>";

// Ape object
$sungokong = new Ape("kera sakti");
echo "Name : " . $sungokong->get_name() . "<br>";
echo "Legs : " . $sungokong->get_legs() . "<br>";
echo "Cold blooded : " . $sungokong->get_cold_blooded() . "<br>";
$sungokong->yell();
?>
