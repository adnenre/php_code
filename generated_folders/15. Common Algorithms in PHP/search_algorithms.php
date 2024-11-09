<?php

// Linear Search
// Linear search checks each element in the array sequentially.
function linearSearch($arr, $target) {
    foreach ($arr as $index => $value) {
        if ($value == $target) {
            return $index;  // return index where the value is found
        }
    }
    return -1;  // return -1 if the value is not found
}

// Binary Search
// Binary search requires a sorted array. It works by repeatedly dividing the array in half.
function binarySearch($arr, $target) {
    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high) {
        $mid = floor(($low + $high) / 2);

        if ($arr[$mid] == $target) {
            return $mid;  // return the index of the target
        }

        if ($arr[$mid] < $target) {
            $low = $mid + 1;
        } else {
            $high = $mid - 1;
        }
    }

    return -1;  // return -1 if the value is not found
}

// Jump Search
// Jump search is an efficient search for sorted arrays. It jumps ahead in steps and then performs a linear search within the block.
function jumpSearch($arr, $target) {
    $n = count($arr);
    $step = floor(sqrt($n));  // Step size
    $prev = 0;

    // Jump ahead in steps until target may be found
    while ($arr[min($step, $n) - 1] < $target) {
        $prev = $step;
        $step += floor(sqrt($n));
        if ($prev >= $n) {
            return -1;  // Element is not in the array
        }
    }

    // Linear search within the block
    for ($i = $prev; $i < min($step, $n); $i++) {
        if ($arr[$i] == $target) {
            return $i;
        }
    }

    return -1;  // Element not found
}

// Exponential Search
// Exponential search is used for unbounded or infinite lists. It first finds a range where the element might lie and then performs a binary search within that range.
function exponentialSearch($arr, $target) {
    if ($arr[0] == $target) {
        return 0;  // If the target is at the first position
    }

    $n = count($arr);
    $i = 1;

    // Exponentially find the range
    while ($i < $n && $arr[$i] <= $target) {
        $i = $i * 2;
    }

    // Perform binary search on the found range
    return binarySearch(array_slice($arr, $i / 2, min($i, $n) - 1), $target);
}

// Interpolation Search
// Interpolation search works well on uniformly distributed data. It estimates the position of the target based on the value and searches directly at that position.
function interpolationSearch($arr, $target) {
    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high && $target >= $arr[$low] && $target <= $arr[$high]) {
        if ($arr[$high] == $arr[$low]) {
            return ($arr[$low] == $target) ? $low : -1; // Handle division by zero
        }

        $pos = $low + floor(((float)($high - $low) / ($arr[$high] - $arr[$low])) * ($target - $arr[$low]));

        if ($arr[$pos] == $target) {
            return $pos;
        }

        if ($arr[$pos] < $target) {
            $low = $pos + 1;
        } else {
            $high = $pos - 1;
        }
    }

    return -1;  // Target not found
}

// Test the algorithms
$arr = [10, 20, 30, 40, 50, 60, 70, 80, 90];
$target = 40;

// Test Linear Search
echo "Linear Search result: ";
$result = linearSearch($arr, $target);
if ($result != -1) {
    echo "Element found at index: " . $result . "\n";
} else {
    echo "Element not found.\n";
}

// Test Binary Search
echo "Binary Search result: ";
$result = binarySearch($arr, $target);
if ($result != -1) {
    echo "Element found at index: " . $result . "\n";
} else {
    echo "Element not found.\n";
}

// Test Jump Search
echo "Jump Search result: ";
$result = jumpSearch($arr, $target);
if ($result != -1) {
    echo "Element found at index: " . $result . "\n";
} else {
    echo "Element not found.\n";
}

// Test Exponential Search
echo "Exponential Search result: ";
$result = exponentialSearch($arr, $target);
if ($result != -1) {
    echo "Element found at index: " . $result . "\n";
} else {
    echo "Element not found.\n";
}

// Test Interpolation Search
echo "Interpolation Search result: ";
$result = interpolationSearch($arr, $target);
if ($result != -1) {
    echo "Element found at index: " . $result . "\n";
} else {
    echo "Element not found.\n";
}
