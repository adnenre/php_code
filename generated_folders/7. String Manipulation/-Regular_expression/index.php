<?php

// Regular Expressions in PHP - Demonstration and Explanation

// Example 1: `preg_match` - Checking if a Pattern Matches
echo "1. Checking if a Pattern Matches with `preg_match`:\n";

// Simple pattern to check if a string contains "PHP" (case-insensitive)
$pattern = "/PHP/i";  // `i` makes it case-insensitive
$string = "I love php and regex!";

if (preg_match($pattern, $string)) {
    echo "The string '$string' contains 'PHP'.\n";
} else {
    echo "The string '$string' does not contain 'PHP'.\n";
}
echo "\n";

// Example 2: `preg_match_all` - Finding All Matches
echo "2. Finding All Matches with `preg_match_all`:\n";

// Pattern to find all words that start with "p" or "P"
$pattern = "/\b[pP]\w+/";  // `\b` marks a word boundary, `\w+` matches one or more word characters
$string = "PHP is powerful and practical.";

preg_match_all($pattern, $string, $matches);
echo "Words that start with 'p' or 'P':\n";
print_r($matches[0]);
echo "\n";

// Example 3: `preg_replace` - Replacing Patterns
echo "3. Replacing Patterns with `preg_replace`:\n";

// Pattern to find numbers and replace them with "[number]"
$pattern = "/\d+/";  // `\d+` matches one or more digits
$string = "There are 15 apples and 30 bananas.";
$replacement = "[number]";

$result = preg_replace($pattern, $replacement, $string);
echo "Original String: $string\n";
echo "Modified String: $result\n";
echo "\n";

// Example 4: Email Validation with Regular Expressions
echo "4. Validating an Email Address:\n";

// Pattern to validate email addresses
$emailPattern = "/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,6}$/";
$email = "user@example.com";

if (preg_match($emailPattern, $email)) {
    echo "The email '$email' is valid.\n";
} else {
    echo "The email '$email' is invalid.\n";
}
echo "\n";

// Example 5: Extracting Parts of a String (e.g., hashtags)
echo "5. Extracting Hashtags from a String:\n";

// Pattern to find hashtags (words that start with #)
$pattern = "/#(\w+)/";
$string = "Loving the #sunshine and #beach vibes!";

preg_match_all($pattern, $string, $matches);
echo "Hashtags found:\n";
print_r($matches[1]);  // `$matches[1]` contains the hashtags without the #
echo "\n";

// Example 6: Using Quantifiers in Regular Expressions
echo "6. Using Quantifiers:\n";

// Pattern to match a string with exactly 3 digits
$pattern = "/\b\d{3}\b/";  // `\d{3}` matches exactly 3 digits, `\b` ensures it's a whole word
$string = "The code is 123 and the PIN is 4567.";

preg_match_all($pattern, $string, $matches);
echo "Three-digit numbers found:\n";
print_r($matches[0]);
echo "\n";

// Example 7: Pattern Modifiers
echo "7. Pattern Modifiers:\n";

// Pattern with `i` modifier for case-insensitive search, `m` for multiline
$pattern = "/^hello/i";  // Matches 'hello' at the start of any line
$string = "Hello world!\nhello universe!";

preg_match_all($pattern, $string, $matches);
echo "Case-insensitive matches at line start:\n";
print_r($matches[0]);
echo "\n";

// Example 8: Splitting a String with `preg_split`
echo "8. Splitting a String with `preg_split`:\n";

// Pattern to split on any non-word character
$pattern = "/\W+/";  // `\W+` matches one or more non-word characters
$string = "Split this, string. Into different: words!";

$splitArray = preg_split($pattern, $string);
echo "Split Result:\n";
print_r($splitArray);
echo "\n";

// Explanation of Common Regex Patterns
echo "Explanation of Common Regex Patterns:\n";
echo "- `\d` : Matches any digit (0-9)\n";
echo "- `\w` : Matches any word character (a-z, A-Z, 0-9, _)\n";
echo "- `\s` : Matches any whitespace character (space, tab, newline)\n";
echo "- `\b` : Matches a word boundary\n";
echo "- `.` : Matches any single character except newline\n";
echo "- `^` : Matches the start of a string\n";
echo "- `$` : Matches the end of a string\n";
echo "- `+` : Matches one or more of the preceding character\n";
echo "- `*` : Matches zero or more of the preceding character\n";
echo "- `{n,m}` : Matches between `n` and `m` occurrences of the preceding character\n";
echo "\n";
