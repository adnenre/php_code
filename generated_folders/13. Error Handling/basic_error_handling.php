<?php

function divide($numerator, $denominator) {
    if ($denominator === 0) {
        // Throw an exception if division by zero is attempted
        throw new Exception("Cannot divide by zero!");
    }
    return $numerator / $denominator;
}

try {
    // Trying to divide two numbers
    $result = divide(10, 0);  // This will cause an exception
    echo "Result: " . $result;
} catch (Exception $e) {
    // Catching the exception and handling it
    echo "Error: " . $e->getMessage();
} finally {
    // Code in the `finally` block will run whether or not an exception was thrown
    echo "\nOperation complete.";
}
