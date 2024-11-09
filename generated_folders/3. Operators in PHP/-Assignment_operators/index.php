<?php
// Assignment Operators in PHP

// 1. Basic Assignment
$x = 5; // Assigns 5 to $x
echo "-Basic Assignment: \$x = $x\n"; // Outputs 5

// 2. Addition Assignment (+=)
$x += 3; // Equivalent to $x = $x + 3
echo "-Addition Assignment: \$x += 3; \$x = $x\n"; // Outputs 8

// 3. Subtraction Assignment (-=)
$x -= 2; // Equivalent to $x = $x - 2
echo "-Subtraction Assignment: \$x -= 2; \$x = $x\n"; // Outputs 6

// 4. Multiplication Assignment (*=)
$x *= 4; // Equivalent to $x = $x * 4
echo "-Multiplication Assignment: \$x *= 4; \$x = $x\n"; // Outputs 24

// 5. Division Assignment (/=)
$x /= 6; // Equivalent to $x = $x / 6
echo "-Division Assignment: \$x /= 6; \$x = $x\n"; // Outputs 4

// 6. Modulus Assignment (%=)
$x %= 3; // Equivalent to $x = $x % 3
echo "-Modulus Assignment: \$x %= 3; \$x = $x\n"; // Outputs 1

// 7. Exponentiation Assignment (**=) - available in PHP 5.6+
$x = 2;
$x **= 3; // Equivalent to $x = $x ** 3 (2 raised to the power of 3)
echo "-Exponentiation Assignment: \$x **= 3; \$x = $x\n"; // Outputs 8

// 8. Concatenation Assignment (.=)
$txt = "Hello";
$txt .= " World!"; // Equivalent to $txt = $txt . " World!";
echo "-Concatenation Assignment: \$txt .= ' World!'; \$txt = $txt\n"; // Outputs "Hello World!"
