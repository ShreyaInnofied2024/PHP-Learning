<?php
abstract class Car
{
    public $name;
    abstract public function message();
}

class Audi extends Car
{
    public function message()
    {
        echo "This is an Audi <br>";
    }
}

class Suzuki extends Car
{
    public function message()
    {
        echo "This is a Suzuki <br>";
    }
}

$audi = new Audi();
$audi->message();
$suzuki = new Suzuki();
$suzuki->message();
