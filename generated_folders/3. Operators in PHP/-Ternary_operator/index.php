<?php

// Example 1: Simple ternary operator
$a = 5;
$b = 10;

// Check if $a is greater than $b
echo ($a > $b) ? "$a is greater than $b\n" : "$a is not greater than $b\n";
// Output: a is not greater than b
echo ($a < $b) ? "$b is greater than $a\n" : "$b is not greater than $a\n";
// Example 2: Using ternary operator with different data types
$age = 20;

// Check if age is greater than or equal to 18 (adult or minor)
echo ($age >= 18) ? "Adult\n" : "Minor\n";

// Output: Adult

// Example 3: Nested ternary operator
$score = 85;

// Check the score and print the result
echo ($score >= 90) ? "A" : (($score >= 80) ? "B" : "C");
// Output: B
echo "\n";
// Example 4: Ternary with an array
$fruit = "apple";

// Check if the fruit is "apple"
echo ($fruit == "apple") ? "It's an apple\n" : "It's not an apple\n";
// Output: It's an apple

// Example 5: Ternary operator with a function
function check_number($num) {
    return ($num % 2 == 0) ? "Even" : "Odd";
}
$a = 4;
$b = 7;
echo "$a is " . check_number($a); // Output: Even
echo "\n";
echo "$b is " . check_number($b); // Output: Odd
