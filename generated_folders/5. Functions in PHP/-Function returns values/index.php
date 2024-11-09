<?php
// 1. Function returning null
function returnNull($message) {
    // This function does not explicitly return anything , so it returns null by default.
    if (empty($message)) {
        return null;  // No log, returning null
    }
    $timestamp = date("Y-m-d H:i:s");
    echo $message . ' ' . $timestamp;
    return null;
}

// 2. Function returning a boolean
function isEven($number) {
    // This function returns a boolean value (true or false)
    return $number % 2 == 0;
}

// 3. Function returning a string
function getGreeting($name) {
    // This function returns a string
    return "Hello, $name!";
}

// 4. Function returning an array
function getFruitList() {
    // This function returns an array
    return ["apple", "banana", "orange"];
}

// 5. Function returning an object
class Person {
    public $name;
    public $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function describe() {
        return "{$this->name} is {$this->age} years old.";
    }
}

function createPerson($name, $age) {
    // This function returns an object of class Person
    return new Person($name, $age);
}

// ------------- CALLING THE FUNCTIONS --------------

// Calling the function that returns null
$resultNull = returnNull('hello');
echo PHP_EOL;
var_dump($resultNull);  // Output: NULL

// Calling the function that returns a boolean
$isEven = isEven(4);
echo "Result of isEven(4): " . PHP_EOL;
var_dump($isEven);  // Output: bool(true)

$isOdd = isEven(5);
echo "Result of isEven(5): " . PHP_EOL;
var_dump($isOdd);  // Output: bool(false)

// Calling the function that returns a string
$greeting = getGreeting("Alice");
echo "Result of getGreeting('Alice'): $greeting\n";  // Output: Hello, Alice!

// Calling the function that returns an array
$fruits = getFruitList();
echo "Result of getFruitList(): " . PHP_EOL;
print_r($fruits);  // Output: Array ( [0] => apple [1] => banana [2] => orange )

// Calling the function that returns an object
$person = createPerson("John", 30);
echo "Result of createPerson('John', 30): " . PHP_EOL;
var_dump($person);  // Output: object(Person)#1 (2) { ["name"]=> string(4) "John" ["age"]=> int(30) }

echo "Person's description: " . $person->describe() . "\n";  // Output: John is 30 years old.
