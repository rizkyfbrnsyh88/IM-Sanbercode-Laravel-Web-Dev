<?php
require_once('animal.php');

class Frog extends Animal{
    public $legs = 2;

    public function jump(){
        return "hop hop";
    }
}

?>