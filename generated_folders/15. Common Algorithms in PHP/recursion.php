<?php
// Function to calculate Fibonacci number using recursion
function fibonacci($n) {
    // Base case
    if ($n <= 1) {
        return $n;
    } else {
        // Recursive call
        return fibonacci($n - 1) + fibonacci($n - 2);
    }
}

// Example usage
$number = 10;  // Find the 10th Fibonacci number
echo "Fibonacci($number) = " . fibonacci($number);

echo PHP_EOL;
// Function to calculate factorial using recursion
function factorial($n) {
    // Base case
    if ($n == 0) {
        return 1;
    } else {
        // Recursive call
        return $n * factorial($n - 1);
    }
}

// Example usage
$number = 50;  // Find the factorial of 5
echo "Factorial($number) = " . factorial($number);
