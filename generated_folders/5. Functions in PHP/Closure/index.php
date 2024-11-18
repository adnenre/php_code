<?php

echo "Closure with 'use' keyword" . PHP_EOL;

echo "Syntax : \$sayHello = function (\$name) use (\$message) { return \$message , \$name!}" . PHP_EOL;
// Closure with use keyword
$message = "Hello";
$sayHello = function ($name) use ($message) {
    return "$message, $name!";
};
echo $sayHello("John");
