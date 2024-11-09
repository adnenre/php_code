<?php

// Define a custom error handler function
function customErrorLogger($errno, $errstr, $errfile, $errline) {
    // Format the error message
    $errorMessage = "[" . date("Y-m-d H:i:s") . "] ";
    $errorMessage .= "Error Level: $errno | Message: $errstr | File: $errfile | Line: $errline" . PHP_EOL;

    // Log the error to a file
    file_put_contents("error_log.txt", $errorMessage, FILE_APPEND);

    // Display a generic message to the user (optional)
    echo "An error has occurred. Please try again later.";

    // Return true to prevent PHP’s default error handler from executing
    return true;
}

// Set the custom error handler
set_error_handler("customErrorLogger");

// Trigger errors for demonstration
echo $undefinedVar;      // Triggers a notice
$result = 10 / 0;        // Triggers a warning

// Restore the default PHP error handler
restore_error_handler();

echo "Script execution continues.";
