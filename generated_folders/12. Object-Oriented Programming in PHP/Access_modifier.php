<?php

//In Object-Oriented Programming (OOP) in PHP, access modifiers are used to define the visibility of class properties and methods. They determine how and where these properties and methods can be accessed.

# Example
# =======

// A simple class demonstrating access modifiers in PHP
class Car {
    // This is a static property that keeps track of the number of Car objects created.
    public static $carCount = 0;
    // Public property
    // Can be accessed from anywhere, inside or outside the class.
    public $make;

    // Protected property
    // Can be accessed within the class and by subclasses, but not from outside the class.
    protected $model;

    // Private property
    // Can only be accessed within the class that defines the member, not even by subclasses.
    private $engineNumber;

    // Constructor to initialize the Car object
    public function __construct($make, $model, $engineNumber) {
        $this->make = $make;
        $this->model = $model;
        $this->engineNumber = $engineNumber;
        self::$carCount++; // Access static property using self:: and increment
    }

    // Public method
    public function displayDetails() {
        echo "Make: " . $this->make . "\n";
        echo "Model: " . $this->model . "\n";
        echo "Engine Number: " . $this->engineNumber . "\n";
        echo PHP_EOL;
    }

    // Protected method
    protected function startEngine() {
        echo $this->make . ' ' . $this->model . " Engine started\n";
    }

    // Private method
    protected function stopEngine() {
        echo $this->make . ' ' . $this->model . " Engine stopped\n";
    }

    public static function getCarCount() {
        return self::$carCount; // Access static property inside a static method
    }
}

// Creating an object of the Car class
$car = new Car("Toyota", "Corolla", "1234XYZ");

// Accessing public property and method directly
echo $car->make . "\n";  // Accessible because it's public
$car->displayDetails();     // Accessible because it's public

// Accessing protected property (will cause an error)
//echo $car->model . "\n";  // Not accessible directly

// Accessing private property (will cause an error)
//echo $car->engineNumber . "\n"; // Not accessible directly

// Accessing protected and private methods (will cause an error)
// $car->startEngine();  // Not accessible directly
// $car->stopEngine();   // Not accessible directly

// To access protected/private methods, we would need to use inheritance

// Example of subclass accessing protected method
class ElectricCar extends Car {

    public function activateEngine() {
        // Accessing the protected method of the parent class
        $this->startEngine();  // This is allowed because it's protected
    }
    public function getModel() {
        return $this->model;
    }
    public function deactivateEngine() {
        // Accessing the private method of the parent class directly is NOT allowed
        $this->stopEngine();  // This would cause an error
    }
}

$electricCar = new ElectricCar("Tesla", "Model 3", "5678ABC");
$electricCar->displayDetails();  // Output: Engine started
$mercedes = new ElectricCar("Mercedess", "Model AMG", "3354BC");
$mercedes->displayDetails();  // Output: Engine started
$mercedes->activateEngine();  // Works because 'startEngine' is protected
$electricCar->deactivateEngine();
echo "Total number of cars: " . Car::$carCount;  // Output: Total number of cars: 2