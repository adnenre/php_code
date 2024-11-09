<?php

// Function to display the menu or options to the user
function showMenu() {
    echo "\n===== Command-Line Program =====\n";
    echo "1. Greet User\n";
    echo "2. Calculate Sum\n";
    echo "3. Exit\n";
    echo "Choose an option (1-3): ";
}

// Main program logic
$userInput = "";
while ($userInput != "3") {
    showMenu();  // Show the menu options

    // Read the user's choice
    $userInput = trim(fgets(STDIN));

    // Handle the user's input based on the choice
    switch ($userInput) {
        case "1":
            // Greet the user
            echo "Hello, welcome to the command-line program!\n";
            break;

        case "2":
            // Ask for two numbers and calculate the sum
            echo "Enter the first number: ";
            $num1 = trim(fgets(STDIN));
            echo "Enter the second number: ";
            $num2 = trim(fgets(STDIN));
            $sum = $num1 + $num2;
            echo "The sum is: $sum\n";
            break;

        case "3":
            // Exit the program
            echo "Exiting the program. Goodbye!\n";
            break;

        default:
            // Handle invalid choices
            echo "Invalid option, please choose between 1 and 3.\n";
    }
}
