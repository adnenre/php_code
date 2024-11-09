<?php

// Example 1: Indexed Array
echo "1. Indexed Array:\n";
// An indexed array uses numeric indexes starting from 0
$indexedArray = [10, 20, 30, 40, 50];

foreach ($indexedArray as $index => $value) {
    echo "Index $index: $value\n";
}
echo "\n";

// Example 2: Associative Array
echo "2. Associative Array:\n";
// An associative array uses named keys instead of numeric indexes
$associativeArray = [
    "name" => "Alice",
    "age" => 30,
    "city" => "New York"
];

foreach ($associativeArray as $key => $value) {
    echo "Key '$key': $value\n";
}
echo "\n";

// Example 3: Multidimensional Array
echo "3. Multidimensional Array:\n";
// A multidimensional array is an array of arrays, allowing for complex data structures
$multidimensionalArray = [
    ["name" => "Alice", "age" => 30, "city" => "New York"],
    ["name" => "Bob", "age" => 25, "city" => "Los Angeles"],
    ["name" => "Charlie", "age" => 35, "city" => "Chicago"]
];

foreach ($multidimensionalArray as $person) {
    echo "Name: " . $person["name"] . ", Age: " . $person["age"] . ", City: " . $person["city"] . "\n";
}
echo "\n";

// Example 4: Accessing Specific Elements in a Multidimensional Array
echo "4. Accessing Specific Elements in a Multidimensional Array:\n";
// Accessing specific elements in a multidimensional array by using indexes or keys
echo "First person's name: " . $multidimensionalArray[0]["name"] . "\n";
echo "Second person's city: " . $multidimensionalArray[1]["city"] . "\n";
echo "\n";

// Example 5: Nested Loops to Iterate Over a Multidimensional Array
echo "5. Nested Loops for Multidimensional Array:\n";
// Using nested loops to iterate over a multidimensional array with indexed and associative elements
$complexArray = [
    "fruits" => ["apple", "banana", "orange"],
    "vegetables" => ["carrot", "lettuce", "pepper"],
    "grains" => ["rice", "quinoa", "oats"]
];

foreach ($complexArray as $category => $items) {
    echo ucfirst($category) . ": ";
    foreach ($items as $item) {
        echo "$item ";
    }
    echo "\n";
}
echo "\n";
