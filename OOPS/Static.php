<?php
class areaCircle
{
    public static $pi = 3.14159;
    public static function CalculateArea($radius)
    {
        return self::$pi * $radius * $radius;
    }
}

echo areaCircle::CalculateArea(10);
