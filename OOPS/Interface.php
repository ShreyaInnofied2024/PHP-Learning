<?php
interface Animal                              //Interface
{
    public function make_sound();
}

class Dog implements Animal                   //Class implementing Interface
{
    public function make_sound()
    {
        echo "Dog is barking <br>";
    }
}

class Cat implements Animal                  //Class implementing Interface
{
    public function make_sound()
    {
        echo "Cat meow";
    }
}

$dog = new Dog();
$dog->make_sound();
$cat = new Cat();
$cat->make_sound();
