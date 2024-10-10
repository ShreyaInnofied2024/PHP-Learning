<?php
class Fruit
{
    public $name;
    public $color;

    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function message()
    {
        echo "{$this->name} is of {$this->color} color <br>";
    }
}

class Apple extends Fruit
{
    public $taste = "Sweet";

    public function message()
    {
        echo "{$this->name} is of {$this->taste} taste and {$this->color} color <br>";
    }
}

$apple = new Fruit("Apple", "Red");
$apple->message();
