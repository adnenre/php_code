<?php
// PHP Arithmetic Operations Tutorial

// 1. Addition (+)
echo "1. Addition (+) \n";
$a = 5;
$b = 10;
$sum = $a + $b;
echo "  - The sum of $a and $b is: " . $sum . "\n\n"; // Output: 15

// 2. Subtraction (-)
echo "2.Substraction \n";
$a = 10;
$b = 5;
$difference = $a - $b;
echo "  - The difference between $a and $b is: " . $difference . "\n\n"; // Output: 5

// 3. Multiplication (*)
echo "3. Multiplication (*) \n";
$a = 4;
$b = 5;
$product = $a * $b;
echo "  - The product of $a and $b is: " . $product . "\n\n"; // Output: 20

// 4. Division (/)
echo "4. Divistion (*) \n";
$a = 20;
$b = 4;
$quotient = $a / $b;
echo "  - The quotient of $a divided by $b is: " . $quotient . "\n\n"; // Output: 5

// 5. Modulus (%)
echo "5. Modulus (%) \n";
$a = 15;
$b = 4;
$remainder = $a % $b;
echo "  - The remainder when $a is divided by $b is: " . $remainder . "\n\n"; // Output: 3

// 6. Exponentiation (**)
echo "6. Exponentiation (**) \n";
$a = 3;
$b = 2;
$power = $a ** $b;
echo "  - $a raised to the power of $b is: " . $power . "\n\n"; // Output: 9

// 7. Post-Increment (X++): Increase by 1
echo "7. Post-Increment (X++): Increase by 1 \n";
$c = 5;
echo "  - current value " . $c . "\n";
echo "  - use the value than increase: " . $c++ . "\n";
echo "  - After incrementing, c is: " . $c . "\n\n"; // Output: 6

// 8. Pre-Increment (++X): Increase by 1
echo "8. Pre-Increment (++X): Increase by 1 \n";
$c = 5;
echo "  - current value " . $c . "\n";
echo "  - Increase than use the value: " . ++$c . "\n";
echo "  - After incrementing, c is: " . $c . "\n\n"; // Output: 6

// 9. Post-Decrement (X--): Decrease by 1
echo "9. Post-Decrement (X--): Decrease by 1 \n";
$d = 5;
echo "  - current value " . $d . "\n";
echo "  - use the value than decrease: " . $d-- . "\n";
echo "  - After decrementing, d is: " . $d . "\n\n"; // Output: 4

// 10. Pre-Decrement (--X): Decrease by 1
echo "10. Pre-Decrement (--X): Decrease by 1 \n";
$d = 5;
echo "  - current value " . $d . "\n";
echo "  - decrease than use the value: " . --$d . "\n";
echo "  - After decrementing, d is: " . $d . "\n\n"; // Output: 4
// 11. Combining operations
echo "11. Combining operations \n";
$combined = ($a + $b) * $c - $d / $power;
echo "  - Result of combined operations is: " . $combined . "\n\n"; // Demonstrates combined operations
