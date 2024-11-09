<?php


echo "* AND (&&): Both conditions must be true for the block to execute.\n";
echo " * OR (||): At least one condition must be true for the block to execute.\n";
echo " * NOT (!): Negates the condition (if true becomes false, and if false becomes true).\n";
echo " * XOR (xor): Exactly one of the conditions must be true.\n";
// AND (&&)
$a = true;
$b = true;

if ($a && $b) {
    echo "Both conditions are true!\n"; // Output: Both conditions are true!
}

// OR (||)
$a = true;
$b = false;

if ($a || $b) {
    echo "At least one condition is true!\n"; // Output: At least one condition is true!
}

// NOT (!)
$a = false;

if (!$a) {
    echo "The condition is false!\n"; // Output: The condition is false!
}

// XOR (xor)
$a = true;
$b = false;

if ($a xor $b) {
    echo "Exactly one condition is true!\n"; // Output: Exactly one condition is true!
}

// Example: Using AND (&&)
$a = 5;
$b = 10;
$c = 15;

if ($a < $b && $b < $c) {
    echo "Both conditions are true!\n"; // Output: Both conditions are true!
}

// Example: Using OR (||)
if ($a > $b || $b < $c) {
    echo "At least one condition is true!\n"; // Output: At least one condition is true!
}

// Example: Using XOR (xor)
if ($a > $b xor $b < $c) {
    echo "Exactly one condition is true!\n"; // Output: Exactly one condition is true!
}

// Example: Using NOT (!)
if (!$a) {
    echo "Condition is false!\n"; // Output: Condition is false!
} else {
    echo "Condition is true!\n"; // Output: Condition is true!
}
