<?php
class Fruit                            //Class
{
    public $name;
    public $color;

    public function __construct($name, $color)      //Constructor
    {
        $this->name = $name;
        $this->color = $color;
    }

    protected function message()                      //Protected function
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
        $this->message();                              //Protected function is inherited by child class
    }
}

$apple = new Apple("Apple", "Red");
$apple->intro("Sweet");
