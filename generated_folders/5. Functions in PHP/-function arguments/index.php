<?php

// 1. Default Arguments
function greet($name = "Guest") {
    echo "Hello, $name!\n";
}

greet();
greet("John");

// 2. Typed Arguments
function addNumbers(int $a, int $b): int {
    return $a + $b;
}

echo addNumbers(3, 5) . "\n";

// 3. Nullable Arguments
function displayName(?string $name) {
    echo $name === null ? "No name provided.\n" : "Name: $name\n";
}

displayName(null);
displayName("Alice");

// 4. Pass by Reference
function incrementValue(&$number) {
    $number++;
}

$value = 10;
incrementValue($value);
echo $value . "\n";

// 5. Variable-Length Arguments
function sum(...$numbers) {
    return array_sum($numbers);
}

echo sum(1, 2, 3, 4) . "\n";

// 6. Union Types
function processInput(int|string $input) {
    echo is_int($input) ? "Integer: $input\n" : "String: $input\n";
}

processInput(42);
processInput("Hello");

// 7. Intersection Types
interface A {
}
interface B {
}

class MyClass implements A, B {
}

function requireBoth(A&B $obj) {
    echo "Object satisfies both interfaces.\n";
}

$instance = new MyClass();
requireBoth($instance);

// 8. Callable Type
function execute(callable $func, $value) {
    echo $func($value) . "\n";
}

execute(fn($x) => $x * 2, 5);

// 9. Mixed Type
function printValue(mixed $value) {

    if (gettype($value) == 'array') {
        echo "convert array to string :" . implode(', ', $value) . PHP_EOL;
    } else {
        echo "{$value} \n";
    }
}

printValue(42);
printValue("Hello");
printValue([1, 2, 3]);
