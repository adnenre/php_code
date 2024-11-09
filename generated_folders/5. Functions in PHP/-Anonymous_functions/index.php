<?php

// Anonymous function

$greeting = function ($str) {
    echo "Hello, $str!";
};
echo $greeting('this is an anonymous function  asigned to a variable');
echo PHP_EOL;
// Anonymous function with array_map 

$numbers = [1, 2, 3, 4, 5];

$squareNumbers = array_map(function ($number) {
    return $number * $number;
}, $numbers);

// convert array to string
echo implode(', ', $squareNumbers);

// Function that returns an anonymous function
function makeMultiplier($multiplier) {
    return function ($number) use ($multiplier) {
        return $number * $multiplier;
    };
}
// In PHP, the 'use' keyword is used to import variables from the lexical scope (the outer scope) into an anonymous function (closure). This allows the anonymous function to access and use variables that are defined outside of it.
// Lexical scope refers to the scope in which a variable is defined, the environment that the variable is created in.
// In the example above, the $multiplier variable is defined in the outer function makeMultiplier(), and it's outside the anonymous function.

$multiplyBy3 = makeMultiplier(3);
echo $multiplyBy3(5);  // Output: 15
