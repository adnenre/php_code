<?php


function customArrayMerge(...$arrays) {
    // Initialize an empty array to hold the merged results
    $mergedArray = [];

    // Loop through each array passed as an argument
    foreach ($arrays as $array) {
        // Ensure the argument is an array before merging
        if (is_array($array)) {
            // Manually add each element of the array to $mergedArray
            foreach ($array as $key => $value) {
                // If the key is numeric, append it; otherwise, handle it as an associative key
                if (is_int($key)) {
                    $mergedArray[] = $value; // Append value for numeric keys
                } else {
                    $mergedArray[$key] = $value; // Add or overwrite for associative keys
                }
            }
        } else {
            // Handle non-array arguments (optional warning)
            echo "Warning: Non-array argument detected, skipping...\n";
        }
    }

    // Return the merged array
    return $mergedArray;
}

// Test the custom function with multiple arrays
$array1 = [1, 2, 3];
$array2 = [4, 5, 6];
$array3 = [7, 8, 9];
$array4 = ["a" => 10, "b" => 11, 12];

$merged = customArrayMerge($array1, $array2, $array3, $array4);
print_r($merged);

echo PHP_EOL;

// Custom map function
function customMap($array, $callback) {
    $result = [];
    foreach ($array as $key => $value) {
        $result[$key] = $callback($value, $key);
    }
    return $result;
}

// Custom filter function
function customFilter($array, $callback) {
    $result = [];
    foreach ($array as $key => $value) {
        if ($callback($value, $key)) {
            $result[$key] = $value;
        }
    }
    return $result;
}

// Custom reduce function
function customReduce($array, $callback, $initial = null) {
    $accumulator = $initial;
    foreach ($array as $key => $value) {
        $accumulator = $callback($accumulator, $value, $key);
    }
    return $accumulator;
}

// Example usage of custom map
$array = [1, 2, 3, 4, 5];

$double = function ($value) {
    return $value * 2; // Multiply each element by 2
};

$mapped = customMap($array, $double);
echo "Mapped result:\n";
print_r($mapped);


$isEven = function ($number) {
    return $number % 2 == 0;
};

// Example usage of custom filter
$filteredEven = customFilter($array, $isEven);
echo "Filtered even values:\n";
print_r($filteredEven);


$isOdd = function ($number) {
    return $number % 2 !== 0;
};

// Example usage of custom filter
$filteredOdd = customFilter($array, $isOdd);
echo "Filtered odd values :\n";
print_r($filteredOdd);

// Example usage of custom reduce
$sum = customReduce($array, function ($accumulator, $value) {
    return $accumulator + $value; // Sum all elements
}, 0);
echo "Reduced result (Sum):\n";
echo $sum . "\n";
