<?php
class Fruit
{
    public $name;
    public $color;

    function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    protected function message()
    {
        echo "{$this->name} is of {$this->color} color <br>";
    }
}

class Apple extends Fruit
{
    public $taste;

    function intro($taste)
    {
        echo "{$this->name} is of {$taste} taste <br>";
        $this->message();
    }
}

$Apple = new Apple("Apple", "Red");
$Apple->intro("Sweet");
