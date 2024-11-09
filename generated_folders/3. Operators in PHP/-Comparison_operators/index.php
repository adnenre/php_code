<?php
// Comparison Operators in PHP

echo "== : Checks if values are equal, ignoring type. \n";
echo "=== : Checks if values are identical, considering type. \n";
echo "!= or <> : Checks if values are not equal, ignoring type. \n";
echo "!== : Checks if values are not identical, considering type. \n";
echo "> : Checks if the left value is greater than the right. \n";
echo "< : Checks if the left value is less than the right. \n";
echo ">= : Checks if the left value is greater than or equal to the right. \n";
echo "<= : Checks if the left value is less than or equal to the right. \n";
echo "<=> : The 'spaceship' operator. Returns -1 if the left value is less, 0 if they are equal, and 1 if the left value is greater. \n";

echo "\n\n";

// 1. Equal (==)
$a = 5;
$b = "5";

echo "Equal $a == '$b': ";

echo $a == $b ? 'true' : 'false'; // Outputs: true, because values are equal regardless of type
// with var_dump you will get bool(true)
echo "\n";

// 2. Identical (===)
echo "Identical $a === '$b': ";
echo $a === $b ? 'true' : 'false'; // Outputs: false, because types are different
echo "\n";
// 3. Not Equal (!=)
echo "Not Equal $a !='$b': ";
echo $a != $b ? 'true' : 'false';  // Outputs: false, because values are equal
echo "\n";
// 4. Not Identical (!==)
echo "Not Identical $a !== '$b' :";
echo $a !== $b ? 'true' : 'false';  // Outputs: true, because types are different
echo "\n";
// 5. Greater Than (>)
$a = 10;
$b = 21;
echo "Greater Than $a > $b: ";
echo $a > $b ? 'true' : 'false';  // Outputs: true, because 10 is greater than 5
echo "\n";
// 6. Less Than (<)
echo "Less Than $a < $b: ";
echo $a < $b ? 'true' : 'false';  // Outputs: false, because 10 is not less than 5
echo "\n";
// 7. Greater Than or Equal To (>=)
echo "Greater Than or Equal To $a >= $b: ";
echo $a >= $b ? 'true' : 'false';  // Outputs: true, because 10 is greater than 5
echo "\n";
// 8. Less Than or Equal To (<=)
echo "Less Than or Equal To $a <= $b : ";
echo $a <= $b ? 'true' : 'false';  // Outputs: false, because 10 is not less than or equal to 5
echo "\n";
// 9. Spaceship Operator (<=>) - PHP 7+
$a = 5;
$b = 10;
echo "Spaceship $a <=> $b : ";
echo $a <=> $b;  // Outputs: -1 (because $a is less than $b
echo "\n";


$a = 10;
$b = 10;
echo "Spaceship $a <=> $b : "; // Outputs: 0 (because $a is equal to $b
echo $a <=> $b;
echo "\n";
$a = 15;
$b = 10;
echo "Spaceship $a <=> $b : ";
echo $a <=> $b . "\n"; // Outputs: 1 (because $a is greater than $b
