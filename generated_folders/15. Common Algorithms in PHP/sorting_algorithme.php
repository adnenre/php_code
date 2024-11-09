<?php

// Bubble Sort Algorithm
function bubbleSort($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - 1 - $i; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                // Swap
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

// Selection Sort Algorithm
function selectionSort($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }
        // Swap
        $temp = $arr[$minIndex];
        $arr[$minIndex] = $arr[$i];
        $arr[$i] = $temp;
    }
    return $arr;
}

// Insertion Sort Algorithm
function insertionSort($arr) {
    $n = count($arr);
    for ($i = 1; $i < $n; $i++) {
        $key = $arr[$i];
        $j = $i - 1;

        // Move elements of arr[0..i-1] that are greater than key
        while ($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            $j = $j - 1;
        }
        $arr[$j + 1] = $key;
    }
    return $arr;
}

// Merge Sort Algorithm
function mergeSort($arr) {
    if (count($arr) < 2) {
        return $arr;
    }
    $mid = floor(count($arr) / 2);
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid);

    return merge(mergeSort($left), mergeSort($right));
}

function merge($left, $right) {
    $result = [];
    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] < $right[0]) {
            $result[] = array_shift($left);
        } else {
            $result[] = array_shift($right);
        }
    }
    return array_merge($result, $left, $right);
}

// Quick Sort Algorithm
function quickSort($arr) {
    if (count($arr) < 2) {
        return $arr;
    }
    $pivot = $arr[0];
    $left = $right = [];

    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $pivot) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }

    return array_merge(quickSort($left), [$pivot], quickSort($right));
}

// Example array for testing
$input = [12, 11, 13, 5, 6, 7];

// Testing Bubble Sort
echo "Bubble Sort:\n";
print_r(bubbleSort($input));

// Testing Selection Sort
echo "Selection Sort:\n";
print_r(selectionSort($input));

// Testing Insertion Sort
echo "Insertion Sort:\n";
print_r(insertionSort($input));

// Testing Merge Sort
echo "Merge Sort:\n";
print_r(mergeSort($input));

// Testing Quick Sort
echo "Quick Sort:\n";
print_r(quickSort($input));
