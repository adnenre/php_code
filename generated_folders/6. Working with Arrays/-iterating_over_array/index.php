<?php

// Example 1: Using `foreach` with a numerically indexed array
echo "1. Foreach with Indexed Array:\n";
$indexedArray = [1, 2, 3, 4, 5];

foreach ($indexedArray as $value) {
    echo $value . "\n";
}
echo "\n";

// Example 2: Using `foreach` with an associative array
echo "2. Foreach with Associative Array:\n";
$associativeArray = ["a" => 1, "b" => 2, "c" => 3];

foreach ($associativeArray as $key => $value) {
    echo "Key: $key, Value: $value\n";
}
echo "\n";

// Example 3: Using `for` loop with a numerically indexed array
echo "3. For Loop with Indexed Array:\n";
$length = count($indexedArray);

for ($i = 0; $i < $length; $i++) {
    echo $indexedArray[$i] . "\n";
}
echo "\n";

// Example 4: Using `while` loop with `key()` and `current()` for an associative array
echo "4. While Loop with Associative Array (key() and current()):\n";
reset($associativeArray);  // Reset array pointer
while (key($associativeArray) !== null) {
    $key = key($associativeArray);
    $value = current($associativeArray);
    echo "Key: $key, Value: $value\n";
    next($associativeArray);  // Move to the next element
}
echo "\n";

// Example 5: Using `array_map` to modify elements in an indexed array
echo "5. Array Map with Indexed Array (Multiply by 2):\n";
$modifiedArray = array_map(function ($value) {
    return $value * 2;
}, $indexedArray);

print_r($modifiedArray);
echo "\n";

// Example 6: Using `array_walk` to iterate over an associative array
echo "6. Array Walk with Associative Array:\n";
array_walk($associativeArray, function ($value, $key) {
    echo "Key: $key, Value: $value\n";
});
echo "\n";

// Example 7: Using `array_reduce` to sum values in an indexed array
echo "7. Array Reduce to Sum Indexed Array:\n";
$sum = array_reduce($indexedArray, function ($carry, $item) {
    return $carry + $item;
}, 0);

echo "Sum: $sum\n";
echo "\n";
