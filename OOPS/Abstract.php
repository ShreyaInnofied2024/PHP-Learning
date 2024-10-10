<?php
abstract class Car                                    //Abstract Class
{
    public $name;
    abstract public function message();                //Abstract Method
}

class Audi extends Car                                 //Child Class
{
    public function message()
    {
        echo "This is an Audi <br>";
    }
}

class Suzuki extends Car                            //Child Class
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
