<?php

// Higher-order function that accepts a function as an argument
function applyFunction($callback, $value) {
    return $callback($value); // Calls the passed function with the given value
}

// Example of a function to pass in
$double = function ($number) {
    return $number * 2;
};

// Applying the function through the higher-order function
echo applyFunction($double, 5);  // Output: 10
echo "\n";
echo applyFunction($double, 100);  // Output: 200
echo "\n";

// Higher-order function that returns another function

function multiplier($factor) {
    return function ($number) use ($factor) {
        return $number * $factor;
    };
}

// using the heigher order function 
$multiplyByTwo = multiplier(2);
$multiplyByFive = multiplier(5);

echo "5 * 2 = " . $multiplyByTwo(5);
echo "\n";
echo "10 * 5 = " . $multiplyByFive(10);
echo "\n";

// 1. Map Example: Transform each element in the array
// Function to double the number
$double = function ($number) {
    return $number * 2;
};

// Using array_map (higher-order function)
$numbers = [1, 2, 3, 4, 5];
$doubledNumbers = array_map($double, $numbers);

echo "Map Example - Doubled Numbers:\n";
print_r($doubledNumbers);  // Output: [2, 4, 6, 8, 10]
echo "\n";

// 2. Filter Example: Filter elements based on a condition
// Function to check if a number is even
$isEven = function ($number) {
    return $number % 2 == 0;
};

// Using array_filter (higher-order function)
$evenNumbers = array_filter($numbers, $isEven);

echo "Filter Example - Even Numbers:\n";
print_r($evenNumbers);  // Output: [2, 4]
echo "\n";

// 3. Reduce Example: Aggregate elements into a single result
// Function to sum two numbers
$sum = function ($carry, $number) {
    return $carry + $number;
};

// Using array_reduce (higher-order function)
$total = array_reduce($numbers, $sum, 0);  // Starting from 0

echo "Reduce Example - Total Sum of Numbers:\n";
echo $total;  // Output: 15
echo "\n";

// 4. Chaining Functions Example: map, filter, and reduce together
// Function to square a number
$square = function ($number) {
    return $number * $number;
};

// Function to check if a number is odd
$isOdd = function ($number) {
    return $number % 2 != 0;
};

// Using map, filter, and reduce together
$result = array_reduce(
    array_filter(
        array_map($square, $numbers),  // Square each number
        $isOdd                         // Filter out even squares
    ),
    function ($carry, $number) {
        return $carry + $number;
    },  // Sum the odd squared numbers
    0  // Initial value
);

echo "Chaining Functions Example - Sum of Odd Squared Numbers:\n";
echo $result;  // Output: 165 (1 + 9 + 25 + 49 + 81)
echo "\n";


function increment(&$number) {
    $number++;
    echo "Inside function: $number\n";  // Output will be 2
}

$counter = 1;
increment($counter);
increment($counter);
increment($counter);
increment($counter);
echo $counter;
