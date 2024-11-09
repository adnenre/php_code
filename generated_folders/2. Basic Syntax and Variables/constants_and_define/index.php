<?php

// CONSTANT
define('PI', 3.14);
define("APP_VERSION", '0.0.1');



// VARIABLE
$r1 = 10;
$r2 = 20;
function getCircleArea($radius)
{
    return PI * pow($radius, 2);
}



// return circle Area
echo "the area of a cirle with $r1 is " . getCircleArea($r1);
echo "\n";
echo "the area of a cirle with $r1 is " . getCircleArea($r2);
echo "\n";
echo "version : " . APP_VERSION;
