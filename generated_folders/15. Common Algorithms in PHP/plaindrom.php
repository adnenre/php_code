<?php
// Function to check if a string is a palindrome using a loop with index calculation
function isPalindrome($str) {
    // convert to lowercase

    $str = strtolower($str);

    // Get the length of the string
    $length = strlen($str);

    // Loop to compare the characters
    for ($i = 0; $i < $length / 2; $i++) {
        // Compare the character at index i with the character at the mirrored index
        if ($str[$i] != $str[$length - 1 - $i]) {
            return false; // If any mismatch, return false
        }
    }

    // If loop completes, it's a palindrome
    return true;
}

$words = ["madam", "boy", "racecar", "level", "radar", 'civile', "civic", "refer", "deified", "rotor", "noon", "tenet"];
// Example usage
foreach ($words as $word) {
    if (isPalindrome($word)) {
        echo "'$word' is a palindrome.\n";
    } else {
        echo "'$word' is not a palindrome.\n";
    }
}
