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

    protected function message()
    {
        echo "{$this->name} is of {$this->color} color <br>";
    }
}

class Apple extends Fruit
{
    public $taste;

    public function intro($taste)
    {
        echo "{$this->name} is of {$taste} taste <br>";
        $this->message();
    }
}

$apple = new Apple("Apple", "Red");
$apple->intro("Sweet");
