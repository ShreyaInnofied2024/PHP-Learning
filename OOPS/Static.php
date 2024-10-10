<?php
class Area_Circle
{
    public static $pi = 3.14159;
    public static function CalculateArea($radius)
    {
        return self::$pi * $radius * $radius;      //static variable called within class
    }
}

echo Area_Circle::CalculateArea(10);              //static function called outside class
