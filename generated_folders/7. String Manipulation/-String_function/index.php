<?php

// Example 1: String Concatenation
echo "1. String Concatenation:\n";
// Concatenating strings using the dot (.) operator
$firstName = "John";
$lastName = "Doe";
$fullName = $firstName . " " . $lastName;

echo "Full Name: " . $fullName . "\n";
echo "\n";

// Example 2: String Interpolation
echo "2. String Interpolation:\n";
// Using double quotes to directly include variables in strings
$age = 25;
echo "My name is $fullName and I am $age years old.\n";

// Using curly braces to prevent ambiguity in complex variables
echo "The first name is {$firstName} and the last name is {$lastName}.\n";
echo "\n";

// Example 3: `strlen` - Get the Length of a String
echo "3. Using strlen:\n";
$string = "Hello, World!";
$length = strlen($string);

echo "The length of '$string' is: $length\n";
echo "\n";

// Example 4: `str_replace` - Replace Substrings
echo "4. Using str_replace:\n";
$originalString = "I love PHP!";
$modifiedString = str_replace("PHP", "coding", $originalString);

echo "Original String: $originalString\n";
echo "Modified String: $modifiedString\n";
echo "\n";

// Example 5: `strtoupper` - Convert to Uppercase
echo "5. Using strtoupper:\n";
$lowercaseString = "hello, world!";
$uppercaseString = strtoupper($lowercaseString);

echo "Original String: $lowercaseString\n";
echo "Uppercase String: $uppercaseString\n";
echo "\n";

// Example 6: `strtolower` - Convert to Lowercase
echo "6. Using strtolower:\n";
$uppercaseString = "HELLO, WORLD!";
$lowercaseString = strtolower($uppercaseString);

echo "Original String: $uppercaseString\n";
echo "Lowercase String: $lowercaseString\n";
echo "\n";

// Example 7: `substr` - Extract a Substring
echo "7. Using substr:\n";
$text = "The quick brown fox";
$substring = substr($text, 4, 5);  // Extracts "quick" starting from index 4 with length 5

echo "Original String: $text\n";
echo "Extracted Substring: $substring\n";
echo "\n";

// Example 8: Other Useful String Functions
echo "8. Other String Functions:\n";

// `strpos` - Find position of the first occurrence of a substring
$position = strpos($text, "brown");
echo "Position of 'brown' in '$text': $position\n";

// `ucfirst` - Capitalize the first letter
$capitalized = ucfirst("hello");
echo "Capitalized: $capitalized\n";

// `ucwords` - Capitalize the first letter of each word
$capitalizedWords = ucwords("hello world");
echo "Capitalized Words: $capitalizedWords\n";

// `trim` - Remove whitespace from the beginning and end of a string
$whitespaceString = "  Hello World!  ";
$trimmedString = trim($whitespaceString);
echo "Trimmed String: '$trimmedString'\n";
