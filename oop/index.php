<?php
require_once('animal.php');
require_once('Frog.php');
require_once('Ape.php');

$sheep = new Animal("shaun");

echo "Name : " . $sheep->name . "<br>"; // "shaun"
echo "Legs : " .$sheep->legs . "<br>"; // 4
echo "Cold Blooded : " .$sheep->cold_blooded . "<br><br>"; // "no"

// NB: Boleh juga menggunakan method get (get_name(), get_legs(), get_cold_blooded())

$katak = new Frog("buduk");

echo "Name : " . $katak->name . "<br>"; // "shaun"
echo "Legs : " .$katak->legs . "<br>"; // 4
echo "Cold Blooded : " .$katak->cold_blooded . "<br>"; // "no"
echo "Jump : " .$katak->jump(). "<br><br>";

$kera = new Ape("kera sakti");

echo "Name : " . $kera->name . "<br>"; // "shaun"
echo "Legs : " .$kera->legs . "<br>"; // 4
echo "Cold Blooded : " .$kera->cold_blooded . "<br>"; // "no"
echo "Yell : " .$kera->yell(). "<br><br>";

?>