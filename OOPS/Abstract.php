<?php
abstract class Car
{
    public $name;
    abstract function message();
}

class Audi extends Car
{
    function message()
    {
        echo "This is an Audi <br>";
    }
}

class Suzuki extends Car
{
    function message()
    {
        echo "This is a Suzuki <br>";
    }
}

$Audi = new Audi();
$Audi->message();
$Suzuki = new Suzuki();
$Suzuki->message();
