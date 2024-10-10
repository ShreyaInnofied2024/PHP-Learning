<?php
class Area_Circle
{
    public static $pi = 3.14159;
    public static function CalculateArea($radius)
    {
        return self::$pi * $radius * $radius;
    }
}

echo Area_Circle::CalculateArea(10);
