<?php
interface Animal{
public function makeSound();
}

class Dog implements Animal{
public function makeSound(){
echo "Dog is barking <br>";
}
}

class Cat implements Animal{
public function makeSound(){
echo "Cat meow";
}
}

$Dog=new Dog();
$Dog->makeSound();
$Cat=new Cat();
$Cat->makeSound();
