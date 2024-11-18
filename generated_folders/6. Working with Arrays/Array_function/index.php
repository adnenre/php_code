<?php
// Example Array
$array1 = [1, 2, 3];
$array2 = [4, 5, 6];
$array3 = [7, 8, 9];

// 1. Merging arrays (similar to JavaScript's concat)
$merged = array_merge($array1, $array2, $array3);
echo "Merged Array: ";
print_r($merged);  // Output: [1, 2, 3, 4, 5, 6]

// 2. Pushing elements to the end of an array (similar to JavaScript's push)
array_push($array1, 7, 8);
echo "Array after array_push: ";
print_r($array1);  // Output: [1, 2, 3, 7, 8]

// 3. Popping an element from the end of an array (similar to JavaScript's pop)
$lastElement = array_pop($array1);
echo "Popped element: $lastElement\n";  // Output: 8
echo "Array after array_pop: ";
print_r($array1);  // Output: [1, 2, 3, 7]

// 4. Shifting an element from the start of an array (similar to JavaScript's shift)
$firstElement = array_shift($array1);
echo "Shifted element: $firstElement\n";  // Output: 1
echo "Array after array_shift: ";
print_r($array1);  // Output: [2, 3, 7]

// 5. Unshifting elements to the beginning of the array (similar to JavaScript's unshift)
array_unshift($array1, 0, 1);
echo "Array after array_unshift: ";
print_r($array1);  // Output: [0, 1, 2, 3, 7]

// 6. Slicing an array (similar to JavaScript's slice)
$sliced = array_slice($array1, 1, 3);
echo "Sliced Array: ";
print_r($sliced);  // Output: [1, 2, 3]

// 7. Splicing an array (similar to JavaScript's splice)
array_splice($array1, 2, 2, [8, 9]);  // Remove 2 elements from index 2 and add 8, 9
echo "Array after array_splice: ";
print_r($array1);  // Output: [0, 1, 8, 9, 7]

// 8. Mapping an array (similar to JavaScript's map)
$mapped = array_map(function ($n) {
    return $n * 2;
}, $array1);
echo "Mapped Array (each element doubled): ";
print_r($mapped);  // Output: [0, 2, 16, 18, 14]

// 9. Filtering an array (similar to JavaScript's filter)
$filtered = array_filter($array1, function ($n) {
    return $n > 5;
});
echo "Filtered Array (only elements greater than 5): ";
print_r($filtered);  // Output: [8, 9, 7]

// 10. Reducing an array (similar to JavaScript's reduce)
$sum = array_reduce($array1, function ($carry, $item) {
    return $carry + $item;
}, 0);
echo "Sum of array elements: $sum\n";  // Output: 25

// 11. Reversing an array (similar to JavaScript's reverse)
$reversed = array_reverse($array1);
echo "Reversed Array: ";
print_r($reversed);  // Output: [7, 9, 8, 1, 0]

// 12. Getting the keys of an array (similar to JavaScript's Object.keys)
$keys = array_keys($array1);
echo "Keys of the array: ";
print_r($keys);  // Output: [0, 1, 2, 3, 4]

// 13. Getting the values of an array (similar to JavaScript's Object.values)
$values = array_values($array1);
echo "Values of the array: ";
print_r($values);  // Output: [0, 1, 8, 9, 7]

// 14. Checking if a value exists in an array (similar to JavaScript's includes)
$exists = in_array(8, $array1);
echo "Does 8 exist in the array? " . ($exists ? "Yes" : "No") . "\n";  // Output: Yes

// 15. Removing duplicate values from an array (similar to JavaScript's unique)
$arrayWithDuplicates = [1, 2, 2, 3, 4, 4];
$unique = array_unique($arrayWithDuplicates);
echo "Array after removing duplicates: ";
print_r($unique);  // Output: [1, 2, 3, 4]

// 16. Getting the index of an element in the array (similar to JavaScript's indexOf)
$key = array_search(9, $array1);
echo "The index of 9 in the array: $key\n";  // Output: 3

// 17. Chunking an array (similar to JavaScript's slice)
$chunks = array_chunk($array1, 2);
echo "Array chunked into parts of 2: ";
print_r($chunks);  // Output: [[0, 1], [8, 9], [7]]

// 18.  Keys and values
$person = ["name" => "John", "age" => 30];
echo 'Array keys : ' . implode(',', array_keys($person)) . PHP_EOL;    // ["name", "age"]
echo 'Array values : ' . implode(',', array_values($person)) . PHP_EOL;   // ["John", 30]

// Sorting
$numbers = [1, 3, 4, 5, 6, 8, 2];
sort($numbers);
echo 'Array sorted : ' . implode(',', $numbers) . PHP_EOL;
